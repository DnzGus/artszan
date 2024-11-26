@extends('layouts.main')
@section('content')
<!-- Main -->

    <section id="imagem" class="section-padding mb-5">
        <div class="row justify-content-evenly align-items-start text-white"
            style="filter: drop-shadow(10px 7px 10px #000000); margin: 25px;">
            <div class="col-auto" data-aos="fade-down" data-aos-delay="50">
                <div class="d-flex flex-column gap-2">
                    @foreach($post->images as $image)
                    <img src="data:image/png;base64,{{ $image->image }}" alt="{{$image->id}}" id="image" class="" width="600" height="500">
                    @endforeach
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
                                <h5 class="card-title d-flex justify-content-center">{{$post->title}}</h5>
                                <p class="d-flex justify-content-center">{{$post->description}}</p>
                                <div class="d-flex justify-content-center">
                                    @if($post->user_id != $user->id)
                                    <form class="my-auto mx-3" method="POST" action='{{ url("/post/" . $post->id) . '/like'}}'>
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{$post->id}}" class="form-control">
                                        <input href="#" id="curtir" class="btn btn-primary fw-semibold" role="button" value="curtir" type="submit"></input>
                                    </form>
                                    @endif
                                    <button popovertarget="album" id="curtir" class="btn btn-primary fw-semibold mx-1"><i class="bi bi-three-dots"></i>salvar</button>

                                    <dialog id="album" popover="auto">
                                        <button popovertarget="album" popovertargetaction="hide" class="icon1">❌</button>
                                        <h3 class="d-flex justify-content-center mt-3 mb-4">
                                            Album
                                        </h3>
                                        <div class="d-flex flex-column justify-content-evenly gap-2">
                                        @foreach($albums as $album)
                                            <a role="button" class="tagPopover fw-semibold text-center" id="curtir" popovertarget="mypopover"
                                            popovertargetaction="hide" href="{{URL('/post/album/' . $post->id . '/' . $album->id )}}">{{$album->title}}</a>
                                            @endforeach
                                        </div>
                                    </dialog>
                                    <a href="#" id="curtir" class="btn btn-primary fw-semibold">compartilhar</a>
                                </div>
                            </div>
                        </div>
                        <div class="tags text-center">
                            <h5 class="card-title">Tags</h5>
                            <div class="card-body d-flex justify-content-evenly">
                                @for($i = 0; $i < count($post->tags_id); $i++)
                                    <p class="d-flex justify-content-center">{{$tags[$i]->name}}</p>
                                @endfor
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
                <textarea class="form-control text-white" style="background-color: #3E3C3C; border: #000000 ;" name="comment" id="exampleFormControlTextarea1" rows="1"></textarea>
                <input class="btn-primary fw-semibold" id="curtir" value="enviar" type="submit" ></input>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
@endsection
