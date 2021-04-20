<?php
session_start(); 
include('includes/db_connect.php');
include('includes/header.php'); 
include('includes/navbar.php');
?>
<div class="modal fade" id="addprogram" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Programs/Activities </h5>
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
       	<label> Activity/Program Name </label>
       	<input type="text" name="activity" class="form-control" placeholder="Enter Activity Name">
       </div>
       <div class="form-group">
       	<label> Number Of Volunteer </label>
       	<input type="text" name="nvol" class="form-control" placeholder="Enter Number Of Volunteer">
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="prgmbtn" class="btn btn-primary">Save</button>
      </div>
  </form>
    </div>
  </div>
</div>

<div class="container-fluid">

<div class="card shadow mb-4" >
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text"> Programs <br><br> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addprogram">
  Add Program Details
</button>
</h6>
</div>


<!----Table-->
<div class="card-body">
   <div class="table-responsive">
    <?php
             $query="SELECT * FROM program";
             $query_run=mysqli_query($conn,$query);

     ?>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>ID</th>
        <th>NGO ID(Name)</th>
        <th>Actitvity Name</th>
        <th>Num_Volnteer</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
      </thead>
      <tbody>
        <?php
        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          {
            $prgm_id=$row['ngo_id'];
            $prgm="SELECT * FROM ngo WHERE id='$prgm_id'";
            $prgm_run=mysqli_query($conn,$prgm);
                       ?>

                     <tr>
          <td><?php echo $row['id']; ?></td>
          <td>
            <?php foreach($prgm_run as $prgm_row) { echo $prgm_row['Name']; } ?></td>
          <td> <?php echo $row['activity_name']; ?></td>
          <td> <?php echo $row['num_volunteer']; ?></td>
          <td>
            <form action="act_edit.php" method="post">
              <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
            <button type='submit' name="prgm_edit" class='btn btn-success'>EDIT</button>
          </form>
          </td>
        
          <td>
            <form action="code.php" method="post">
              <input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
            <button type='submit'name="prgm_dlt" class='btn btn-danger'>DELETE</button>
          </form>
          </td>
        </tr>


                       <?php 
          }

        }
        else{
          echo "No Record Found";
        }   

        ?>
      </tbody>
    </table>
  </div>
</div>
					
</div>
</div>
</div>
</div>

<?php 
include('includes/footer.php');
include('includes/scripts.php');


?>