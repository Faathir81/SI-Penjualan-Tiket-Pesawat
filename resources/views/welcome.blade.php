<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body,
    html {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    .background {
        background-image: url('https://images.unsplash.com/photo-1499063078284-f78f7d89616a?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        flex-grow: 1;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .content {
        position: relative;
        z-index: 1;
        color: white;
        text-align: center;
    }

    .navbar {
        background: rgba(255, 255, 255, 0.1); /* Warna semi-transparan lebih halus */
        backdrop-filter: blur(10px);
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        width: 100%;
        position: fixed;
        top: 0;
        z-index: 10;
    }

    .nav-link {
        color: #ffffff;
        font-size: 18px;
        transition: color 0.3s, font-weight 0.3s;
        font-weight: bold;
    }

    .nav-link:hover {
        color: #87ceeb;
        text-decoration: none;
    }

    .navbar-brand {
        color: #ffffff;
        font-size: 24px;
        font-weight: bold;
    }

    /* Warna dan efek tombol */
    .login-btn {
        background-color: rgba(135, 206, 235, 0.8); /* Warna biru muda dengan transparansi */
        color: white;
        border: none;
        padding: 10px 20px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .login-btn:hover {
        background-color: rgba(70, 130, 180, 0.9); /* Biru yang lebih gelap saat di-hover */
        transform: scale(1.05); /* Efek zoom */
    }

    .register-btn {
        background-color: rgba(144, 238, 144, 0.8); /* Warna hijau pastel dengan transparansi */
        color: white;
        border: none;
        padding: 10px 20px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .register-btn:hover {
        background-color: rgba(34, 139, 34, 0.9); /* Hijau yang lebih gelap saat di-hover */
        transform: scale(1.05); /* Efek zoom */
    }

    .content-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 100px; /* Tambahkan margin agar konten tidak terlalu dekat dengan navbar */
    }

    .spacer {
        height: 60px; /* Jarak konten dengan navbar */
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">Capsswing</a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @if (Route::has('login'))
                    <li class="nav-item">
                        @auth
                        <a class="nav-link active" href="{{ url('/dashboard') }}">Dashboard</a>
                        @else
                        <a class="btn login-btn" href="{{ route('login') }}">Log in</a>
                        @if (Route::has('register'))
                        <a class="btn register-btn" href="{{ route('register') }}">Register</a>
                        @endif
                        @endauth
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="background">
        <div class="content-wrapper">
            <h1>Selamat Datang</h1>
            <p>Your gateway to awesome experiences</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
