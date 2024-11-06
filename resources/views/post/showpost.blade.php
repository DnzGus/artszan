<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex text-left my-3">
                <form action='{{ url('/postagem')}}'>
                    <input class="btn btn-secondary" role="button" value="Retornar" type="submit" ></input>
                </form>
            </div>
            <div class="d-flex flex-row">
                <a class="btn btn-warning my-auto" href="{{ url('/post/'.$post->id.'/edit')}}" role="button">Editar</a>
                <form class="my-auto mx-3" method="POST" action='{{ url("/post/" . $post->id)}}' onsubmit="return ConfirmDelete()">
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger" role="button" value="Excluir" type="submit" ></input>
                </form>
            </div>
                <table class="table my-5">
                        <thead>
                            <tr>
                                <th>Categoria</th>
                                <th>Título</th>
                                <th class="text-center">Conteudo</th>
                                <th>nsfw</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th scope="row">{{$post->tag->name}}</th>
                                    <td>{{$post->title}}</td>
                                    <td class="d-flex flex-column justify-content-center">{{$post->description}}</td>
                                    <td class="d-flex flex-column justify-content-center">{{$post->nsfw}}</td>
                                </tr>
                            </tbody>
                        </table>
                        @if($post->images)
                        @foreach($post->images as $value)
                        <img src="data:image/png;base64,{{ $value }}" alt="" />
                        @endforeach
                        @else
                        <p>sem imagem</p>
                        @endif
                    </div>
    </div>
</div>