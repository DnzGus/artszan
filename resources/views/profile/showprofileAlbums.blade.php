@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="col d-flex justify-content-center mt-5">
            <a href="#">
                @if($profile->profilePhoto != null)
                <img src="data:image/png;base64,{{ $profile->profilePhoto }}" alt="foto do usuário"  class="imagemUsuario2 rounded-circle"><br>
                @else
                <img src="{{URL('/imgs/userImage.png')}}" alt="foto do usuário"  class="imagemUsuario2 rounded-circle"><br>
                @endif
            </a>
        </div>
    </div>
    <div class="row">
        <div class="nomePerfil col d-flex justify-content-center mt-2">
            <h2>{{$profile->name}}</h2>
        </div>
    </div>
    <div class="row">
        <div class="seguindo col-6 d-flex justify-content-end fw-semibold">
            <p>seguindo</p>
        </div>
        <div class="seguidores col-6 d-flex justify-content-start fw-semibold">
            <p>seguidores</p>
        </div>
    </div>
    <div class="row">
        <div class="valorSeguindo offset-5 col-1 fw-semibold">
            <p class="valor1">{{$totalFollows}}</p>
        </div>
        <div class="valorSeguidores col-1 fw-semibold">
            <p class="valor2">{{$totalFollowers}}</pcl>
        </div>
    </div>
    <div class="row mt-4">
        <div class="nomePerfil col d-flex justify-content-center mt-2">
            <h2>Albuns</h2>
        </div>
    </div>
    <div class="row">
        <div class="nomePerfil col d-flex justify-content-center mt-1 mb-4">
            <h3>{{$totalAlbums}}</h3>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>
                <a class="btn btn-primary fw-semibold m-2" id="imagens" href="{{url('/profile/images/' . $profile->id)}}" role="button">Imagem</a>
                <a class="btn btn-primary fw-semibold m-2" id="albuns" href="#" role="button">Albuns</a>
            </div>
            <div>
            </div>
            @if(Auth::id() == $profile->id)
            <div>
                <a class="btn btn-primary fw-semibold m-2" id="albuns" href="{{ url('/album/create') }}" role="button">Criar Album</a>
            </div>
            @endif
        </div>
    </div>
    <div class="m-5">
        <div class="row row-cols-lg-6">
            @foreach ($albums as $album)
                @if($album->private == 0 or Auth::id() == $album->user_id)
                    <div class="col">
                    <a href="{{url('/album/' . $album->id)}}">
                        <img id="posts" src="{{url('/imgs/album.png')}}" alt="album cover" width="250" height="250">
                        <p style="color: #bebaba">{{$album->title}}</p>
                    </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
@endsection
