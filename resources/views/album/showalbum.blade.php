@extends('layouts.main')

@section('content')
<section id="imagem" class="section-padding mb-5">
        <div class="row justify-content-evenly align-items-start text-white"
            style="filter: drop-shadow(10px 7px 10px #000000); margin: 25px;">
            <div class="col-auto" data-aos="fade-down" data-aos-delay="50">
                <div class="d-flex flex-column gap-2">
                    @if($album->images_id)
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @for($i = 0; $i < count($album->images_id); $i++)
                                @if($i < 1)
                                    @foreach($posts as $post)
                                        @foreach($post->images as $image)
                                            @if($album->images_id[$i] == $image->id)
                                                <div class="carousel-item active">
                                                    <img src="data:image/png;base64,{{ $post->images[$i]->image }}" alt="{{$post->images[$i]->id}}" id="image" class="d-block" style="width: 50vw; height: 100vh;">
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @else
                                    @foreach($posts as $post)
                                        @foreach($post->images as $image)
                                            @if($album->images_id[$i] == $image->id)
                                                <div class="carousel-item">
                                                    <img src="data:image/png;base64,{{ $post->images[$i]->image }}" alt="{{$post->images[$i]->id}}" id="image" class="d-block" style="width: 50vw; height: 100vh;">
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endif
                            @endfor
                        </div>
                                @if(count($post->images) > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                @endif
                            </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-3 mt-3">
                <div class="card p-3" id="aside">
                    <div class="my-auto d-flex flex-column gap-2">
                        <div class="d-flex justify-content-center align-items-center flex-row">
                            @if($post->user->profilePhoto != null)
                            <img class="fotoPerfil rounded-circle" src="data:image/png;base64,{{$post->user->profilePhoto}} "alt="Imagem de Perfil de Usuário">
                            @else
                            <img class="fotoPerfil rounded-circle" src="{{url('/imgs/userImage.png')}}"alt="Imagem de Perfil de Usuário">
                            @endif
                            <div class="m-2 d-flex flex-column justify-content-center align-items-center">
                                <h5 class="nomeUsuario"><a style="color: #BEBABA" href="{{url('/profile/images/' . $post->user_id)}}">{{$post->user->name}}</a></h5>
                                @if(Auth::id() != $post->user_id)
                                @if(!$follows)
                                <div class="btn-seguir">
                                    <a class="btn btn-primary fw-semibold" id="seguir" href="{{URL('/follow/' .$post->user->id)}}" role="button">seguir</a>
                                </div>
                                @else
                                <form class="my-auto mx-3" method="POST" action='{{ url("/unFollow/" . $post->user->id)}}'>
                                    @method('DELETE')
                                    @csrf
                                    <input id="criarAlbum" role="button" value="Parar de seguir" type="submit"></input>
                                </form>
                                @endif
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="cardTitulo">
                                <h5 class="card-title d-flex justify-content-center">{{$album->title}}</h5>
                                <div class="d-flex justify-content-center align-items-center">
                                    @if(Auth::id() == $album->user_id)
                                        <a href="{{url('/album/' . $album->id . '/edit')}}" id="curtir" class="btn btn-primary fw-semibold" role="button">Editar</a>
                                    <form class="my-auto mx-3" method="POST" action='{{ url("/album/" . $album->id)}}'>
                                        @method('DELETE')
                                        @csrf
                                    <input class="btn btn-danger" role="button" value="Excluir" type="submit" ></input>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection