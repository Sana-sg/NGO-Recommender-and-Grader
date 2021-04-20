<?php
session_start();
include('login/db_connect.php');
  if(isset($_POST['submit'])){
  $Place=$_POST['place'];
  $Cause=$_POST['cause'];
  if($Place!="" && $Cause!="Cause"){
  $sql="SELECT Name,Cause,address,id FROM ngo WHERE Place='$Place' and Cause='$Cause'";
  $sql_run=mysqli_query($conn,$sql);
  $result=mysqli_fetch_all($sql_run,MYSQLI_ASSOC);
  $_SESSION['values']=$result;
   mysqli_free_result($sql_run);

   //close
}
 else if( $Cause=="Cause" && $Place!=""){
  $sql="SELECT Name,Cause,address,id FROM ngo WHERE Place='$Place'";
  $sql_run=mysqli_query($conn,$sql);
  if($sql_run){
  $result=mysqli_fetch_all($sql_run,MYSQLI_ASSOC);
  $_SESSION['values']=$result;
   mysqli_free_result($sql_run);
 

   //close
 }
}
else if($Place=="" && $Cause!=""){
  $sql="SELECT Name,Cause,address,id FROM ngo WHERE Cause='$Cause'";
  $sql_run=mysqli_query($conn,$sql);
  if($sql_run){
  $result=mysqli_fetch_all($sql_run,MYSQLI_ASSOC);
  $_SESSION['values']=$result;
   mysqli_free_result($sql_run);
 

   //close
 }
}
}
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
    <link href="css/style1.css ?v=<?php echo time(); ?>" rel="stylesheet" />
    

 </head>
 <body>
  <ul>
    <li><a href="index1.php">Home</a></li>
        <li><a href="about.php">About</a></li>
      <li><a href="top.php">Top 5</a></li>
      <li><a href="contact.php">Contact Us</a>
        <li id="rightside"><a href="login/index.php">Login</a></li>
      </ul>
 	<section>
    <?php if($_SESSION['values']){ ?>
 		<h1>Search Results!!!</h1>
    <div class="container">
  <div class="row">
    <?php foreach($_SESSION['values'] as $row): 
    $ngo_id=$row['id']; ?>
            <div class="col s6 md3">
              <div class="card z-depth-0">
                <div class="card-content center">
                  <h5 class="clr">Name: </h5><h5><?php echo$row['Name'];?></h5><br>
                  <h5 class="clr">Cause: </h5><h6><?php echo  $row['Cause'];?></h6><br>
                  <h5 class="clr">Address: </h5><h6><?php echo $row['address'];?></h6><br>
                  
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
      <h5 class="clr">Rating: </h5>
          <h5><?php echo number_format($avg,1)?></h5>
<?php } } ?>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div><?php } 
          else{ ?>
              <h1 class="err">OOPS!!! No NGO's Found </h1>            

         <?php  }  ?>

          

          </div>
        </div>

  <div class="top">
     <h2>Want to know the top graded NGO's in Mangalore? Check the Top 5 now!! </h2><div class="lnk"><a href="top.php" target="_self">Click Here</a> </div><br><br>
  </div>
 </section>

 </body>
 <script type="text/javascript">
   if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
 </script>
 </html>