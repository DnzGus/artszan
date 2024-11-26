@extends('layouts.main')
@section('content')
<!-- Main -->

    <section id="imagem" class="section-padding mb-5">
        <div class="row justify-content-evenly align-items-center text-white"
            style="filter: drop-shadow(10px 7px 10px #000000); margin: 25px;">
            <div class="col-auto" data-aos="fade-down" data-aos-delay="50">
                <form action="{{url('/album/' . $album->id)}}" method="POST">
                    <div class="d-flex flex-column gap-2">
                            @method('PUT')
                            @csrf
                            @foreach($post->images as $postimage)
                            <div class="d-flex">
                                <input type="checkbox" name="images[]" value="{{ $postimage->id }}">
                                <img src="data:image/png;base64,{{ $postimage->image }}" alt="{{$postimage->id}}" id="image" class="" width="600" height="500">
                            </input>
                        </div>
                            @endforeach
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary fw-semibold" id="curtir" role="button" type="submit">Editar</button>
                            </div>
                        </div>
                        </form>
            </div>
            <div class="col-lg-3 mt-3">
                <div class="card" id="aside">
                    <div class="mt-4 d-flex flex-column">
                        <div class="d-flex justify-content-center flex-row mb-2">
                            @if($post->user->profilePhoto != null)
                            <img class="fotoPerfil rounded-circle" src="data:image/png;base64,{{$post->user->profilePhoto}} "alt="Imagem de Perfil de Usuário">
                            @else
                            <img class="fotoPerfil rounded-circle" src="{{url('/imgs/userImage.png')}}"alt="Imagem de Perfil de Usuário">
                            
                            @endif"
                            <div class="m-4">
                                <h5 class="nomeUsuario">{{$post->user->name}}</h5>
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
                                    <form class="my-auto mx-3" method="POST" action='{{ url("/post/" . $post->id) . '/like'}}'>
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{$post->id}}" class="form-control">
                                    @if($post->user_id != $user->id)
                                        <input href="#" id="curtir" class="btn btn-primary fw-semibold" role="button" value="curtir" type="submit"></input>
                                    @endif
                                    </form>
                                    <a href="#" id="curtir" class="btn btn-primary fw-semibold mx-1">salvar</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
@endsection