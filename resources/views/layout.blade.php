<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project 2 Laravel</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <!-- Include your custom stylesheet -->
{{--    @stack('css')--}}
{{--    @push('css')--}}
{{--        <link href="{{ asset('../../public/build/assets/app.css') }}" rel="stylesheet">--}}
{{--    @endpush--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/cos.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--    @vite(['resources/js/app.js'])--}}
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">

<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item {{ request()->is('home') ? 'active' : '' }} pl-3">
                <a class="nav-link" href="{{ url('/home') }}">Home</a>
            </li>
            <li class="nav-item {{ request()->is('event') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/event') }}">Event</a>
            </li>
            <li class="nav-item {{ request()->is('agenda') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('agenda') }}">Agenda</a>
            </li>
            <li class="nav-item {{ request()->is('sponsorspartners') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/sponsorspartners') }}">Sponsors & Partners</a>
            </li>
            <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
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
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
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
        <ul class="navbar-nav">
            <li class="nav-item {{ request()->is('cart') ? 'active' : '' }} pr-3">
                <a class="nav-link" href="{{ url('/cart') }}">
                    <button type="button" class="btn btn-info" datatoggle="dropdown">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cos
                        <span class="badge badge-pill badge-danger">
                        @php
                            $cart = session('cart') ?? []; // Assign an empty array if session('cart') is null
                            $totalQuantity = 0;

                            if(is_array($cart)) {
                                $totalQuantity = array_sum(array_column($cart, 'quantity'));
                            }
                        @endphp
                        {{ $totalQuantity }}
                        </span>
                    </button>
                </a>
            </li>

        </ul>
    </nav>
</header>

<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
    
    @yield('content')
</div>
<footer class="bg-dark text-white text-center py-3 fixed-bottom">
    Laravel School Project
</footer>


@yield('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
</body>
</html>
