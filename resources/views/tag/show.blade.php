@extends('adminlte::page')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{ $tag->name }}

            </div>
        </div>
    </div>
@endsection
