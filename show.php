<?php
  include 'conn.php';
   $q = "select * from crup_table";
   $query = mysqli_query($conn,$q);

?>
  <table class="table table-hover">
		 <thead style="background:green;">
		   <tr>
		     <th>Title</th>
			 <th>Content</th>
			 <th>Update</th>
			 <th>Insert</th>
			 <th>Delete</th>
		   </tr>
		   </thead>
		   <?php foreach($query as $query) { ?>
		   <tr>
		     <td><?= $query['title']; ?></td>&nbsp;&nbsp;
			 <td><?= $query['content']; ?></td>
			 <td><a href="update.php?id=<?php echo $query['id']; ?>"><button class="btn btn-success">Update</button></a></td>
			 <td><a href="insert.php"><button class="btn btn-primary">Insert</button></a></td>
			<td><a href="delete.php?id=<?php echo $query['id'];?>" name="delete"><button class="btn btn-danger">Delete</button></a></td>
			</tr>
		   <?php } ?>
		</table>	