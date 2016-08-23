<?php

namespace App\Http\Controllers;

use App\Tag;
use Session;
use App\Post;
use Purifier;
use Storage;
use Image;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the blog posts on the database
        $posts = Post::orderBy('id', 'DESC')->paginate(5);

        //return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the data
        $this->validate($request, array(
                'title'         =>'required|max:255',
                'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id'   => 'required|integer',
                'body'          => 'required',
                'featured_image'=> 'sometimes|image'
            ));

        // Store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);
        if(isset($request->online)) {
            $post->online = $request->online;
        }

        // Save the image
        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('/images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $post->image = $filename;
        }

        $post->save();

        if(isset($request->tags)) {
            $post->tags()->sync($request->tags, false);
        } else {
            $post->tags->sync(array());
        }

        Session::flash('success', 'L\'article à bien était enregistré!');

        // Redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the post in the database and save as a variable
        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];
        $tags = Tag::all();
        $tags2 = [];

        foreach($categories as $category) {
            $cats[$category->id] = $category->name;
        }
        foreach($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        // Validate the data

        $this->validate($request, array(
            'title' =>'required|max:255',
            'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'category_id'   => 'required|integer',
            'body' => 'required', 
            'featured_image' => 'image'
        ));

        // Save the data into the database
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->input('body'));
        
        if($request->hasFile('featured_image')) {
            // Add the new image
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('/images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $oldFileName = $post->image;

            // Update the database
            $post->image = $filename;

            // Delete the old image
            Storage::delete($oldFileName);
        }

        if(null != $request->input('online')) {
            $post->online = 1;
        } else {
            $post->online = 0;
        }

        $post->save();

        if(isset($request->tags)) {
            $post->tags()->sync($request->tags, false);
        } else {
            $post->tags->sync(array());
        }

        // set flash data with success message
        Session::flash('success', 'Les modifications ont étés enregistrées!');

        // Redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // Delete the relation between tags and this post that will be deleted.
        $post->tags()->detach();

        // Delete the associated image
        Storage::delete($post->image);

        // And now delete the post
        $post->delete();

        Session::flash('success', 'L\'article à bien été supprimé.');

        return redirect()->route('posts.index');
    }
}
