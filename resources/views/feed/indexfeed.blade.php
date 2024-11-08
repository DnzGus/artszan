@foreach($posts as $post)
<br>--------------------------------------------------------------<br>
{{$post->id}}
{{$post->user->name}}
{{$post->title}}
 @for($i = 0; $i < count($post->tags_id); $i++)
  {{$tags[$i]->name}}
 @endfor
<br>-------------------------imagens-------------------------------<br>
 @foreach($post->images as $image)
  <img src="data:image/png;base64,{{ $image }}" alt="" />
 @endforeach
<br>--------------------------------------------------------------<br>
@endforeach