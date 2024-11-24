@extends('adminlte::page')

@section('content')
<form class="my-3" method="POST" action="{{ url('/profile/' . $profile->id) }}" enctype="multipart/form-data">
 @method('PUT')
 @csrf
 @if($profile->profilePhoto != null)
 <img src="data:image/png;base64,{{ $profile->profilePhoto }}" alt="foto do usuário"  height="100" id="image"><br>
 <label for="image" class="form-label">Alterar a foto de perfil:</label>
 <br><input type="file" name="image"><br>
 @else
 <img src="{{URL('/imgs/userImage.png')}}" alt="foto do usuário"  height="100" id="image"><br>
 <label for="image" class="form-label">Alterar a foto de perfil:</label>
 <br><input type="file" name="image"><br>
 @endif
 <label for="name" class="form-label">Alterar o nickname:</label>
 <input placeholder="{{$profile->name}}" type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$profile->name}}">
 <label for="email" class="form-label">Alterar o email:</label>
 <input placeholder="{{$profile->email}}" type="email" class="form-control" id="exampleInputEmail1" name="email">
 <label for="email" class="form-label">Alterar a data de nascimento:</label>
 <input type="date" name="dob" class="form-control" max="{{ (string) date("Y-n-d") }}"
 value="{{ (string) date("Y-n-d") }}" autofocus>
 <input type="hidden" name="tomorrow" class="form-control"
 value="{{ (string) date('Y-n-d', strtotime('+1 day'))}}" autofocus>
 <button type="submit" class="btn btn-success">Editar</button>
</form>
@endsection
