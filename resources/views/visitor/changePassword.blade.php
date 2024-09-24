<form method="POST" action="{{ URL('/profile/' . $visitor->id . '/changepassword')}}">
 @csrf
 @method('PUT')

  <label for="password1">New Password:</label><br>
  <input type="password" name="password1"><br>
   <label for="password2">Repeat New Password:</label><br>
  <input type="password" name="password2"><br>
  <input type="submit" value="Submit">
  
</form> 