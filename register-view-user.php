<?php
   require('conn.php'); 
   $query = "Select name,email from register"; 
   $result = mysqli_query($conn,$query);
   if($result)
   { 
   include 'template.php';
   $a = 0;
  ?>
  <main role="main" class="container">
    <div class="jumbotron">
	<table class="table table-striped">
    <thead>
      <tr>
        <th>User id</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
	 <?php  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	   { ?>
    <tbody>
      <tr>
        <td><?=  ++$a; ?></td>
        <td><?=  $row['name']; ?></td>
        <td><?= $row['email']; ?></td>
      </tr>
    </tbody>
   <?php     
	 } }
   else
   {
	   echo "Sorry, We could not retrived users";
   }
?>
</table>
</div>
</main>