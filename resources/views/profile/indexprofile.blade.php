@extends('layouts.main')
@section('content')
<div class="d-flex flex-column gap-2 my-5">
 @foreach ($profiles as $profile)
 <div class="d-flex gap-3 align-items-center">
  <h4 href="{{url('profile/' . $profile->id)}}" style="color: #bebaba">{{$profile->name}}</h4>
  <a href="{{URL('/follow/' .$profile->id)}}" id="curtir">seguir</a>
 </div>
 @endforeach
</div>
@endsection
