<?php

session_start();
include('login/db_connect.php');



 ?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400" rel="stylesheet" />
    <link href="css/main.css ?v=<?php echo time(); ?>" rel="stylesheet" />
    <link href="css/style.css ?v=<?php echo time(); ?>" rel="stylesheet" />


  </head>
  <body>
     <!-- Menu section -->
     <ul>
    <li><a href="#">Home</a></li>
        <li><a href="about.php">About</a></li>
      <li><a href="top.php">Top 5</a></li>
      <li><a href="contact.php">Contact Us</a>
        <li id="rightside"><a href="register/index.php">Register</a></li>
        <li id="rightside"><a href="details/login.php">Login</a></li>
      </ul>
    
<!--- Search section --->

  <div class="s132">
   
      <form class="login-form" action="search.php" method="POST">
        <fieldset>  
        <legend>FIND TO FUND FOR THE BETTER!</legend>
        </fieldset>
        <div class="inner-form">
          <div class="input-field first-wrap">
            <div class="input-select">
              <select data-trigger=" " name="cause" class="form-control" required>
                <option placeholder="">Cause</option>
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
          <div class="input-field second-wrap">
            <input id="search" type="text" name="place" placeholder="Search By Cause OR Place" />
          </div>
          <div class="input-field third-wrap">
            <button class="btn-search" type="submit" name="submit" value="submit">Search</button>
          </div>
        </div>
      </form>
    </div>
    <script src="js/extention/choices.js"></script>
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false,
        itemSelectText: '',
      });

    </script>
</body>
</html>
