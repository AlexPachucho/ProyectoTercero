<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        body {
            background-image: url("{{ asset('img/fondo.jpg') }}"); 
            background-size: cover;
            background-position: center;
            font-family: 'figtree', sans-serif;
            color: #fff;
            text-align: center;
            padding: 50px;
            margin: 0;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .btn {
            margin: 10px;
        }

        .btn:hover {
            transform: scale(1.1);
        }

        .card-deck {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PAGINA PRINCIPAL</h1>
        <a href="{{ route('login') }}" class="btn btn-warning">LOGIN</a>
        <a href="{{ route('register') }}" class="btn btn-dark">REGISTER</a>
        <a href="{{ route('dashboard') }}" class="btn btn-dark">PERFIL</a>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
</body>
</html>
