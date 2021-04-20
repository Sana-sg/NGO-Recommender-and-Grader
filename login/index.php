<?php 
session_start();
include('db_connect.php');
$uname=$password="";
$errors=array('uname' =>'' ,'password'=>'','error'=>'');
 
 if(isset($_POST['uname']) && isset($_POST['password']))
{
  $uname=$_POST['uname'];
  $password=$_POST['password'];
  if(empty($_POST['uname']) && empty($_POST['password'])){
    $errors['error']="Username and Password required";
  }
  elseif(empty($_POST['uname'])){
    $errors['uname']='Username is required <br/>';
  }
  elseif(empty($_POST['password'])){
    $errors['password']='Password is required <br/>';
  }
  else{
    $sql="SELECT * FROM admin WHERE username='$uname' AND password='$password'";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)===1){
      $row=mysqli_fetch_assoc($result);
      //if($row['username']===$uname && $row['password']===$password){
            $_SESSION['username']=$row['username'];
            $_SESSION['id']=$row['id'];
             header('Location: ../admin/index.php');
     //}else{
       //   $errors['error']="Incorrect Username or Password";
      //}
    }else{
      $errors['error']="Admin not found!";

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
    <link href="min.css ?v=<?php echo time(); ?>" rel="stylesheet" />
    <link rel="stylesheet"  href="style.css ?v=<?php echo time(); ?>">
</head>
<body>
  <ul>
      <li id="rightside"><a href="../index1.php">Home</a></li>
      <li id="rightside"><a href="../details/login.php">User Login</a></li>
      <li id="rightside"><a href="../register/index.php">Register</a></li>
      </ul>
<div class="login-page">
  <div class="form">
    <!--<form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>-->
    <form class="login-form" action="../login/index.php" method="POST">
      <div class="red-text"><?php echo $errors['error']; ?></div>
      <div class="red-text"><?php echo $errors['uname']; ?></div>
      <input type="text" placeholder="Username" name="uname" value="<?php echo $uname ?>" />
      <div class="red-text"><?php echo $errors['password']; ?></div>
      <input type="password" placeholder="Password" name="password" value="<?php echo $password ?>"/>
      <button type="submit">Login</button>
      <p class="message">*For admin use only</p>
    </form>
  </div>
</div>
</body>
<script type="text/javascript">
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>