<form method="POST" action="{{ URL('/profile')}}">
 @csrf
  <label for="fname">Name:</label><br>
  <input type="text" name="name"><br>
  <label for="lname">Email:</label><br>
  <input type="email" name="email"><br><br>
  <label for="password">Password:</label><br>
  <input type="password" name="password"><br><br>
  <input type="submit" value="Submit">
</form> 