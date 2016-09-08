@extends('main')

@section('title', 'Accueil')

@section('content')
<div class="ui main container">
  <div class="ui two column grid">
    <div class="twelve wide column">
      <h1>Derniers articles</h1>
      <div class="ui items">
        @foreach($posts as $post)
          <div class="item">
            <div class="content">
              <a class="header">{{ $post->title }}</a>
              <div class="meta">
                <span>Publié le {{ $post->getCreatedAtAttribute($post->created_at) }}</span>
              </div>
              <div class="description">
                <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
              </div>
              <div class="extra content">
                <div class="ui right floated horizontal list">
                  <div class="disabled item" href="#">
                    <i class="talk icon"></i>
                      {{ $post->comments()->count() }}
                  </div>
                </div>
                <a href="{{ url('blog/'.$post->slug) }}" class="ui mini button">
                  Lire plus
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <div class="four wide column centered row">
      <img src="https://media.licdn.com/mpr/mpr/shrinknp_400_400/AAEAAQAAAAAAAAI-AAAAJDQ1MDE5MjNhLTA5ZDAtNDkxYi04NDVmLWJmNjUwMWIwZGRjYw.jpg" alt="..." class="ui centered small rounded image"> 
      <h3 class="">Arnaud Panapadéatchy <small>Développeur web autodidacte</small></h3>
      <a href="/about" class="btn btn-xs btn-default center-block">En savoir plus
      </a>
    </div>
  </div>
</div>
@endsection 