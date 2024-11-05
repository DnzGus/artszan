@extends('adminlte::page')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form method="POST" action="{{ url('/tag/' . $tag->id) }}">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $tag->name }}">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
