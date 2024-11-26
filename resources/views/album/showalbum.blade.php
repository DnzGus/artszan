@extends('layouts.main')

@section('content')
<section id="imagem" class="section-padding mb-5">
        <div class="row justify-content-evenly align-items-start text-white"
            style="filter: drop-shadow(10px 7px 10px #000000); margin: 25px;">
            <div class="col-auto" data-aos="fade-down" data-aos-delay="50">
                <div class="d-flex flex-column gap-2">
                    @if($album->images_id)
                        @foreach($album->images_id as $imageId)
                            @foreach($posts as $post)
                                @foreach($post->images as $image)
                                    @if($imageId == $image->id)
                                        <img src="data:image/png;base64,{{ $image->image }}" alt="" / height="200">
                                    @endif
                                @endforeach
                            @endforeach
                        @endforeach
                        @endif
                </div>
            </div>
            <div class="col-lg-3 mt-3">
                <div class="card" id="aside">
                    <div class="mt-4 d-flex flex-column">
                        <div class="d-flex justify-content-center flex-row mb-2">
                            @if($post->user->profilePhoto != null)
                                <img class="fotoPerfil rounded-circle" src="data:image/png;base64,{{$post->user->profilePhoto}} "alt="Imagem de Perfil de Usuário">
                            @else
                                <img class="fotoPerfil rounded-circle" src="{{url('/imgs/userImage.png')}}"alt="Imagem de Perfil de Usuário">
                            @endif
                            <div class="m-4">
                                <h5 class="nomeUsuario"><a style="color: #BEBABA" href="{{url('/profile/images/' . $post->user_id)}}">{{$post->user->name}}</a></h5>
                            </div>
                        </div>
                        <div class="btn-seguir">
                            @if($post->user_id != $user->id)
                            <a class="btn btn-primary fw-semibold" id="seguir" href="{{URL('/follow/' .$post->user->id)}}" role="button">seguir</a>
                            @endif
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="cardTitulo">
                                <h5 class="card-title d-flex justify-content-center">{{$album->title}}</h5>
                                <div class="d-flex justify-content-center">
                                    @if($post->user_id != $user->id)
                                    <form class="my-auto mx-3" method="POST" action='{{ url("/post/" . $post->id) . '/like'}}'>
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{$post->id}}" class="form-control">
                                        <input href="#" id="curtir" class="btn btn-primary fw-semibold" role="button" value="curtir" type="submit"></input>
                                    </form>
                                    @endif
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