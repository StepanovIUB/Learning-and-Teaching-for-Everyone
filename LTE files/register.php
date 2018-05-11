<?php
include 'function.php';
?>



<html>
<head>
<meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=0.35">
                <link rel="stylesheet" type="text/css" href="style.css">

                <link rel="stylesheet" href="registeration.css">

</head>
<body>






<!---------- Header ---------->
                <div class="header">
                        <div class="logo">
                                <a href="home.php"><img src="images/logo.jpg"></a>
                        </div>
                        <div class="gnb">
                                <div class="gnb1">
                                        <li><a href="home.php">Home</a></li>
                                        <li><a href="about.php">About Us</a></li>
                                        <li><a href="content.php">View Classes & Activities</a></li>
                                        <li><a href="create.php">Create Activity</a></li>
                                        <li><a href="customerservice.php">Customer Service</a></li>
                                </div>
                                <div class="login">
                                        <?php
                                        head_login();
                                        ?>
                                        <!--<li><a href="login.php">Login</a></li>
                                        <li><a href="">Cart</a></li>-->
                                </div>
                        </div>
                </div>




<div class="clear"></div>





<div style="border-top: 2px solid #435160">


<center>

<form action="userinsert.php" method="post" style = "Font-size: 20px; font-weight:bold">

</br>
<h1>User Registration</h1>
<a href="login.php"> <h4><u> Login with L.T.E account </u></h4> </a>
</br>

<div class="left">
<input type="text" name="username" required placeholder=" * Username"> </br>
<input type="text" name="userpass" required placeholder=" * Password"> </br>
<input type="text" name="conuserpass" required placeholder=" * Confirm Password"> </br>
<input type="text" name="firstname" required placeholder=" * First name"> </br>
<input type="text" name="email" required placeholder=" * Email address"> </br>
<input type="text" name="phone" placeholder="Phone number"></br>
</br>
<h5>Security question</h5>
<select name="question" required placeholder="Security question" required style = "width: 250px; height: 30px; Font-size:15px; font-color: #454545; border-radius:7px">
  <option value="city">What city were you born in?</option>
  <option value="pet">What was the name of your first pet?</option>
  <option value="teacher">What was the name of your favorite teacher?</option>
  <option value="team">What is your favorite sports team?</option>
</select> </br>

<input type="text" name="answer" required  placeholder="* Answer">
</div>


<div class="right">
<h3>Address</h3>	

<input type="text" name="street" placeholder="Street"></br>
<input type="text" name="city" placeholder="City"></br>
<input type="text" name="state" placeholder="State"></br>
<input type="text" name="zip" placeholder="Zip code"></br>
</br>
</div>

</br>


<input class="animated" type="submit" value="Register"> </br>


</form>




</center>
</div>


</body>
</html>

