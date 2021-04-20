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
			if(isset($_POST['prgm_edit']))
 {
   $id=$_POST['edit_id'];

   $query=" SELECT * FROM program WHERE id='$id' ";
   $query_run= mysqli_query($conn,$query);
   foreach($query_run as $row_edit)
   {
   	 ?>

   	 <form action="code.php" method="post">
   	 	<input type="hidden" name="update_id" value="<?php echo $row_edit['id'] ?>">
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
        <input type="text" name="activity" class="form-control" value="<?php echo $row_edit['activity_name'] ?>">
       </div>
       <div class="form-group">
        <label> Number Of Volunteer </label>
        <input type="text" name="nvol" class="form-control" value="<?php echo $row_edit['num_volunteer'] ?>">
       </div>
      </div>
    </div>
       <a href="act.php" class="btn btn-danger">Cancel</a>
       <button type="submit" name="prgm_update" class="btn btn-primary">Update</button>
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