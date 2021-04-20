<?php 
session_start();
include('includes/db_connect.php');
if(isset($_POST['registerbtn'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$cpassword=$_POST['confirmpassword'];

	if($password===$cpassword){
      $query="INSERT INTO admin (username,password) VALUES('$username','$password')"; 
	$query_run=mysqli_query($conn,$query);

	if($query_run){
      // echo "Saved";
       $_SESSION['status']= "Admin Profile Added";
       $_SESSION['status_code']="success";
       header('Location: register.php');
	}
	else{
        $_SESSION['status']= "Admin Profile not Added";
        $_SESSION['status_code']="error";
       header('Location: register.php');
	}
	}

	else
	{
		$_SESSION['status']="Passwords does not match";
		$_SESSION['status_code']="warning";
		header('Location: register.php');
	}
}


if(isset($_POST['updatebtn']))
{ 
	$id=$_POST['edit_id'];
	$username=$_POST['edit_username'];
	$password=$_POST['edit_password'];

	$query="UPDATE admin SET username='$username', password='$password' WHERE id='$id' "; 
	$query_run=mysqli_query($conn,$query);

	if($query_run)
	{
		$_SESSION['status']="Data is Updated";
		$_SESSION['status_code']="success";
		header('Location: register.php');
	}
	else
	{
       $_SESSION['status']=" Data Not Upadted";
       $_SESSION['status_code']="error";
       header('Location: register.php');
	}
}


if(isset($_POST['deletebtn']))
{
	$id=$_POST['delete_id'];

	$query="DELETE FROM admin WHERE id='$id' ";
	$query_run=mysqli_query($conn,$query);

	if($query_run)
	{
      $_SESSION['status']= "Data Deleted";
      $_SESSION['status_code']="success";
      header('Location: register.php');
	}
	else
	{
		$_SESSION['status']="Data Not Deleted";
		$_SESSION['status_code']="error";
		header('Location: register.php');

	}
}


#NGO TABLE
if(isset($_POST['ngoset_btn']))
{
   $Name=$_POST['Name'];
   $Cause=$_POST['Cause'];
   $address=$_POST['address'];
   $Place=$_POST['Place'];
   $website=$_POST['website'];

   $query="INSERT INTO ngo (Name,Cause,Place,address,website) VALUES ('$Name','$Cause','$Place','$address','$website') ";
   $query_run=mysqli_query($conn,$query);
   if($query_run)
   {
    $_SESSION['status']= "NGO Data Added";
     $_SESSION['status_code']="success";
       header('Location: add.php');
    }
	else{
        $_SESSION['status']= "NGO Data not Added";
         $_SESSION['status_code']="error";
       header('Location: add.php');
   }
}

if(isset($_POST['ngoupdate']))
{ 
	$id=$_POST['edit_id'];
	$Name=$_POST['edit_name'];
	$Cause=$_POST['edit_cause'];
	$Place=$_POST['edit_place'];
	$address=$_POST['edit_address'];
	$website=$_POST['edit_website'];

	$query="UPDATE ngo SET Name='$Name', Cause='$Cause',Place='$Place',address='$address',website='$website' WHERE id='$id' "; 
	$query_run=mysqli_query($conn,$query);

	if($query_run)
	{
		$_SESSION['status']="Data is Updated";
		 $_SESSION['status_code']="success";
		header('Location: add.php');
	}
	else
	{
       $_SESSION['status']=" Data Not Upadted";
        $_SESSION['status_code']="error";
       header('Location: add.php');
	}
}

if(isset($_POST['delete_ngo']))
{
	$id=$_POST['delete_id'];

	$query="DELETE FROM ngo WHERE id='$id' ";
	$query_run=mysqli_query($conn,$query);

	if($query_run)
	{
      $_SESSION['status']= "Data Deleted";
       $_SESSION['status_code']="success";
      header('Location: add.php');
	}
	else
	{
		$_SESSION['status']="Data Not Deleted";
		 $_SESSION['status_code']="error";
		header('Location: add.php');

	}
}
  

if(isset($_POST['ratebtn']))
{
	$ngo_id=$_POST['ngo_id'];
	$hygiene=$_POST['hygiene'];
	$service=$_POST['service'];
	$structure=$_POST['structure'];

	$query="INSERT INTO rating(ngo_id,hygiene,service,structure) VALUES('$ngo_id','$hygiene','$service','$structure')";

	$query_run=mysqli_query($conn,$query);

	if($query_run)
	{
      $_SESSION['status']= "Data Added";
       $_SESSION['status_code']="success";
      header('Location: rate.php');
	}
	else
	{
		$_SESSION['status']="Data Not Added";
		 $_SESSION['status_code']="error";
		header('Location: rate.php');

	}

}


if(isset($_POST['rate_update']))
{ 
	$ngo_id=$_POST['edit_ngoid'];
	$hygiene=$_POST['edit_hygiene'];
	$service=$_POST['edit_service'];
	$structure=$_POST['edit_struct'];

	$query="UPDATE rating SET ngo_id='$ngo_id', hygiene='$hygiene', service='$service',structure='$structure' WHERE id='$id' "; 
	$query_run=mysqli_query($conn,$query);

	if($query_run)
	{
		$_SESSION['status']="Data is Updated";
		 $_SESSION['status_code']="success";
		header('Location: rate.php');
	}
	else
	{
       $_SESSION['status']=" Data Not Upadted";
        $_SESSION['status_code']="error";
       header('Location: rate.php');
	}
}



if(isset($_POST['rate_dlt']))
{
	$id=$_POST['ngo_id'];

	$query="DELETE FROM rating WHERE ngo_id='$id' ";
	$query_run=mysqli_query($conn,$query);

	if($query_run)
	{
      $_SESSION['status']= "Data Deleted";
       $_SESSION['status_code']="success";
      header('Location: rate.php');
	}
	else
	{
		$_SESSION['status']="Data Not Deleted"; 
		$_SESSION['status_code']="error";
		header('Location: rate.php');

	}
}


if(isset($_POST['prgmbtn']))
{
   $ngo_id=$_POST['ngo_id'];
   $activity_name=$_POST['activity'];
   $num_volunteer=$_POST['nvol'];

   $query="INSERT INTO program (ngo_id,activity_name,num_volunteer) VALUES ('$ngo_id','$activity_name','$num_volunteer') ";
   $query_run=mysqli_query($conn,$query);
   if($query_run)
   {
    $_SESSION['status']= "Data Added";
     $_SESSION['status_code']="success";
       header('Location: act.php');
    }
	else{
        $_SESSION['status']= "Data not Added";
         $_SESSION['status_code']="error";
       header('Location: act.php');
   }
}



if(isset($_POST['prgm_update']))
{
	$id=$_POST['update_id'];
	$ngo_id=$_POST['ngo_id'];
	$activity_name=$_POST['activity'];
	$num_volunteer=$_POST['nvol'];
    
    $query="UPDATE program SET ngo_id='$ngo_id', activity_name='$activity_name', num_volunteer='$num_volunteer' WHERE id='$id' "; 
	$query_run=mysqli_query($conn,$query);

	if($query_run)
	{
		$_SESSION['status']="Data is Updated";
		 $_SESSION['status_code']="success";
		header('Location: act.php');
	}
	else
	{
       $_SESSION['status']=" Data Not Upadted";
        $_SESSION['status_code']="error";
       header('Location: act.php');
	}

}





if(isset($_POST['prgm_dlt']))
{
	$id=$_POST['delete_id'];

	$query="DELETE FROM program WHERE id='$id' ";
	$query_run=mysqli_query($conn,$query);

	if($query_run)
	{
      $_SESSION['status']= "Data Deleted";
       $_SESSION['status_code']="success";
      header('Location: act.php');
	}
	else
	{
		$_SESSION['status']="Data Not Deleted";
		 $_SESSION['status_code']="error";
		header('Location: act.php');

	}
}






?>