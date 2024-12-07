@extends('layouts.main')
@section('content')
    <!-- TRENDS -->

    <div id="trends" class="container d-flex justify-content-evenly my-4">
        <a href="{{url('/feed')}}" class="fw-semibold">Inicio</a>
        <a href="{{url('/feed/mostnew')}}" class="fw-semibold">Recentes</a>
        <a href="{{url('/feed/liked')}}" class="fw-semibold">Curtidas</a>
    </div>

    <!-- MAIN -->

    @if(session('success'))
        <div class="alert alert-success m-2">
            {{session('success')}}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger m-2">
            {{session('error')}}
        </div>
    @endif

    <section id="banner" class="section-padding pb-5 pt-5 mb-5"
        style="background: linear-gradient(#00000060,#00000054), url(img/thumb-1920-1343746.png); background-position: 50% 30%; background-size: cover; height: 250px;">
        <div class="container text-center" style="filter: drop-shadow(10px 7px 10px #000000);">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-3 col-sm-6 mt-5">
                    <img src="{{url('/imgs/image.png')}}" alt="Logo Artszan">
                </div>
            </div>
        </div>
    </section>

    <!-- TAGS -->

    <div class="row ms-5">
        <div class="d-flex align-items-center col-lg-2">
            <a href="{{url('/feed/tag/6')}}">
                <img class="tagsIndex rounded-circle" src="{{url('/imgs/ficcao.jpg')}}" alt="Imagem das Tags">
            </a>
            <a href="{{url('/feed/tag/6')}}">
                <div class="ms-1">
                    <h5>Fanart</h5>
                </div>
            </a>
        </div>
        <div class="d-flex align-items-center col-lg-2">
            <a href="{{url('/feed/tag/9')}}">
                <img class="tagsIndex rounded-circle" src="{{url('/imgs/personagens.jpg')}}" alt="Imagem das Tags">
            </a>
            <a href="{{url('/feed/tag/9')}}">
                <div class="ms-1">
                    <h5>Animes</h5>
                </div>
            </a>
        </div>
        <div class="d-flex align-items-center col-lg-2">
            <a href="{{url('/feed/tag/5')}}">
                <img class="tagsIndex rounded-circle" src="{{url('/imgs/mecha.jpg')}}" alt="Imagem das Tags">
            </a>
            <a href="{{url('/feed/tag/5')}}">
                <div class="ms-1">
                    <h5>Personagens</h5>
                </div>
            </a>
        </div>
        <div class="d-flex align-items-center col-lg-2">
            <a href="{{url('/feed/tag/1')}}">
                <img class="tagsIndex rounded-circle" src="{{url('/imgs/fantasia.jpg')}}" alt="Imagem das Tags">
            </a>
            <a href="{{url('/feed/tag/1')}}">
                <div class="ms-1">
                    <h5>Animais</h5>
                </div>
            </a>
        </div>
        <div class="d-flex align-items-center col-lg-2">
            <a href="{{url('/feed/tag/3')}}">
                <img class="tagsIndex rounded-circle" src="{{url('/imgs/horror.jpg')}}" alt="Imagem das Tags">
            </a>
            <a href="{{url('/feed/tag/3')}}">
                <div class="ms-1">
                    <h5>Horror</h5>
                </div>
            </a>
        </div>
        <div class="d-flex align-items-center col-lg-2">
            <a href="{{url('/feed/tag/10')}}">
                <img class="tagsIndex rounded-circle" src="{{url('/imgs/pixel.jpg')}}" alt="Imagem das Tags">
            </a>
            <a href="{{url('/feed/tag/10')}}">
                <div class="ms-1">
                    <h5>Pixel</h5>
                </div>
            </a>
        </div>
    </div>
    <div class="text-center my-5">
        <button popovertarget="mypopover" id="curtir"><i class="bi bi-three-dots"></i></button>
        
        <dialog id="mypopover" popover="auto">
            <button popovertarget="mypopover" popovertargetaction="hide" class="icon1">❌</button>
            <div class="d-flex flex-column justify-content-evenly gap-2">
            @foreach ($tags as $tag)
            <a role="button" class="tagPopover fw-semibold" id="curtir" popovertarget="mypopover" href="{{url('/feed/tag/' . $tag->id)}}"
            popovertargetaction="hide">{{$tag->name}}</a>
            @endforeach
            </div>
        </dialog>
    </div>

    <!-- FEED -->
    <div class="mx-5">
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
@endsection