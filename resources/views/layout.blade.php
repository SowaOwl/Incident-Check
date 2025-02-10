<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset("css/main.css")}}" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Blinker:wght@600&family=Dosis&family=Jost&display=swap" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container myNavBar">
    <header class="d-flex justify-content-center py-3 bg-dark text-white">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="/" class="nav-link"  aria-current="page">Home</a></li>
            <li class="nav-item"><a href="/incidents" class="nav-link">All Incidents</a></li>
            @if(Auth::user() != null)
                @if(Auth::user()->roles[0]->name == 'admin' || Auth::user()->roles[0]->name == 'redactor')
                    <li class="nav-item"><a href="/incident/add" class="nav-link">Add Incidents</a></li>
                @endif
                @if(Auth::user()->roles[0]->name == "admin")
                        <li class="nav-item"><a href="/moderator_list" class="nav-link">Moderator List</a></li>
                    @endif
            @endif
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item nav-link">
                    <a class="text-decoration-none" style="margin: 0;padding: 0" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </header>
</div>
<div class="container">
    @yield('main_content')
</div>
</body>
</html>
