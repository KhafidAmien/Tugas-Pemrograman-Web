<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Laravel</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
</head>
<body>

    @if (Route::has('login'))
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            @auth
                <li class="nav-item">
                <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                </li>
            @else
                <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Log in</a>
                </li>
            @if (Route::has('register'))
                <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            @endif
            @endauth
            </ul>
            </div>
        </div>
            </nav>
    @endif

    <section class="p-5">
    <h1 class="text-center mt-3 mb-5">Selamat datang di belajar laravel amien, saya membuat CRUD sederhana dengan laravel. Silakan register atau Login bang biar ga penasaran</h1>
    
    
    </section>
    
    
</body>
</html>