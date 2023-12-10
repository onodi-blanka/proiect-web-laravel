<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project 2 Laravel</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Include your custom stylesheet -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-light">

<header>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/home') }}">Home</a>
            </li>
            <li class="nav-item {{ request()->is('agenda') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/agenda') }}">Agenda</a>
            </li>
            <li class="nav-item {{ request()->is('contact') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
            </li>
            <li class="nav-item {{ request()->is('sponsorspartners') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/sponsorspartners') }}">Sponsors & Partners</a>
            </li>
            <li class="nav-item {{ request()->is('event') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/event') }}">Event</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ request()->is('cart') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/cart') }}">Cart</a>
            </li>
        </ul>
    </nav>
</header>

<div class="content-container">
    @yield('content')
</div>
<footer class="bg-dark text-white text-center py-3 fixed-bottom">
    Laravel School Project
</footer>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
