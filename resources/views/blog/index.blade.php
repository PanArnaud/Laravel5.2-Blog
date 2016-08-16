@extends('main')

@section('title', 'Blog')

@section('content')
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <h1>Blog</h1>
        </div>
    </div>

    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>{{ $post->title }}</h2>
                <h5>Publié le {{ $post->getCreatedAtAttribute($post->created_at) }}</h5>

                <p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? "..." : "" }}</p>

                <a  class="btn btn-default" href="{{ route('blog.single', $post->slug) }}">Lire plus</a>
                <div class="pull-right"><small>{{ $post->comments()->count() }} {{ $post->comments()->count() > 1 ? 'commentaires' : 'commentaire' }}</small></div>
                <br> <br>
            </div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-md-12">
            <div clas="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
@endsection
