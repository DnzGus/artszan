@extends('adminlte::page')

@section('content')

<link rel="stylesheet" href="{{ url('/richtexteditor/rte_theme_default.css') }}">
<script type="text/javascript" src="{{ url('/richtexteditor/rte.js') }}"></script>
<script type="text/javascript" src="{{ url('/richtexteditor/plugins/all_plugins.js') }}"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="text-left my-3">
              <form action='{{ url('/post')}}'>
                <input class="btn btn-secondary" role="button" value="Retornar" type="submit" ></input>
              </form>
            </div>
          <form class="my-3" method="POST" action="{{ url('/album/' . $album->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
              <div class="text-right">
                <button type="submit" class="btn btn-success">Editar</button>
              </div>
                  <select name="private" class="form-control" id="">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                  </select>
                <label for="title" class="form-label">Digite o titulo:</label>
                <input placeholder="{{$album->title}}" type="text" class="form-control" id="exampleInputEmail1" name="title">
                @foreach($posts as $post)
                    @foreach($post->images as $image)
                      @foreach ($album->images_id as $ids)
                        @if($ids == $image->id)
                        <input type="checkbox" name="removeImages[]" value="{{ $image->id }}">
                          <img src="data:image/png;base64,{{$image->image}}" alt="{{$image->id}}"" height="200" />
                        </input>
                      @endif
                    @endforeach
                  @endforeach
                @endforeach
              </div>
            </form>
        </div>
    </div>
</div>
@endsection
