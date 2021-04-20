<?php

include('includes/db_connect.php');
include('includes/header.php');
include('includes/navbar.php');
$sql="SELECT * FROM contact";
$sql_run=mysqli_query($conn,$sql);
if($sql_run){
	$result=mysqli_fetch_all($sql_run,MYSQLI_ASSOC);
foreach($result as $row){ ?>
	<div class="col">
	<div class="container">
			<div class="card">                            
 <h1><?php echo $row['name'];?></h1>
   <h6><?php echo $row['message'];?></h6>
     <p><?php echo $row['time']; ?></p>

	</div>
</div>	                   
		                

<?php
	}
}


 ?>
 <html>
 <style type="text/css">
 	*{
 		margin:0;
 		padding:0;
 		box-sizing: border-box;
 	}
 	body{
 		width:100%;
 		margin:0 auto;
 		/*justify-content: center;
	align-items:center;
	min-height: 100vh;*/
 	}
 	.container{
 		/*padding:30px;*/
 		margin-top: 10px;
 		display: flex;
 		justify-content: space-around;
		align-items: center;
		flex-direction: column;
 	}
     .card{
      	width:400px;
     	height:200px;
     	padding: 10 20px;
     	margin: 20px;
     	background:#a9a9a9;
     	border:2px solid #000;
     }
     .card h1,h6,p{
     	color:#fff;
     }
     .card h1{
     	font-weight: 400px;
     	font-size: 50px;
     	margin:0 auto;
     	color:#000;

     }
     .card h6{
     	font-weight: 200px;
     	font-size: 20px;
     	padding:20px;
     }
     .card p{
     	padding-left:220px;
     	font-size:15px;
     }


 </style>
 <?php
include('includes/footer.php');
include('includes/scripts.php');
  ?>