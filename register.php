<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
	 include 'conn.php';
	 $errors = array();
     $name = filter_var( mysqli_real_escape_string($conn,$_POST['name']), FILTER_SANITIZE_STRING);
	 if(empty($name))
	  {
		$errors[] = 'You forgot to enter your name.';
	  }	
     $email = filter_var( mysqli_real_escape_string($conn,$_POST['email']), FILTER_SANITIZE_EMAIL);
	  if ((empty($email)) || (!filter_var($email, FILTER_VALIDATE_EMAIL)))
	  {
		  $errors[] = 'You forgot to enter your email address';
          $errors[] = ' or the e-mail format is incorrect.';
	  }
	 $password1 = filter_var( mysqli_real_escape_string($conn,$_POST['password1']), FILTER_SANITIZE_STRING);
     $password2 = filter_var( mysqli_real_escape_string($conn,$_POST['password2']), FILTER_SANITIZE_STRING);
     if (!empty($password1)) {
     if ($password1 !== $password2) {
        $errors[] = 'Your two password did not match.';
      }
     } else {
     $errors[] = 'You forgot to enter your password.';
      }
	  if(empty($errors))
	  {
		  $q = "insert into register values('','$name','$email',SHA1('$password'))";
		  if(mysqli_query($conn,$q) == 1)
		  {
			  header('location:thank.php');
			  exit();
		  }
		  else{
			  echo "error";
		  }
	  }
  }
  include 'template.php';
?>
<p></p>
<script>  
function checked() 
{
  if (document.getElementById('password1').value ==
 document.getElementById('password2').value) {
 document.getElementById('message').style.color = 'green';
 document.getElementById('message').innerHTML = 'Passwords match';
 return true;
 } else {
 document.getElementById('message').style.color = 'red';
 document.getElementById('message').innerHTML = 'Passwords do not match';
 return false;
 }
}
</script>
<main role="main" class="container">
    <div class="jumbotron">
	<form method="post" onsubmit="return checked();">
	<div class="col-sm-8">
   <h2>Register</h2>
	 <div class="form-group row">
	  <label for="name" class="col-sm-8 col-form-label">Name:</label>
     <div class="col-sm-8">
	  <input type="text" name="name" class="form-control" placeholder="enter name"required>
	  </div>
	  </div>
	  <div class="form-group row">
	  <label for="email" class="col-sm-8 col-form-label">Email:</label>
      <div class="col-sm-8">
      <input type="email"  class="form-control" name="email" placeholder="enter email"required>
	  </div>
	  </div>
	  <div class="form-group row">
      <label for="password" class="col-sm-8 col-form-label">Password:</label>
      <div class="col-sm-8">
	  <input type="password"  class="form-control" id="password1" name="password1"   maxlength="12" minlength="8" placeholder="enter password" required>
	  <span id='message'>Between 8 and 12 characters.</span>
	   </div>
	   </div>
	   <div class="form-group row">
      <label for="password" class="col-sm-8 col-form-label">Confirm Password:</label>
      <div class="col-sm-8">
	  <input type="password"  class="form-control" id="password2" name="password2" maxlength="12"  minlength="8" placeholder="confirm password" required>
	  </div>
	  </div>
	  <div class="form-group row">
      <div class="col-sm-12">
	  <input type="submit" class="btn btn-primary" name="submit">
	  </div>
	  </div>
	  </div>
	</form>
    </div>
</main>
