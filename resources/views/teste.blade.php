@foreach ($follows as $follow)
  @foreach($follow->followUser as $user)
  {{$user->name}}
  @endforeach
@endforeach