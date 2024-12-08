@extends('layouts.main')
@section('content')
<!-- Main -->

    <section id="imagem" class="section-padding mb-5">
        <div class="row justify-content-evenly align-items-start text-white"
            style="filter: drop-shadow(10px 7px 10px #000000); margin: 25px;">
            <div class="col-auto" data-aos="fade-down" data-aos-delay="50">
                <div class="d-flex flex-column gap-2">
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @for($i = 0; $i < count($post->images); $i++)
                            @if($i < 1)
                            <div class="carousel-item active">
                                <img src="data:image/png;base64,{{ $post->images[$i]->image }}" alt="{{$post->images[$i]->id}}" id="image" class="d-block" style="width: 50vw; height: 100vh;">
                            </div>
                            @else
                            <div class="carousel-item">
                                <img src="data:image/png;base64,{{ $post->images[$i]->image }}" alt="{{$post->images[$i]->id}}" id="image" class="d-block" style="width: 50vw; height: 100vh;">
                            </div>
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
                                <h5 class="card-title d-flex justify-content-center">{{$post->title}}</h5>
                                <p class="d-flex justify-content-center">{{$post->description}}</p>
                                <div class="d-flex align-items-center justify-content-around gap-2">
                                    @if(!$liked)
                                    <form class="" method="POST" action='{{ url("/post/" . $post->id) . '/like'}}'>
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{$post->id}}" class="form-control">
                                        <input href="#" id="curtir" class="btn btn-primary fw-semibold" role="button" value="curtir" type="submit"></input>
                                    </form>
                                    @else
                                    <form class="" method="POST" action="{{ url('/post/' . $post->id . '/unlike')}}">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{$post->id}}" class="form-control">
                                        <input href="#" id="curtir" class="btn btn-primary fw-semibold" role="button" value="Descurtir" type="submit"></input>
                                    </form>
                                    @endif
                                    <button popovertarget="album" id="curtir" class="btn btn-primary fw-semibold d-flex"><i class="bi bi-folder"></i> salvar</button>
                                    
                                    <dialog id="album" popover="auto">
                                        <button popovertarget="album" popovertargetaction="hide" class="icon1">❌</button>
                                        <h3 class="d-flex justify-content-center my-3">
                                            Albuns
                                        </h3>
                                        <div class="d-flex flex-column justify-content-evenly gap-2">
                                            @foreach($albums as $album)
                                            <a role="button" class="tagPopover fw-semibold text-center" id="curtir" popovertarget="mypopover"
                                            popovertargetaction="hide" href="{{URL('/post/album/' . $post->id . '/' . $album->id )}}">{{$album->title}}</a>
                                            @endforeach
                                            <a role="button" class="tagPopover fw-semibold text-center" id="criarAlbum" popovertarget="mypopover"
                                            popovertargetaction="hide" href="{{URL('/album/create')}}">Criar Album</a>
                                        </div>
                                    </dialog>
                                    @if($post->user_id == Auth::id())
                                    <a href="{{url('/post/' . $post->id . '/edit')}}" id="curtir" class="btn btn-primary fw-semibold" role="button">Editar</a>  
                                    <form class="" method="POST" action='{{ url("/post/" . $post->id)}}'>
                                        @method('DELETE')
                                        @csrf
                                        <input class="btn btn-danger" role="button" value="Excluir" type="submit" ></input>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tags d-flex flex-column justify-content-evenly align-items-center gap-2">
                            <h5 class="card-title">Tags</h5>
                            <div class="d-flex flex-row justify-content-around align-items-center gap-2">
                                    @for($i = 0; $i < count($post->tags_id); $i++)
                                    <p class="">{{$tags[$i]->name}}</p>
                                    @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    
    <div class="mb-3 row justify-content-center" style="filter: drop-shadow(10px 7px 10px #000000);">
        <div class="col-lg-9">
            <label for="exampleFormControlTextarea1" class="form-label fw-semibold" style="color: #BEBABA;">Comentários:</label><br>
            @foreach($comments as $comment)
            <p class="nomeUsuario">{{$comment->user->name}}: {{$comment->comment}}</p><br>
            @endforeach
            <form class="my-auto mx-3" method="POST" action='{{ url("/post/" . $post->id) . '/comment'}}'>
                @csrf
                <input type="hidden" name="post_id" value="{{$post->id}}" class="form-control">
                <input type="text" class="form-control text-white" style="background-color: #3E3C3C; border: #000000 ;" name="comment"></input>
                <br>
                <input class="btn-primary fw-semibold" id="curtir" value="enviar" type="submit"></input>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
@endsection
