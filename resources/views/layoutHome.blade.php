<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/css/w3.css', 'resources/js/app.js'])
</head>

<body class="body">
    <div class="navBar">
        <div class="logoBar w3-half">
            <img class="w3-bar-item w3-button" src="icons/logo_light.png" alt="logo" height="50">
            <form action="{{ route('home.all') }}" method="GET">
                @csrf
                <div class="searchInput">
                    <input type="search" name="search" id="" placeholder="Search...">
                </div>
            </form>
            <img class="w3-bar-item w3-button" src="icons/accueil.png" alt="logo" height="50">
            <img class="w3-bar-item w3-button" src="icons/message.png" alt="logo" height="50">
        </div>
        
        <div class="menuBar">
            <img class="w3-bar-item w3-button" src="icons/profile.png" alt="logo" height="50">
            <div class="">
                <form action="{{ route('register.logout_action') }}" method="get">
                    <button class="w3-bar-item w3-button" type="submit">Se déconnecter</button>
                </form>
            </div>
        </div>
    </div>

    @yield('content')

</body>
</html>