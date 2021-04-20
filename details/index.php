<?php
include('db_connect.php');
session_start();
$hygiene=$service=$structure="";
 if(isset($_POST['submit'])){
    $unqid=$_POST['unqid'];
    $act_name=$_POST['act_name'];
    $num_vol=$_POST['num_vol'];
    $num_act=$_POST['num_act'];
    $fund=$_POST['fund'];
    $pest=$_POST['pest'];
    $clean=$_POST['clean'];
    $wash=$_POST['wash'];
    $built=$_POST['built'];

    if($fund=="less than 10,000"){
        if($num_act<=5){
            $service=1;
        }
        elseif ($num_act>5 && $num_act<10) {
            $service=2;
            
        }
        elseif($num_act>=10){
            $service=3;
        }
    }
    elseif($fund=="10,000-20,000"){
        if($num_act<=5){
            $service=2;
        }
        elseif ($num_act>5 && $num_act<10) {
            $service=3;
            
        }
        elseif($num_act>=10){
            $service=4;
    }
}
elseif($fund=="more than 20,000"){
    if($num_act<=5){
            $service=3;
        }
        elseif ($num_act>5 && $num_act<10) {
            $service=4;
            
        }
        elseif($num_act>=10){
            $service=5;
    }
 }
 if($pest=="monthly"){
    if($clean=="in 2 days"){
        $hygiene=5;
    }
    elseif($clean=="in 4 days"){
        $hygiene=4;
    }
    elseif ($clean=="weekly") {
        $hygiene=3;
    }
 }
 elseif($pest=="in 6 months"){
    if($clean=="in 2 days"){
        $hygiene=4;
    }
    elseif($clean=="in 4 days"){
        $hygiene=3;
    }
    elseif ($clean=="weekly") {
        $hygiene=2;
    }
 }
 elseif($pest=="in 1 year"){
    if($clean=="in 2 days"){
        $hygiene=3;
    }
    elseif($clean=="in 4 days"){
        $hygiene=2;
    }
    elseif ($clean=="weekly") {
        $hygiene=1;
    }
 }
 if($wash=="1-2"){
    if($built=="weak"){
        $structure=1;
    }
    elseif($built=="moderate"){
        $structure=2;
    }
    elseif($built=="good"){
        $structure=3;
    }
 }
 elseif($wash=="2-3"){
    if($built=="weak"){
        $structure=2;
    }
    elseif($built=="moderate"){
        $structure=3;
    }
    elseif($built=="good"){
        $structure=4;
    }
 }
 elseif($wash=="3-5"){
    if($built=="weak"){
        $structure=3;
    }
    elseif($built=="moderate"){
        $structure=4;
    }
    elseif($built=="good"){
        $structure=5;
    }
 }
  $sql="SELECT * FROM ngo WHERE unique_id='$unqid'";
    $sql_run=mysqli_query($conn,$sql);
    foreach ($sql_run as $row){
        $ngo_id=$row['id'];
    }
    $sql1="INSERT INTO program(ngo_id,activity_name,num_volunteer) VALUES ('$ngo_id','$act_name','$num_vol')";
    $sql1_run=mysqli_query($conn,$sql1);

 $nsql="INSERT INTO rating(ngo_id,hygiene,service,structure) VALUES('$ngo_id','$hygiene','$service','$structure')";
 $nsql_run=mysqli_query($conn,$nsql);
  if($sql_run && $nsql_run){
        header('Location: ../details/padd.php');
    }

}


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Add Details</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link href="css/style.css ?v=<?php echo time(); ?>" rel="stylesheet" />
</head>

<body>
    <ul>
    <li><a href="#">Home</a></li>
        <li><a href="about.php">About</a></li>
      <li><a href="top.php">Top 5</a></li>
      <li><a href="contact.php">Contact Us</a>
        <li id="rightside"><a href="../register/index.php">Register</a></li>
        <li id="rightside"><a href="../login/index.php">Login</a></li>
      </ul>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Details</h2>
                    <form action="../details/index.php" method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">NGO Unique ID</label>
                                    <input class="input--style-4" type="text" name="unqid">
                                </div>
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Program Name</label>
                                    <input class="input--style-4" type="text" name="act_name">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Number of volunteers</label>
                                    <input class="input--style-4" type="number" name="num_vol">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Number of activities conducted</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4" type="number" name="num_act">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">What is the monthly fund collected?</label>
                                    <div class="input-group-icon">
                                        <div class="rs-select2 js-select-simple select--no-search">
                                <select name="fund">
                                    <option disabled="disabled" selected="selected"></option>
                                    <option>less than 10,000</option>
                                    <option>10,000-20,000</option>
                                    <option>more than 20,000</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">How frequently is the pest control perfomred?</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                <select name="pest">
                                    <option disabled="disabled" selected="selected"></option>
                                    <option>monthly</option>
                                    <option>in 6 months</option>
                                    <option>in 1 year</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">How frequently is the center cleaned?</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                <select name="clean">
                                    <option disabled="disabled" selected="selected"></option>
                                    <option>in 2 days</option>
                                    <option>in 4 days</option>
                                    <option>weekly</option>
                                    
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">How well is the washroom maitained?(rate)</label>
                                    <div class="rs-select2 js-select-simple select--no-search">
                                <select name="wash">
                                    <option disabled="disabled" selected="selected"></option>
                                    <option>1-2</option>
                                    <option>2-3</option>
                                    <option>3-5</option>
                                    
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                                </div>
                            </div>
                        <div class="col-2">
                        <div class="input-group">
                            <label class="label">How well is your center built?</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="built">
                                    <option disabled="disabled" selected="selected"></option>
                                    <option>weak</option>
                                    <option>moderate</option>
                                    <option>good</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                    </div>
                    </div>
                        <div class="p-t-15">
                            <input class="btn btn--radius-2 btn--blue" type="submit" name="submit" value="Submit">>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

</html>
