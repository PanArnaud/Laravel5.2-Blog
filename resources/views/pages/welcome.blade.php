@extends('main')

@section('title', 'Accueil')

@section('content')
  <div class="row">
    <div class="col-md-8">
      <h1>Derniers articles</h1>
      @foreach($posts as $post)
        <div class="post">
          <h3>{{ $post->title }}</h3>
          <h5>Publié le {{ $post->getCreatedAtAttribute($post->created_at) }}</h5>
          <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
          <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Lire plus</a>
          <div class="pull-right"><small class="">{{ $post->comments()->count() }} {{ $post->comments()->count() > 1 ? 'commentaires' : 'commentaire' }}</small></div>
        </div>
        <hr>
      @endforeach
    </div>
    <div class="col-md-3 col-md-offset-1">
      <img src="https://media.licdn.com/mpr/mpr/shrinknp_400_400/AAEAAQAAAAAAAAI-AAAAJDQ1MDE5MjNhLTA5ZDAtNDkxYi04NDVmLWJmNjUwMWIwZGRjYw.jpg" alt="..." class="img-responsive center-block img-circle" width="150px" height="150px"> 
      <h3 class="text-center">Arnaud Panapadéatchy <small>Développeur web autodidacte</small></h3>
      <a href="/about" class="btn btn-xs btn-default center-block">En savoir plus
      </a>
    </div>
  </div>
@endsection 