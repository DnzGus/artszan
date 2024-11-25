<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex text-left my-3">
                <form action='{{ url('/postagem')}}'>
                    <input class="btn btn-secondary" role="button" value="Retornar" type="submit" ></input>
                </form>
            </div>
            </div>
            <form class="my-auto mx-3" method="POST" action='{{ url("/album/" . $album->id)}}'>
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger" role="button" value="Excluir" type="submit" ></input>
                </form>
                <table class="table my-5">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>private</th>
                                <th>criador</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{$album->title}}</td>
                                    <td class="d-flex flex-column justify-content-center">{{$album->private}}</td>
                                    <td>{{$album->user->name}}</td>
                                </tr>
                            </tbody>
                        </table>
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
</div>