<form method="POST" action="{{ URL('/tag/' . $tag->id)}}">
 @csrf
 @method('PUT')

  <label for="name">Name:</label><br>
  <input type="text" name="name" placeholder="{{$tag->name}}"><br>
  <label for="description">Description:</label>
  <textarea type="textarea" name="description" placeholder="{{$tag->description}}"></textarea>
  <input type="submit" value="Submit">
</form>