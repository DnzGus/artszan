@extends('adminlte::page')

@section('content')
@if($profile->profilePhoto != null)
<img src="data:image/png;base64,{{ $profile->profilePhoto }}" alt="foto do usuário"  height="100" id="image"><br>
@else
<img src="{{URL('/imgs/userImage.png')}}" alt="foto do usuário"  height="100" id="image"><br>
@endif
{{$profile->name}}<br>
{{$profile->email}}<br>
{{$profile->dob}}<br>

<a href="{{URL('/profile/' . $profile->id . '/edit')}}">Editar o perfil</a>
@endsection
