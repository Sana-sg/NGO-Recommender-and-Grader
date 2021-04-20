<?php

session_start();
include('db_connect.php');

if(isset($_POST['submit'])){
    $unqid=$_POST['unqid'];
    $act_name=$_POST['act_name'];
    $num_vol=$_POST['num_vol'];

    $sql="SELECT * FROM ngo WHERE unique_id='$unqid'";
    $sql_run=mysqli_query($conn,$sql);
    foreach ($sql_run as $row){
        $ngo_id=$row['id'];
    }
    $sql1="INSERT INTO program(ngo_id,activity_name,num_volunteer) VALUES ('$ngo_id','$act_name','$num_vol')";
    $sql1_run=mysqli_query($conn,$sql1);
    if($sql_run){
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
    <style type="text/css">
        a{
            text-decoration: none;
        }
    </style>
</head>

<body>
    <ul>
    <li><a href="#">Home</a></li>
        <li><a href="about.php">About</a></li>
      <li><a href="top.php">Top 5</a></li>
      <li><a href="contact.php">Contact Us</a></li>
        <li id="rightside"><a href="../register/index.php">Register</a></li>
        <li id="rightside"><a href="../login/index.php">Login</a></li>
    </ul>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">ADD Program</h2>
                    <form action="../details/padd.php" method="POST">
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
                        <div class="p-t-15">
                            <input class="btn btn--radius-2 btn--blue" type="submit" name="submit" value="Submit">
                            <br>
                            <br>
                            <a href="../index1.php" class="btn btn--radius-2 btn--green">GO TO HOME</a>
                        </div>
                    </div>
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