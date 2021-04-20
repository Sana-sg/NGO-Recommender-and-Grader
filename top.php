<?php
session_start();
include('login/db_connect.php');
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Search Page</title>
 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="css/style2.css ?v=<?php echo time(); ?>" rel="stylesheet" />
    <link href="css/search.css ?v=<?php echo time(); ?>" rel="stylesheet" />

 </head>
 <body>
 	<!-- Menu section -->
     <ul>
    <li><a href="index1.php">Home</a></li>
        <li><a href="about.php">About</a></li>
      <li><a href="#">Top 5</a></li>
      <li><a href="contact.php">Contact Us</a>
        <li id="rightside"><a href="login/index.php">Login</a></li>
      </ul>
    
 	<h1 class="headt">TOP 5 </h1>
 <?php 
 $sql="SELECT ngo_id FROM rating ORDER BY 
                                    hygiene DESC,
                                    service DESC,
                                    structure DESC LIMIT 5";

  $sql_run=mysqli_query($conn,$sql);
  if($sql_run){
  $row= mysqli_fetch_all($sql_run,MYSQLI_ASSOC);
   }

 foreach ($row as $ans) {
	$id=$ans['ngo_id'];
	$ngo= "SELECT * FROM ngo WHERE id='$id' ";
	$ngo_run=mysqli_query($conn,$ngo);
	if($ngo_run){
  $result= mysqli_fetch_all($ngo_run,MYSQLI_ASSOC);
  foreach($result as $top){ 
  $ngo_id=$top['id']; ?>
    <div class="card-container">
   <div class="cards">
   <h4><?php echo $top['Name'];  ?></h4>
  	<h5> <?php echo $top['Cause']; ?></h5>
  	<h6><?php echo $top['address']; ?></h6><br>
  	<div class="weblink">
  	  <a href="<?php echo $top['website'];?>">
  	  <img src="./images/globe.png"></a>
  	</div>
  	<?php
  	$prgm="SELECT hygiene,service,structure FROM rating WHERE ngo_id='$ngo_id' ";
  	$prgm_run=mysqli_query($conn,$prgm);
  	if($prgm_run){	
  	 $got=mysqli_fetch_all($prgm_run,MYSQLI_ASSOC);
  	 foreach ($got as $get) {
  	 	$avg=($get['hygiene']+$get['service']+$get['structure'])/3; ?>
  	 	
        	<h5><?php echo number_format($avg,1)?></h5>
<?php } } ?>

</div>
</div>
<?php 
}
}	

}

?></body>
</html>