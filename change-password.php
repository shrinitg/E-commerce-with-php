<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
	  require 'conn.php';
	  $errors = array();
	  
	  $email = trim($_POST['email']);
	  if(empty($email))
	  {
		 $errors[] = "you forget to enter your email";  
	  }
	  $passwd = trim($_POST['password']);
	  if(empty($passwd))
	  {
		 $errors[] = "you forget to enter old password"; 
	  }
	  
	  $new_passwd = trim($_POST['password1']);
	  $verify_passwd = trim($_POST['password2']);
	  if(!empty($new_passwd))
	  {
		  if(($new_passwd != $verify_passwd) || $password == $new_passwd)
		  {
			  $errors[] = "Your password didn't match the confirmed password";
			  $errors[] = "your old password is the same as your new passsword";
		  }
	  }
	  else
	  {
		 $errors[] = "you did not enter new password";	  
	  }
	  if(empty($errors))
	  {
		  $q = "Select email,password from register where email=$email";
		  $result = mysqli_query($conn,$q);
		  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		  $count = mysqli_num_rows($result);
		  if(($count == 1) && (password_verify($new_passwd, $row['password'])))
		  {
			$query = "Update register set password=$new_passwd where email=$email";
            $r = mysqli_query($conn,$query);
            if(mysqli_affected_rows($r) == 1)
			{
				header('location:password-thank.php');
				exit();
			}
             else
			 {
				 $errormsg = "you could not changed your password,We apologize for any inconvenience";
				echo "<p style='color:red;'>$errormsg</p>";
                exit();				
			 }				 
		  }
		  else{
			  $errorstring = "Error! <br/>";
			  $errorstring.="your email or password did not match with our Records!";
			  $errorstring.="Please try again";
			  echo "<p style='color:red;'>$errorstring</p>";
		  }
	  }
  }
  include 'template.php';
?>
<main role="main" class="container">
    <div class="jumbotron">
	<form method="post" onsubmit="return checked();">
	<div class="col-sm-8">
    <h2>Change Password</h2>
	 <div class="form-group row">
	  <label for="email" class="col-sm-8 col-form-label">Email:</label>
      <div class="col-sm-8">
      <input type="email"  class="form-control" name="email" placeholder="enter email"required>
	  </div>
	  </div>
	  <div class="form-group row">
      <label for="password" class="col-sm-8 col-form-label">Old Password:</label>
      <div class="col-sm-8">
	  <input type="password"  class="form-control" name="password" maxlength="12" minlength="8" placeholder="enter old password" required>
	  </div>
	   </div>
	   <div class="form-group row">
      <label for="password" class="col-sm-8 col-form-label">New Password:</label>
      <div class="col-sm-8">
	  <input type="password" class="form-control" id="password1" name="password1" maxlength="12" minlength="8" placeholder="enter New password" required>
	  <span id='message'>Between 8 and 12 characters.</span>
	   </div>
	   </div>
	   <div class="form-group row">
      <label for="password" class="col-sm-8 col-form-label">Confirm New Password:</label>
      <div class="col-sm-8">
	  <input type="password"  class="form-control" id="password2" name="password2" maxlength="12"  minlength="8" placeholder="confirm New password" required>
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
