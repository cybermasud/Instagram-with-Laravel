<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="clearfix" id="app">
    <nav class="navbar navbar-light bg-white shadow-sm" style="height:10vh">
        <div class="container justify-content-sm-center">
            <div class="col-sm-8">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Instagram
                </a>
            </div>
            <div class="col-sm-1">
                    @auth
                        <div class="nav-item">
                            <a class="text-decoration-none text-dark" href="{{route('profile.show',\Illuminate\Support\Facades\Auth::id())}}">
                                {{ Auth::user()->name }}
                            </a>
                        </div>
                    @endauth

            </div>
        </div>
    </nav>
    <main class="py-4 container clearfix" style="height:100vh">
        @yield('content')
    </main>
    <footer class="modal-footer" style="height:50px">
        <div class="col-sm-7">
            <p>@ Masood Amiri</p>
        </div>
    </footer>
</div>
</body>
</html>
