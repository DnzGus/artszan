@foreach ($profiles as $profile)
 <a href="{{url('profile/' . $profile->id)}}">{{$profile->name}}</a>
 <a href="{{URL('/follow/' .$profile->id)}}">seguir</a>
@endforeach