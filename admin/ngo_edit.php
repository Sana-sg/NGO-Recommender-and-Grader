<?php 
include('includes/db_connect.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="cad-header py-2">
			<h6 class="m-0 font-weight-bold text-primary">EDIT NGO DATA</h6>
		</div>
		<div class="card-body">
			<?php 
			if(isset($_POST['edit_ngo']))
 {
   $id=$_POST['edit_id'];

   $query=" SELECT * FROM ngo WHERE id='$id' ";
   $query_run= mysqli_query($conn,$query);
   foreach($query_run as $row)
   {
   	 ?>

   	 <form action="code.php" method="post">
   	 	<input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">
	<div class="form-group">
       	<label> Name </label>
       	<input type="text" name="edit_name"value="<?php echo $row['Name'] ?>" class="form-control" placeholder="Enter NGO Name">
       </div>
       <div class="form-group">
       	<label> Cause </label>
       	<input type="text" name="edit_cause" value="<?php echo $row['Cause'] ?>" class="form-control" placeholder="Enter Cause">
       </div>
        <div class="form-group">
        <label> Place </label>
        <input type="text" name="edit_place" value="<?php echo $row['Place'] ?>" class="form-control" placeholder="Enter Place">
       </div>
        <div class="form-group">
        <label> Address </label>
        <input type="text" name="edit_address" value="<?php echo $row['address'] ?>" class="form-control" placeholder="Enter Complete Address">
         <div class="form-group">
        <label> Website </label>
        <input type="text" name="edit_website" value="<?php echo $row['website'] ?>" class="form-control" placeholder="Enter NGO Website">
       </div>
       </div>
       <a href="add.php" class="btn btn-danger">Cancel</a>
       <button type="submit" name="ngoupdate" class="btn btn-primary">Update</button>
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