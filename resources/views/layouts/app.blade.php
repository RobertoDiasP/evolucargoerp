<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Evolucargo') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container px-5">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="./../../img/Logo e Colorido png.png" style="max-width: 150px; max-height: 150px;" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item mx-2">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Pesquisar por Curso" aria-label="Search">
                                <button class="btn btn-outline-info" type="submit">Pesquisar</button>
                            </form>
                        </li>
                        <!-- <li class="nav-item ">
                            <a class="nav-link" aria-current="page" href="#">Home</a>
                        </li> -->
                        <li class="nav-item dropdown mx-2">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Explorar
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Concursos</a></li>
                                <li><a class="dropdown-item" href="#">Carreira</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Todos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" aria-current="page" href="#">Planos/Pacotes</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Sobre Nós</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Contato</a>
                        </li> -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle capitalize-text" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a href="{{ route('perfil.index') }}" class="dropdown-item">Perfil</a>
                                <a href="{{ route('curso.index') }}" class="dropdown-item">Cursos</a>
                                <a href="{{ route('adm.index') }}" class="dropdown-item">Compras</a>

                                @if (auth()->check() && auth()->user()->perfil == 5)
                                <a href="{{ route('adm.index') }}" class="dropdown-item">Adm</a>
                                @endif

                                <hr>
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
                </div>
            </div>
        </nav>

        @if (auth()->check() && auth()->user()->perfil == 5)
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <ul class="list-group list-group-horizontal" style=" list-style-type: none;">
                    <li class="dropdown ">
                        <a class="btn btn-outline-custom m-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Produto
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('produto.indexp') }}">Cadastro Produto</a></li>
                            <li><a class="dropdown-item" href="{{ route('produtoconfig.index') }}">Config</a></li>
                            <li><a class="dropdown-item" href="{{ route('produto.index') }}">Consulta</a></li>
                            <hr>
                            <li><a class="dropdown-item" href="{{ route('produto.index') }}">Estoque</a></li>
                        </ul>
                    </li>
                    <li class="btn btn-outline-info m-2">
                        <a href="{{ route('empresa.index') }}" class="navbaradm">
                            Empresa
                        </a>
                    </li>
                    <li class="btn btn-outline-info m-2">
                        <a href="{{ route('entrada.index') }}" class="navbaradm">
                            Entrada
                        </a>
                    </li>
                    <li class="dropdown ">
                        <a class="btn btn-outline-custom m-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pessoa
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('pessoa.index') }}">Consulta Pessoa</a></li>
                            <li><a class="dropdown-item" href="{{ route('pessoa.create') }}">Cadastro Pessoa</a></li>
                            <li><a class="dropdown-item" href="{{ route('produto.index') }}">Consulta</a></li>
                            <hr>
                            <li><a class="dropdown-item" href="{{ route('produto.index') }}">Estoque</a></li>
                        </ul>
                    </li>
                    <li class="btn btn-outline-info m-2">Pagamentos</li>
                </ul>
            </div>
        </nav>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<style>
    .btn-outline-info {
        border-color: lightsalmon !important;
        color: black !important;

    }

    .btn-outline-info:hover {
        background-color: rgb(249, 169, 99) !important;
        color: white !important;
    }


    .capitalize-text {
        text-transform: capitalize;
    }

    .navbaradm {
        text-decoration: none;
        /* Remove o sublinhado */
        color: inherit;
        /* Herda a cor do elemento pai */
    }

    .dropdown-item:active,
    .dropdown-item:focus {
        background-color: rgb(249, 169, 99) !important;
        /* Cor desejada */
        color: white !important;
        /* Cor do texto */
    }

    .dropdown-item:hover {
        background-color: rgba(249, 169, 99, 0.8) !important;
        /* Cor um pouco mais clara ao passar o mouse */
    }

    .btn-outline-custom {
        color: rgb(249, 169, 99);
        /* Cor do texto */
        border: 1px solid rgb(249, 169, 99);
        /* Cor da borda */
        background-color: transparent;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        border-radius: 0.25rem;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease-in-out;
    }

    .btn-outline-custom:hover {
        background-color: rgb(249, 169, 99);
        /* Cor de fundo ao passar o mouse */
        color: white;
        /* Cor do texto ao passar o mouse */
    }

    .btn-outline-custom:active {
        background-color: rgb(249, 169, 99);
        /* Cor de fundo ao clicar */
        border-color: rgb(249, 169, 99);
        color: white;
    }
</style>

</html>