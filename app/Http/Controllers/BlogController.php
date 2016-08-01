<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;

class BlogController extends Controller
{
    public function getIndex() {
        $posts = Post::where('online', '=', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug) {
        //fetch from the database based on a slug
        $post = Post::where('slug', '=', $slug)->first();

        //return view
        return view('blog.single')->withPost($post);
    }
}
