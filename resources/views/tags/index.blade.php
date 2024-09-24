@extends('adminlte::page')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th class="text-center">Ações</th>
                </tr>
                @foreach ($tags as $value)

                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->nome }}</td>
                    <td class="d-flex justify-content-around">
                        <a href="{{ url('/tag/' .  $value->id) }}" class="btn btn-primary btn-sm" role="button" aria-disabled="true">Visualizar</a>

                        <a href="{{ url('/tag/' .  $value->id) . "/edit" }}" class="btn btn-warning btn-sm" role="button" aria-disabled="true">Editar</a>

                        <form method="POST" action='{{url('/tag/' . $value->id)}}' onsubmit="return ComfirmDelete()">
                            @method('DELETE')
                            @csrf
                            <input class="btn btn-danger btn-sm" role="button" type="submit" value="Excluir">
                        </form>
                    </td>
                </tr>
                    @endforeach
            </table>

        </div>
    </div>
</div>
@endsection
