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
          <form class="my-3" method="POST" action="{{ url('/post')}}" enctype="multipart/form-data">
            @csrf
              <div class="text-right">
                <button type="submit" class="btn btn-success">Criar</button>
              </div>
              <div class="mb-3">
                <label for="tag">Escolha a tag:</label>
                <div class="d-flex flex-row justify-content-between">
                  @foreach($tags as $value)
                  <input type="checkbox" id="{{$value->id}}" name="tags[]" value="{{$value->id}}">
                  <label for="{{$value->id}}">{{$value->name}}</label><br>
                  @endforeach
                </div>
                  <select name="nsfw" class="form-control" id="">
                   <option value="0">Não</option>
                    <option value="1">Sim</option>
                  </select>
                <label for="image" class="form-label">Insira a imagem:</label>
                <input type="file" name="images[]" multiple>
                <label for="title" class="form-label">Digite o titulo:</label>
                <input placeholder="title" type="text" class="form-control" id="exampleInputEmail1" name="title">
                <label for="description">Digite o conteúdo</label>
                <textarea name="description" id="inp_editor1" class="form-control" rows="3"></textarea>
              </div>
            </form>
            <script>
                var editor1 = new RichTextEditor("#inp_editor1");
            </script>
        </div>
    </div>
</div>
@endsection
