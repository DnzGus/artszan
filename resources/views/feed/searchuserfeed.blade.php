@foreach($sendPosts as $post)
<br>--------------------------------------------------------------<br>
{{$post->id}}
{{$post->user->name}}
{{$post->title}}
<br>-------------------------imagens-------------------------------<br>
 @foreach($post->images as $image)
  <img src="data:image/png;base64,{{ $image->image }}" alt="{{$image->id}}" / height="200" id="image">
  @endforeach
<br>--------------------------------------------------------------<br>
@endforeach