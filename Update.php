<?php
   include 'conn.php';
   if(isset($_POST["submit"]))
   {
	$id = $_GET['id'];
	$title = $_POST['title'];
	$content = $_POST['content'];
    $q ="update crup_table set title='$title' , content='$content' where id=$id ";
    $query = mysqli_query($conn, $q);
    header('location:index.php');
   }
  include 'template.php';
?>
<br><br>

    
<main role="main" class="container">
    <div class="jumbotron">	
	  <form method="post">
	  <h2>Update</h2>
	    <div class="form-group row">
	   <label for="name" class="col-sm-8 col-form-label">Title:</label>
      <div class="col-sm-8">
	  <input type="text" name="title" class="form-control">
	  </div>
	  </div>
	   <div class="form-group row">
	   <label for="name" class="col-sm-8 col-form-label">Text:</label>
      <div class="col-sm-8">
	  <textarea col='40' rows='4' type="text" name="content"class="form-control"></textarea>
	  </div>
	  </div>
	  <input type="submit" class="btn btn-success" name="submit">
	 </form>
	 <br>
	<a href="index.php"><button class="btn btn-primary">Back</button></a>
	 </div>
</main>
 