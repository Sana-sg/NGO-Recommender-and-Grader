<?php 
include('includes/db_connect.php'); 
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="cad-header py-2">
			<h6 class="m-0 font-weight-bold text-primary">Delete Ratings</h6>
		</div>
		<div class="card-body">
			<?php 
if(isset($_POST['delete_rating']))
 {
?>
   	 <form action="code.php" method="post" enctype="multipart/form-data">
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
        <button type="submit" name="rate_dlt" class="btn btn-primary">GO</button>
   </form>
       <?php 
 }
?>