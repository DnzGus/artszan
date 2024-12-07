@extends('layouts.main')

@section('content')

@if(session('success'))
    <div class="alert alert-success m-2">
        {{session('success')}}
    </div>
@endif
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
    <div class="row row-cols-2">
        <div class="seguindo col d-flex justify-content-end fw-semibold">
            <p>seguindo</p>
        </div>
        <div class="seguidores col d-flex justify-content-start fw-semibold">
            <p>seguidores</p>
        </div>
        <div class="valorSeguindo offset-5 col-1 fw-semibold">
            <p class="valor1">{{$totalFollows}}</p>
        </div>
        <div class="valorSeguidores col-1 fw-semibold">
            <p class="valor2">{{$totalFollowers}}</pcl>
        </div>
    </div>
    <div class="row row-cols-1 mt-4">
        <div class="nomePerfil col d-flex justify-content-center mt-2">
            <h2>Posts</h2>
        </div>
        <div class="nomePerfil col d-flex justify-content-center mt-1 mb-4">
            <h3>{{$totalPosts}}</h3>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-start">
            <div>
                <a class="btn btn-primary fw-semibold m-2" id="imagens" href="#" role="button">Imagem</a>
                <a class="btn btn-primary fw-semibold m-2" id="albuns" href="{{url('/profile/albums/' . $profile->id)}}" role="button">Albuns</a>
            </div>
        </div>
    </div>
    <div class="m-5">
        <div class="row row-cols-lg-6">
            @foreach ($posts as $post)
            <div class="col">
                <a href="{{url('/post/' . $post->id)}}">
                    <img  id="posts" src="{{ url('thumbs/' . $post->id) }}">
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
@endsection