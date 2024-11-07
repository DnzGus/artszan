@foreach($posts as $post)
<br>--------------------------------------------------------------<br>
{{$post->id}}
{{$post->title}}
<br>-------------------------imagens-------------------------------<br>
 @foreach($post->images as $image)
  <img src="data:image/png;base64,{{ $image }}" alt="" />
 @endforeach
<br>--------------------------------------------------------------<br>
@endforeach