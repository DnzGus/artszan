@extends('layouts.main ')

@section('content')
<form class="my-3" method="POST" action="{{ url('/profile/' . $profile->id) }}" enctype="multipart/form-data">
 @method('PUT')
 @csrf
 <div class="row">
        <div class="col d-flex justify-content-center mt-5">
            <a href="#">
                 @if($profile->profilePhoto != null)
                  <img src="data:image/png;base64,{{ $profile->profilePhoto }}" alt="foto do usuário"  class="imagemUsuario2 rounded-circle"><br>
                  <div class="d-flex flex-column">
                   <label for="image" style="color: #bebaba" class="form-label">Alterar a foto de perfil</label>
                   <input type="file" name="image" id="uploadBtn2">
                  </div>
                  @else
                  <img src="{{URL('/imgs/userImage.png')}}" alt="foto do usuário"  class="imagemUsuario2 rounded-circle"><br>
                  <div class="d-flex flex-column">
                   <label for="image" style="color: #bebaba" class="form-label">Alterar a foto de perfil</label>
                   <input type="file" name="image" id="uploadBtn2">
                  </div>
                  @endif
            </a>
        </div>
    </div>
    <div class="d-flex flex-column align-items-center gap-3">
        <div class="nomePerfil col d-flex justify-content-center mt-2">
            <h2>{{$profile->name}}</h2>
        </div>
        <div class="d-flex flex-column">
         <label for="name" class="form-label">Alterar o nickname:</label>
         <input placeholder="{{$profile->name}}" type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$profile->name}}">
         <label for="email" class="form-label">Alterar o email:</label>
         <input placeholder="{{$profile->email}}" type="email" class="form-control" id="exampleInputEmail1" name="email">
         <label for="email" class="form-label">Alterar a data de nascimento:</label>
         <input type="date" name="dob" class="form-control" max="{{ (string) date("Y-n-d") }}"
         value="{{ (string) date("Y-n-d") }}" autofocus>
         <input type="hidden" name="tomorrow" class="form-control"
         value="{{ (string) date('Y-n-d', strtotime('+1 day'))}}" autofocus>
        </div>
        <button type="submit" class="btn btn-success">Editar</button>
       </div>
</form>
@endsection
