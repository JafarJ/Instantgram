<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Instantgram</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
            <div class="container pl-5 pr-5">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div><img src="/svg/instantgramText.svg" style="height: 28px;"></div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="/">
                                <img src="{{ (request()->is('/')) ? '/svg/toggled-home.svg' : '/svg/home.svg' }}" alt="" class=" w-100" style="max-width: 25px;">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/explore/top">
                                <img src="{{ (request()->is('explore*')) ? '/svg/toggled-explore.svg' : '/svg/explore.svg' }}" alt="" class="w-100" style="max-width: 25px;">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/post/create">
                                <img src="{{ (request()->is('post/create*')) ? '/svg/toggled-add.svg' : '/svg/add.svg' }}" alt="" class="w-100" style="max-width: 25px;">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/liked">
                                <img src="{{ (request()->is('liked*')) ? '/svg/toggled-like.svg' : '/svg/like.svg' }}" alt="" class="w-100" style="max-width: 25px;">
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="{{ Auth::user()->profile->profileImage() }}" alt="" class="w-100 rounded-circle" style="max-width: 25px;">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}"><img src="/svg/user.svg" alt="" class="mr-2 w-100" style="max-width: 15px;">Profile</a>
                                <hr style="margin: 0.5rem 0 !important;">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 ">
            @yield('content')
        </main>
        <footer>
            <div class="center text-center w-100 pb-1">

                <hr />
                <span>Please Mr.Zuckerberg don´t game end us we just vibin (づ￣ ³￣)づ</span>
                <hr />
            </div>
        </footer>
    </div>
</body>

</html>
