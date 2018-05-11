<?php
include 'function.php';
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
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
					<li style="background-color: #A94343;"><a href="customer.php" style="color: white;">Customer Service</a></li>
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
		
		
		<div class="home_body">
			<div class="customer_con">
				<li><a>How can we help?</a></li>
				<form method="post" action="">
					<li><input type="text" name="customer" placeholder="Search"></li>
					<li><input type="submit" value="enter"></li>
				</form>
				<li><a>Questions?</a></li>
				<li><a>Registeration</a></li>
				<li><a>Order</a></li>
				<li><a>Change of Order</a></li>
				<li><a>Payment</a></li>
				<li><a>Give Feedback</a></li>
			</div>
		

		<div class="customer_bottom">
			<div class="c_b_left">
				<li class="c_b_l_title"><a>Contact us</a></li>
				<div class="contact">
					<li class="contact_f"><a>PHONE:</a><a> (000) 000-0000</a></li>
					<li class="contact_f"><a>FAX:</a><a> (000) 000-0000</a></li>
					<li class="contact_f"><a>EMAIL:</a><a> lte@gmail.com</a></li>
					<li><a>OFFICE HOURS</a></li>
					<li class="contact_g"><a>Monday - Friday:</a><a> 8:00AM - 5:00PM</a></li>
					<li class="contact_g"><a>Saturday:</a><a> 9:00AM - 3:00PM</a></li>
					<li class="contact_g"><a>Sunday:</a><a>Closed</a></li>
				</div>
			</div>
			<div class="c_b_right">
				<li><a>About us:</a></li>
				<li><a>About us</a></li>
				<li><a>Notice</a></li>
				<li><a>Review</a></li>
				<li><a>Follow us on:</a></li>
				<li><a href=""><img src="images/instagram.png"></a><a href=""><img src="images/facebook.png"></a><a href=""><img src="images/twitter.png"></a><a href=""><img src="images/youtube.png"></a></li>
			</div>
		</div>
		</div>



<div class="clear"></div>

<br>
<br>
<br>
<br>
<br>

<div class="footer">
</br>
<p> Our <a href="TermsOfUse.html" class="footer_span"> Terms of Use </a> & <a href="privacypolicy.html" class="footer_span"> Privacy Policy </a></p>
</div>



	</body>
</html>
