<form method="POST" action="{{ URL('/profile/' . $visitor->id)}}">
 @csrf
 @method('PUT')

  <label for="fname">Name:</label><br>
  <input type="text" name="name" placeholder="{{$visitor->name}}"><br>
  <label for="birthday">Birthday:</label>
  <input type="date" name="birthday">
  <input type="submit" value="Submit">
</form> 