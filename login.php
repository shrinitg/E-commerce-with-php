<?php
  
 include 'conn.php'; 
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
	  $errors = array();
	  //$name = $_GET['name'];
	  $email = trim($_POST['email']);
	  $password = trim($_POST['password']);
	  if(empty($email))
	  {
		 $errors[] = "you email wrong"; 
	  }
	  if(empty($password))
	  {
		  $errors[] = "your password not match";
	  }
	  if(empty($errors))
	  {
		  $q = "select id,password from register where email='$email'";
		  $query = mysqli_query($conn,$q);
		  $row = mysqli_fetch_array($query,MYSQLI_NUM);
		  $count = mysqli_num_rows($query);
		  if($count == 1)
		  {
			 
			  if(password_verify($password,$row[1]))
			  {
				  session_start();
			     $_SESSION['email'] = $email;
			  }
		  }
		  else{
			   echo "ERROR: Could not able to execute $q. " . mysqli_error($conn);
		  }
	  }
  }

include 'template.php';
?>
<p></p>

<main role="main" class="container">
    <div class="jumbotron">
	<form method="post">
	<div class="col-sm-8">
    <h2>Login</h2>
	<div class="form-group row">
	  <label for="name" class="col-sm-8 col-form-label">Email:</label>
     <div class="col-sm-8">
	     <input type="email" class="form-control" name="email" placeholder="Enter Email">
	</div>
	</div>
	<div class="form-group row">
	  <label for="name" class="col-sm-8 col-form-label">Password:</label>
     <div class="col-sm-8">
		 <input type="password" class="form-control" name="password" placeholder="Enter password">
	</div>
	</div>
	<div class="form-group row">
		 <input type="Submit" class="btn btn-primary" value="Login">
	</div>
	 </form>
   </div>
</main>