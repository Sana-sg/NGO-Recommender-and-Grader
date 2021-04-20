<?php 
session_start();
include('db_connect.php');
$unqid=$password="";
$errors=array('unqid' =>'' ,'password'=>'','error'=>'');
 
 if(isset($_POST['unqid']) && isset($_POST['password']))
{
  $unqid=$_POST['unqid'];
  $password=$_POST['password'];
  if(empty($_POST['unqid']) && empty($_POST['password'])){
    $errors['error']="ID and Password required";
  }
  elseif(empty($_POST['unqid'])){
    $errors['unqid']='ID is required <br/>';
  }
  elseif(empty($_POST['password'])){
    $errors['password']='Password is required <br/>';
  }
  else{
    $sql="SELECT * FROM user WHERE unique_id='$unqid' AND password='$password'";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)===1){
      $row=mysqli_fetch_assoc($result);
      //if($row['unqid']===$unqid && $row['password']===$password){
            $_SESSION['uniqid']=$row['unique_id'];
            $_SESSION['id']=$row['id'];
             header('Location: ../details/padd.php');
     //}else{
       //   $errors['error']="Incorrect Username or Password";
      
    }else{
      $errors['error']="User not found!";

    }
  }
}

?>




<!DOCTYPE html>
<head>
  <meta charset="utf-8">
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400" rel="stylesheet" />
    <link href="css/min.css ?v=<?php echo time(); ?>" rel="stylesheet" />
    <link rel="stylesheet"  href="css/style.css">
</head>
<body>
  <ul>
      <li id="rightside"><a href="../index1.php">Home</a></li>
      <li id="rightside"><a href="../login/index.php">Admin Login</a></li>
      <li id="rightside"><a href="../register/index.php">Register</a></li>

      </ul>
<div class="login-page">
  <div class="form">
    <form class="login-form" action="../details/login.php" method="POST">
      <div class="red-text"><?php echo $errors['error']; ?></div>
      <div class="red-text"><?php echo $errors['unqid']; ?></div>
      <input type="text" placeholder="NGO ID" name="unqid" value="<?php echo $unqid ?>" />
      <div class="red-text"><?php echo $errors['password']; ?></div>
      <input type="password" placeholder="Password" name="password" value="<?php echo $password ?>"/>
      <button type="submit">Login</button>
    </form>
  </div>
</div>
</body>
<script type="text/javascript">
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>