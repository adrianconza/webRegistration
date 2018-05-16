<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="nav">
            <a href="{{ url('/') }}" class="brand">
                <h2>{{ config('app.name', 'Laravel') }}</h2>
            </a>

            <ul class="menu">
                @auth
                    <li><a href="{{ route('people.index') }}">Personas</a></li>
                    <li><a href="{{ route('workshops.index') }}">Talleres</a></li>
                @endauth
            </ul>

            <ul class="login">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @else
                    <li>
                        <a href="{{ url('/') }}">{{ Auth::user()->name }}</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="display-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
