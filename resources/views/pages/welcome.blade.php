@extends('main')

@section('title', 'Accueil')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <h1>Bienvenue sur mon site personnel</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        {{-- <p><a class="btn btn-primary btn-lg" href="" role="button">Post</a></p> --}}
      </div>
    </div>
  </div> <!-- .end of .row -->

  <div class="row">
    <div class="col-md-8">
      @foreach($posts as $post)
        <div class="post">
          <h3>{{ $post->title }}</h3>
          <p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
          <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Lire plus</a>
        </div>
        <hr>
      @endforeach
    </div>
    <div class="col-md-3 col-md-offset-1">
      <h2>Tags</h2>
      <ul class="nav nav-pills nav-stacked">
        @foreach($tags as $tag)
          <li>
            <a href="">{{ $tag->name }} | {{ $tag->posts->count() }}</a>
          </li>
        @endforeach
      </ul> 
    </div>
  </div>
@endsection 