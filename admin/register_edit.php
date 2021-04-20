<?php 
include('includes/db_connect.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="cad-header py-2">
			<h6 class="m-0 font-weight-bold text-primary">EDIT Admin Profile</h6>
		</div>
		<div class="card-body">
			<?php 
			if(isset($_POST['edit_btn']))
 {
   $id=$_POST['edit_id'];

   $query=" SELECT * FROM admin WHERE id='$id' ";
   $query_run= mysqli_query($conn,$query);
   foreach($query_run as $row)
   {
   	 ?>

   	 <form action="code.php" method="post">
   	 	<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
	<div class="form-group">
       	<label> Username</label>
       	<input type="text" name="edit_username"value="<?php echo $row['username'] ?>" class="form-control" placeholder="Enter Username">
       </div>
       <div class="form-group">
       	<label> Password</label>
       	<input type="password" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Enter Password">
       </div>
       <a href="register.php" class="btn btn-danger">Cancel</a>
       <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
   </form>
       <?php
   }  
 }
?>
		</div>
	</div>

</div>

</div>

 <?php

include('includes/scripts.php');
include('includes/footer.php');

 ?>