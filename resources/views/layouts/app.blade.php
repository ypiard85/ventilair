<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a href="{{ route('campagnes.index') }}" class="nav-link">Campagnes</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Produits
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="nav-link dropdown-item" href="{{ route('produit_categorie') }}">
                                    Categories
                                </a>
                                <a class="nav-link dropdown-item" href="{{ route('produits.index') }}">
                                    Tout les produits
                                </a>
                                <a class="nav-link dropdown-item" href="{{ route('produits_populaires') }}">
                                    Les plus populaires
                                </a>
                            </div>
                        </li>
                        @if(Auth::user())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->pseudo }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.index') }}">Profil</a>
                                <a class="dropdown-item" href="{{ route('commande.index') }}">Mes commandes</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Deconnexion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Créer un compte</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @if(Auth::user())
        <a href="{{ route('paniers.index') }}" class="position-fixed text-center" style="right: 20px; bottom: 20px; font-size: 2em; z-index: 10; text-decoration: none; color: black;">
            <i class="fas fa-shopping-bag"></i>
            @if(session()->has('panier'))
            <span>{{ count(session('panier')) }}</span>
            @endif
            <form action="{{ route('empty_panier') }}" method="post" style="font-size: 10px">
                @csrf
                <button class="btn btn-outline-dark btn-sm" onclick="return confirm('voulez vous supprimer le panier ?')">Vider le panier</button>
            </form>
        </a>
        @endif
        <div class="container w-50 text-center p-3">
            @if(session()->has('message'))
            <p class="alert alert-success">{{ session()->get('message') }}</p>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
