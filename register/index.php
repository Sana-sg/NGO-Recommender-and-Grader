<?php

session_start();
include('db_connect.php');
$unqid=$name=$place=$address=$cause=$weblink="";
$errors=array('unqid'=>'','name'=>'','error'=>'');

if(isset($_POST['submit'])){
    $unqid=$_POST['unqid'];
    if(!preg_match('/^([a-zA-Z][a-zA-Z]\/[0-9]+\/[0-9]+)$/', $unqid)){
        $errors['unqid']="Enter a valid ID";
    }
    if(array_filter($errors)){
        echo 'errors in the form';
    }
    else{
        $unqid=$_POST['unqid'];
        $name=$_POST['name'];
        $place=$_POST['place'];
        $address=$_POST['address'];
        $cause=$_POST['cause'];
        $weblink=$_POST['weblink'];
        $password=$_POST['password'];

        $sql="INSERT INTO ngo(Name,Cause,Place,address,website,unique_id) VALUES('$name','$cause','$place','$address','$weblink','$unqid')";

        $sql_run=mysqli_query($conn,$sql);
        $sql1="INSERT INTO user(unique_id,password) VALUES('$unqid','$password')";
        $sql1_run=mysqli_query($conn,$sql1);
        if($sql_run && $sql1_run){
            header('Location: ../details/index.php');
        
    
    }
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
    <title>register form</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link href="css/style.css ?v=<?php echo time(); ?>" rel="stylesheet" />

</head>

<body>
    <ul>
    <li><a href="../index1.php">Home</a></li>
        <li><a href="../about.php">About</a></li>
      <li><a href="../top.php">Top 5</a></li>
      <li><a href="../contact.php">Contact Us</a>
        <li id="rightside"><a href="../register/index.php">Register</a></li>
        <li id="rightside"><a href="../details/login.php">Login</a></li>
      </ul>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Register NGO</h2>
                </div>
                <div class="card-body">
                    <form action="../register/index.php" method="POST">
                        <div class="form-row">
                            <div class="name">NGO Name</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="name" value="<?php echo $name ?>" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">NGO Cause</div>
                            <div class="value">
                                <div class="input-group">
                                <select class="input--style-6" name="cause" value="<?php echo $cause?>">
                                    <option disabled="disabled" selected="selected" value="<?php echo $cause?>">Choose option</option>
                                    <option>Aged/Elderly</option>
                <option>Animal Husbandry</option>
                <option>Agriculture</option>
                <option>Art & Culture</option>
                <option>Children</option>
                <option>Education & Literacy</option>
                <option>Health & Family Welfare</option>
                <option>Human Rights</option>
                <option>Labour & Employment</option>
                <option>Rural Development</option>
                <option>Sports</option>
                <option>Women Empowerment</option>
                <option>Others</option>
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="form-row">
                            <div class="name">Website Link</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="weblink" value="<?php echo $weblink ?>" placeholder=" Enter website link(If Any)">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Place</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="place" value="<?php echo $place ?>" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Full Address</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" name="address" value="<?php echo $address ?>" placeholder="Enter full address"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Unique ID</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="red-text"><?php echo $errors['unqid']; ?></div>
                                    <input class="input--style-6" type="text" name="unqid" value=" <?php echo $unqid ?>" placeholder="Enter your unique NGO ID">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="password" name="password">
                                </div>
                            </div>
                        </div>
                        <!---
                        <div class="form-row">
                            <div class="name">Upload Document</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="file_cv" id="file">
                                    <label class="label--file" for="file">Choose file</label>
                                    <span class="input-file__info">No file chosen</span>
                                </div>
                                <div class="label--desc">Upload your identification certificate. Max file size 50 MB</div>
                            </div>
                        </div>
                </div>--->
                <div class="card-footer">
                    <div class="col-2">
                    <!--<button class="btn btn--radius-2 btn--blue-2" type="submit" name="submit">Send Application</button>-->
                    <input class="btn btn--radius-2 btn--blue-2" type="submit" name="submit" value="Submit">
                </div>
                    </div>
                        
                </form>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>



    <script src="js/global.js"></script>

</body>

</html>
