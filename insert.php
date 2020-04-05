<?php
  include 'conn.php';
   if(isset($_POST['done']))
   {
	   $title = $_POST['title'];
	   $content = $_POST['content'];
	   $q = "Insert into crup_table values('','$title','$content')";
	   $query = mysqli_query($conn, $q);
	   header('location:index.php');
   }
   include 'template.php';
?>
<p></p>
<p></p>
<p></p>
<main role="main" class="container">
    <div class="jumbotron">
	  <form method="post">
		<h1>Insert Text</h1>
	    <div class="form-group row">
	   <label for="name" class="col-sm-8 col-form-label">Title:</label>
      <div class="col-sm-8">
		<input type="text" class="form-control" name="title" placeholder="Enter your Title" required>
        </div>		
        </div>		
		<div class="form-group row">
	   <label for="name" class="col-sm-8 col-form-label">Text:</label>
       <div class="col-sm-8">
		<textarea class="form-control" name="content" rows="5" col="40" placeholder="Enter your Content here ..." required></textarea>
		</div>
		</div>
		<input type="submit" name="done" class="btn btn-success">
	</form>
	<br>
	<a href="index.php"><button class="btn btn-primary">Back</button></a>
 </div>
</main>
