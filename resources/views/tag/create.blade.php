<form method="POST" action="{{ URL('/tag')}}">
 @csrf
  <label for="name">Name:</label><br>
  <input type="text" name="name"><br>
  <label for="description">Description:</label><br>
  <input type="text" name="description"><br><br>
  <input type="submit" value="Submit">
</form> 