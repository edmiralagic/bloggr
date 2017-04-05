<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield("title") | Bloggr</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <nav class="nav has-shadow">
      <div class="container">
        <div class="nav-left">
          <a class="nav-item" href="{{ route('home') }}">
            <h1 class="title is-4"><strong>BLOGGR</strong></h1>
          </a>
        </div>
        <div class="nav-center">
          <div class="nav-item">
            <h1 class="title">✍🏼</h1>
          </div>
        </div>
        <div class="nav-right">
          @if (Auth::check())
            <a class="nav-item" href="{{ route('posts') }}">
              Posts
            </a>
            <a class="nav-item" href="{{ route('create') }}">
              Create
            </a>
            <a class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                {{ csrf_field() }}
                <div class="field">
                    <p class="control">
                      <button class="button is-success">
                        Logout
                      </button>
                    </p>
                  </div>
              </form>
            </a>
          @elseif(Request::path() == 'login' || Request::path() == '/') 
            <a class="nav-item" href="{{ route('register') }}">
              Register
            </a>
          @elseif(Request::path() == 'register') 
            <a class="nav-item" href="{{ route('login') }}">
              Login
            </a>
          @endif
        </div>
        <span class="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </div>
    </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
