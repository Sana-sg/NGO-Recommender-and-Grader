<?php
session_start(); 
include('includes/db_connect.php');
include('includes/header.php'); 
include('includes/navbar.php');
?>
<div class="modal fade" id="addrating" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Ratings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
      	<?php
      	$ngo="SELECT * FROM ngo";
      	$ngo_run=mysqli_query($conn,$ngo);
        if(mysqli_num_rows($ngo_run) > 0){
        	?>
        	<div class="form-group">
       	      <label> NGO Name </label>
       	       <select name="ngo_id" class="form-control" required>
       	       	<option value="">Choose NGO Name</option>
       	       	<?php 
       	       	     foreach ($ngo_run as $row) {
       	       	     	?>
       	       	     	<option value="<?php echo $row['id']; ?>"><?php echo $row['Name']; ?></option>
       	       	     	<?php 
       	       	     }
       	       	     ?>
       	       </select>
           </div>
           <?php
       }
       else{
       	echo "No Data available";
       }

      	?>
       <div class="form-group">
       	<label> Hygiene</label>
       	<input type="text" name="hygiene" class="form-control" placeholder="Give Rating in 5">
       </div>
       <div class="form-group">
       	<label> Service </label>
       	<input type="text" name="service" class="form-control" placeholder="Give Rating in 5">
       </div>
       <div class="form-group">
       	<label> Structure </label>
       	<input type="text" name="structure" class="form-control" placeholder="Give Rating in 5">
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="ratebtn" class="btn btn-primary">Save</button>
      </div>
  </form>
    </div>
  </div>
</div>

<div class="container-fluid">

<div class="card shadow mb-4" >
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text"> Ratings <br><br> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addrating">
  Add Ratings
</button>
</h6>
<br>
    <form action="rate_edit.php" method="post">
		<button type='submit' name="edit_rating" class='btn btn-success'>EDIT</button>
	</form>
	<br>
	<form action="rate_dlt.php" method="post">
		<button type='submit'name="delete_rating" class='btn btn-danger'>DELETE</button>
	</form>
</div>


<!----Table-->
<div class="card-body">
</div>
</div>
</div>
</div>

<?php 
include('includes/footer.php');
include('includes/scripts.php');


?>