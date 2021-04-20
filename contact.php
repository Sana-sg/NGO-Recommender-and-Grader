<?php 
include('login/db_connect.php');
if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phno'];
	$message=$_POST['msg'];
	if($name!="" && $email!="" && $phone!="" && $message!=""){
        $sql="INSERT INTO contact(name,email,phone,message) VALUES ('$name','$email','$phone','$message')";
        $sql_run=mysqli_query($conn,$sql);
        if($sql_run){
        	header('Location: contact.php');
        }
	}
}



?>







<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/stylecontact.css ?v=<?php echo time(); ?>">
</head>
<body>
	 <ul>
    <li><a href="index1.php">Home</a></li>
        <li><a href="about.php">About</a></li>
      <li><a href="top.php">Top 5</a></li>
      <li><a href="#">Contact Us</a>
        <li id="rightside"><a href="login/index.php">Login</a></li>
      </ul>
    
	<section class="contact">
		<h2> Contact Us</h2>
	<div class="container">
		<div class="contactInfo">
		<div class="box">
		<div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
		<div class="text">
		<h3> Address</h3>
		<p>Shine Arcade <br>1st lane road,Mangalore</p>
		</div>
		</div>
	<div class="box">
	<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
	<div class="text">
	<h3>Phone</h3>
	<p>0824-2464706</p>
	</div>
	</div>
	<div class="box">
	<div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
	<div class="text">
		<h3> Email</h3>
		<p>shine@gmail.com</p>
	</div>
	</div>
	</div>
</div>
<div class="wrapper">
  <div class="title">
    <h1></h1>
  </div>
  <div class="contact-form">
    <div class="input-fields">
    	<form action="contact.php" method="POST">
      <input type="text" class="input" name="name"placeholder="Name">
      <input type="email" class="input" name="email" placeholder="Email Address">
      <input type="text" class="input" name="phno" placeholder="Phone">
    </div>
    <div class="msg">
      <textarea name="msg" placeholder="Type your message..."></textarea>
      <input type="submit" class="btn" name="submit" value="Submit">
  </div>
</form>
  </div>
</div>
	</section>
</body>
</html>