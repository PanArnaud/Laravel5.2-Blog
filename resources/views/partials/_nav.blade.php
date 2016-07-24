<!-- Default Bootstrap Navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">AR-PA</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Accueil</a></li>
        <li class="{{ Request::is('blog') ? 'active' : '' }}"><a href="/blog">Blog</a></li>
        <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="/about">A propos</a></li>
        <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="/contact">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Salut <strong>{{ Auth::user()->name }}</strong><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('posts.index') }}">Articles</a></li>
              <li><a href="{{ route('categories.index') }}">Catégories</a></li>
              <li><a href="{{ route('tags.index') }}">Tags</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="/auth/logout">Déconnexion</a></li>
            </ul>
          </li>
        @else
          <li class=""><a href="{{ route('login') }}" class="t">Connexion</a></li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>