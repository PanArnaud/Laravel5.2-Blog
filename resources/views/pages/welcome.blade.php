@extends('main')

@section('title', 'Accueil')

@section('content')
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
      <img src="{{ 'https://www.gravatar.com/avatar/'.md5(strtolower(trim('  a.panapadeatchy@hotmail.fr'))).'?s=100' }}" alt="..." class="img-responsive center-block img-circle"> 
      <h3 class="text-center">Arnaud Panapadéatchy <small>Développeur web autodidacte</small></h3>
      <a href="/about" class="btn btn-xs btn-default center-block">En savoir plus
      </a>
    </div>
  </div>
@endsection 