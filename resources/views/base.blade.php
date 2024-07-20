<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/css/w3.css', 'resources/js/app.js'])
</head>

<body class="w3-black">
    <div class="w3-bar">
        <img class="w3-bar-item w3-button" src="icons/logo_light.png" alt="logo" height="50">
        <span class="w3-bar-item"><strong>RESAKA</strong></span>
        
        <div class="w3-right">
            <a class="w3-bar-item w3-button" href="index.php?page=welcome">A propos du site</a>
            <a class="w3-bar-item w3-button" href="{{ route('register.login') }}">Se connecter</a>
            <a class="w3-bar-item w3-button" href="{{ route('register.signup') }}">S'inscrire</a>
        </div>
    </div>

    @yield('content')

</body>
</html>