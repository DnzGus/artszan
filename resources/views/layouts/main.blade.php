<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artszan</title>
    <link rel="shortcut icon" href="{{url('/imgs/logo2.png')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{url('/style/style.css')}}">

</head>

<body>
    <!-- NAV -->
    @guest
    <header>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand fw-bolder text-white" id="logo" href="{{url('/feed')}}">
                <img class="logo" src="{{url('/imgs/image.png')}}" alt="Logo Artszan">
            </a>
            <form class="d-flex" role="search" method="GET" action="{{url('/feed/search')}}">
                @csrf
                <input class="form-control me-2" id="search" type="search" placeholder="🔍 Pesquisar" name="search"
                aria-label="Search">
            </form>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-3 ">
                    <a class="btn btn-primary fw-semibold" id="entrar" href="{{url('/login')}}" role="button">Entrar</a>
                    <a class="btn btn-primary fw-semibold" id="registre" href="{{url('/register')}}" role="button">Registre-se</a>
                </ul>
            </div>
        </nav>
    </header>
    @endguest

    @auth
    <header>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand fw-bolder text-white" id="logo" href="{{url('/feed')}}">
                <img class="logo" src="{{url('/imgs/image.png')}}" alt="Logo Artszan">
            </a>
            <form class="d-flex" role="search" method="GET" action="{{url('/feed/search')}}">
                @csrf
                <input class="form-control me-2" id="search" type="search" placeholder="🔍 Pesquisar" name="search"
                aria-label="Search"></input>
            </form>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-3 ">
                    <a href="{{url('/post/create')}}">
                        <button class="btn btn-primary fw-semibold" id="btnUpload"
                        role="button"><i class="bi bi-upload" ></i>
                        </button>
                    </a>
                    <a href="#">
                        @if(Auth::user()->profilePhoto != null)
                        <li class="nav-item dropdown">
                            <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img class="imagemUsuario rounded-circle" src="data:image/png;base64,{{ Auth::user()->profilePhoto }}" alt="foto do usuário"><br>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile.redir') }}">Perfil</a>
                                <a class="dropdown-item" href="{{ url('/profile/' . Auth::user()->id . '/edit') }}">Editar Perfil</a>
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
                        @else
                        <li class="nav-item dropdown">
                            <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img class="imagemUsuario rounded-circle" src="{{URL('/imgs/userImage.png')}}" alt="foto do usuário"><br>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile.redir') }}">Perfil</a>
                                <a class="dropdown-item" href="{{ url('/profile/' . Auth::user()->id . '/edit') }}">Editar Perfil</a>
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
                        @endif
                    </a>
                </ul>
            </div>
        </nav>
    </header>
    @endauth

    @yield('content')
    <!-- FOOTER -->

    <footer class="text-white" style="width: 100%;background: linear-gradient(to bottom, #484444, #221E1E); margin-top: 10px; padding-bottom: 15px;">
        <h1 class="text-center" style="padding-top: 10px;">Artszan</h1>
        <p class="text-center fw-semibold">Imagens que inspiram, histórias que conectam.
        </p>
        <div class="copyright text-center" style="margin-top: 20px;">
            &copy; Copyright <strong>Artszan</strong>. All Rights Reserved
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
