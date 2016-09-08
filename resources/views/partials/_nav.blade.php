<div class="ui inverted menu">
  <div class="ui container">
    <a href="/" class="header item">AR-PA</a>
    <a href="/" class="{{ Request::is('/') ? 'active' : '' }} item">Home</a>
    <a href="/blog" class="{{ Request::is('blog') ? 'active' : '' }} item">Blog</a>
    <a href="/about" class="{{ Request::is('about') ? 'active' : '' }} item">A propos</a>
    <a href="/contact" class="{{ Request::is('contact') ? 'active' : '' }} item">Contact</a>
    <div class="right menu">
      @if (Auth::check())
        <div class="ui simple dropdown item">
          <strong>{{ Auth::user()->name }}</strong><i class="dropdown icon"></i>
          <div class="menu">
            <a class="item" href="{{ route('posts.index') }}">Articles</a>
            <a class="item" href="{{ route('categories.index') }}">Catégories</a>
            <a class="item" href="{{ route('tags.index') }}">Tags</a>
            <div class="divider"></div>
            <a class="item" href="/auth/logout">Déconnexion</a>
          </div>
        </div>
      @else
        <a href="{{ route('login') }}" class="item">Connexion</a>
      @endif
    </div>
  </div>
</div>