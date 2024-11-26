@extends('layouts.main')

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
          <form class="my-3" method="POST" action="{{ url('/album')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <select name="private" class="form-control" id="">
                <option value="0">Não</option>
                <option value="1">Sim</option>
              </select>
              <label for="title" class="form-label">Digite o titulo:</label>
              <input placeholder="title" type="text" class="form-control" id="exampleInputEmail1" name="title">
              <label for="image" class="form-label">Selecione as imagens que gostaria:</label>
              <br>
              @foreach($posts as $post)
              @foreach($post->images as $postimage)
                            <div class="d-flex">
                                <input type="checkbox" name="images[]" value="{{ $postimage->id }}">
                                <img src="data:image/png;base64,{{ $postimage->image }}" alt="{{$postimage->id}}" id="image" class="" width="600" height="500">
                            </input>
                        </div>
                @endforeach
            @endforeach
            <br>
          </div>
          <div class="text-right">
            <button type="submit" id="curtir" class="btn btn-success">Criar</button>
          </div>
            </form>
        </div>
    </div>
</div>
@endsection
