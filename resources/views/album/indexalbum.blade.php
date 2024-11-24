<table class="table">
    <tr>
    <th>ID</th>
    <th>Titulo</th>
    </tr>
    @foreach ($albums as $album)
    <tr>
        <td>{{ $album->id }}</td>
        <td>{{ $album->title }}</td>
        <td><a href="{{URL('/album/' . $album->id)}}">album</a></td>
    </tr>
    @endforeach
</table>
<div class="d-flex justify-content-end m-5">
    <a class="btn btn-success" href="{{ url('/album/create') }}" role="button">Criar</a>
</div>