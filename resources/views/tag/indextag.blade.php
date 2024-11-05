@extends('adminlte::page')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-end m-5">
                    <a class="btn btn-success" href="{{ url('/tag/create') }}" role="button">Criar</a>
                </div>

                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th class="text-center">Ações</th>
                    </tr>
                    @foreach ($tags as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td class="d-flex justify-content-around">
                                <a href="{{ url('/tag/' . $value->id) . '/edit' }}" class="btn btn-warning btn-sm"
                                    role="button" aria-disabled="true">Editar</a>

                                <form method="POST" action='{{ url('/tag/' . $value->id) }}'>
                                    @method('DELETE')
                                    @csrf
                                    <input class="btn btn-danger btn-sm" role="button" value="Excluir" type="submit"></input>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
