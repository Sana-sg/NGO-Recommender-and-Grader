<?php
session_start(); 
include('includes/db_connect.php');
include('includes/header.php'); 
include('includes/navbar.php');
?>
<div class="modal fade" id="addngodata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add NGO Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
       <div class="form-group">
       	<label> Name </label>
       	<input type="text" name="Name" class="form-control" placeholder="Enter NGO Name">
       </div>
       <div class="form-group">
       	<label> Cause </label>
       	<input type="text" name="Cause" class="form-control" placeholder="Enter Cause ">
       </div>
       <div class="form-group">
       	<label> Place </label>
       	<input type="text" name="Place" class="form-control" placeholder="Enter Place">
       </div>
        <div class="form-group">
       	<label> Address </label>
       	<input type="text" name="address" class="form-control" placeholder="Enter Complete Address">
       </div>
        <div class="form-group">
       	<label> Website </label>
       	<input type="text" name="website" class="form-control" placeholder="Enter Website link">
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="ngoset_btn" class="btn btn-primary">Save</button>
      </div>
  </form>
    </div>
  </div>
</div>

<div class="container-fluid">

<div class="card shadow mb-4" >
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text">NGO Data <br><br> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addngodata">
  Add NGO Details
</button>
</h6>
</div>

<!----Table-->
<div class="card-body">
	<div class="table-responsive">
		<?php
             $query="SELECT * FROM ngo ORDER BY id";
             $query_run=mysqli_query($conn,$query);

		 ?>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
			    <th>ID</th>
				<th>Name</th>
				<th>Cause</th>
				<th>Address</th>
				<th>EDIT</th>
				<th>Delete</th>
			</tr>
			</thead>
			<tbody>
				<?php
				if(mysqli_num_rows($query_run) > 0)
				{
					while($row = mysqli_fetch_assoc($query_run))
					{
                       ?>

                     <tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['Name'];  ?></td>
					<td> <?php echo $row['Cause']; ?></td>
					<td> <?php echo $row['address']; ?></td>
					<td>
						<form action="ngo_edit.php" method="post">
							<input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
						<button type='submit' name="edit_ngo" class='btn btn-success'>EDIT</button>
					</form>
					</td>
				
					<td>
						<form action="code.php" method="post">
							<input type="hidden" name="delete_id" value="<?php echo $row['id'] ?>">
						<button type='submit'name="delete_ngo" class='btn btn-danger'>DELETE</button>
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

<?php 
include('includes/footer.php');
include('includes/scripts.php');


?>