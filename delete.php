<?php
  
      include 'conn.php';
      $id = $_GET['id'];
	  $q = "delete from crup_table where id=$id";
	  
	  if(mysqli_query($conn, $q))
	  {
		echo "Records were deleted successfully.";
	  } 
	  else
	  {
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	  }
	  mysqli_close($conn);
	  header('location:index.php');
?>