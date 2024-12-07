@extends('layouts.main')

@section('content')
<section id="imagem" class="section-padding mb-5">
        <div class="row justify-content-evenly align-items-start text-white"
            style="filter: drop-shadow(10px 7px 10px #000000); margin: 25px;">
            <div class="col-auto" data-aos="fade-down" data-aos-delay="50">
                {{-- <div class="d-flex flex-column gap-2">
                    @if($album->images_id)
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @for($i = 0; $i < count($album->images_id); $i++)
                            @if($i < 1)
                                @foreach($album->images_id as $imageId)
                                    @foreach($posts as $post)
                                        @foreach($post->images as $image)
                                            @if($imageId == $image->id)
                                                <div class="carousel-item active">
                                                    <img src="data:image/png;base64,{{ $post->images[$i]->image }}" alt="{{$post->images[$i]->id}}" id="image" class="d-block" style="width: 50vw; height: 100vh;">
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @else
                                @foreach($album->images_id as $imageId)
                                    @foreach($posts as $post)
                                        @foreach($post->images as $image)
                                            @if($imageId == $image->id)
                                                <div class="carousel-item">
                                                    <img src="data:image/png;base64,{{ $post->images[$i]->image }}" alt="{{$post->images[$i]->id}}" id="image" class="d-block" style="width: 50vw; height: 100vh;">
                                                </div>
                                            @endif
                                        @endforeach
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
            </div> --}}
            <div class="col-lg-3 mt-3">
                <div class="card" id="aside">
                    <div class="mt-4 d-flex flex-column">
                        <div class="d-flex justify-content-center flex-row mb-2">
                            @if($album->user->profilePhoto != null)
                                <img class="fotoPerfil rounded-circle" src="data:image/png;base64,{{$album->user->profilePhoto}} "alt="Imagem de Perfil de Usuário">
                            @else
                                <img class="fotoPerfil rounded-circle" src="{{url('/imgs/userImage.png')}}"alt="Imagem de Perfil de Usuário">
                            @endif
                            <div class="m-4">
                                <h5 class="nomeUsuario"><a style="color: #BEBABA" href="{{url('/profile/images/' . $album->user_id)}}">{{$album->user->name}}</a></h5>
                            </div>
                        </div>
                        <div class="btn-seguir">
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="cardTitulo">
                                <h5 class="card-title d-flex justify-content-center">{{$album->title}}</h5>
                                <div class="d-flex justify-content-center align-items-center">
                                        <a href="{{url('/album/' . $album->id . '/edit')}}" id="curtir" class="btn btn-primary fw-semibold" role="button">Editar</a>
                                    <form class="my-auto mx-3" method="POST" action='{{ url("/album/" . $album->id)}}'>
                                        @method('DELETE')
                                        @csrf
                                    <input class="btn btn-danger" role="button" value="Excluir" type="submit" ></input>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection