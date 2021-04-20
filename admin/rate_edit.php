<?php 
include('includes/db_connect.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="cad-header py-2">
			<h6 class="m-0 font-weight-bold text-primary">Edit Ratings</h6>
		</div>
		<div class="card-body">
			<?php 
if(isset($_POST['edit_rating']))
 {
  ?>
   	 <form action="rate_edit.php" method="post" enctype="multipart/form-data">
	       <?php
        $ngo="SELECT * FROM ngo";
        $ngo_run=mysqli_query($conn,$ngo);
        if(mysqli_num_rows($ngo_run) > 0){
          ?>
          <div class="form-group">
              <label> NGO Name/ID  </label>
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
        <button type="submit" name="rate_edit" class="btn btn-primary">GO</button>
   </form>
       <?php
   }  
 
?>
<?php 
if(isset($_POST['rate_edit'])){
  $id=$_POST['ngo_id'];

  $query="SELECT * FROM rating WHERE ngo_id='$id'";
  $query_run=mysqli_query($conn,$query);
  foreach($query_run as $row){
    ?>
   
     <form action="code.php" method="post">
      <div class="form-group">
        <label> NGO ID </label>
        <input type="text" name="edit_ngoid"value="<?php echo $row['ngo_id'] ?>" class="form-control" placeholder="Enter NGO ID">
       </div>
       <div class="form-group">
        <label> Hygiene </label>
        <input type="text" name="edit_hygiene"value="<?php echo $row['hygiene'] ?>" class="form-control" placeholder="Enter NGO Name">
       </div>
       <div class="form-group">
        <label> Service </label>
        <input type="text" name="edit_service" value="<?php echo $row['service'] ?>" class="form-control" placeholder="Enter Cause">
       </div>
        <div class="form-group">
        <label> Structure</label>
        <input type="text" name="edit_struct" value="<?php echo $row['structure'] ?>" class="form-control" placeholder="Enter Place">
       </div>
       </div>
     </div>
       <a href="rate.php" class="btn btn-danger">Cancel</a>
       <button type="submit" name="rate_update" class="btn btn-primary">Update</button>
   </form>
  <?php 
  }

}


?>
</div>

		</div>
	</div>

</div>

</div>
<?php 
include('includes/scripts.php');
include('includes/footer.php');

?>