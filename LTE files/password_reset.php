<?php
include 'function.php';
?>


<html>
<head>

<meta charset="utf-8">
                <meta name="viewport" content="width=device-width">
                <link rel="stylesheet" type="text/css" href="style.css">


<link rel="stylesheet" href="registeration.css">

<title> Reset password </title>
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


<br>


<center>
 














<form action="password_send.php" method="post" style = "Font-size: 20px; font-weight:bold">

<h1> Please use the from below to reset your account  </h1>

<a href="login.php"> <h4><u> Back to the login page </u></h4> </a></br>

<input type="text" required placeholder="* Email" name="email"><br>
<input type="text" required placeholder="* New password" name="userpass"><br>
<input type="text" required placeholder="* Confirmation password" name="conuserpass"><br>
<br>
<input class="animated" type="Submit" value="Reset password">
</form>
</center>

</body>
</html>
