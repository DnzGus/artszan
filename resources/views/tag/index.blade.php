@extends('adminlte::page')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-end m-5">
                <a class="btn btn-success" href="{{ url('/tag/create') }}" role="button">Criar</a>
            </div>
            @foreach($tags as $value)
                --{{$value->name}}--
                --{{$value->description}}--
                <form method="POST" action='{{ url('/tag/' . $value->id)}}'>
                    @method('DELETE')
                    @csrf
                    <input class="btn btn-danger" role="button" value="Excluir" type="submit"></input>
                </form>
            @endforeach

        </div>
    </div>
</div>
@endsection
