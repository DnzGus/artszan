
<form method="POST" action='{{ url('/profile/' . $visitor->id)}}'>
@method('DELETE')
@csrf
<input class="btn btn-danger" role="button" value="Excluir" type="submit"></input>
</form>