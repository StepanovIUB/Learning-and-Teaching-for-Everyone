<?php
include 'function.php';
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=0.35">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>

	<?php
        include 'profile_js.php';
        ?>
        <div id="profile"></div>



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
					<li style="background-color: #A94343;"><a href="customerservice.php" style="color: white;">Customer Service</a></li>
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
				<li><a>How Can We Help You?</a></li>
				<form method="post" action="">
				</form>
				<div class="icon-bar">
				<a class="active" href="faq.php"><i class="fa fa-question-circle-o"></i><h6>Q & A</h6></a>  
				<a class="active" href="contact.php"><i class="fa fa-handshake-o"></i><h6>Contact Us</h6></a>				
				</div>
			</div>
		
			<div class="customer_bottom">
				<div class="c_b_left">
					<li class="c_b_l_title"><a>HOURS OF BUSINESS</a></li>
					<div class="contact">
						<li class="contact_g"><a>Monday - Friday:</a><a> 09:00AM - 17:00PM</a></li></br>
						<li class="contact_g"><a>Saturday:</a><a> 10:00AM - 14:00PM</a></li>
						<li class="contact_g"><a>Sunday:</a><a> Closed</a></li>
					</div>
				</div>
				<div class="c_b_right">
					<li><a>FOLLOW US</a></li>
					<li><a href=""><img src="images/instagram.png" style="height:auto"></a><a href=""><img src="images/facebook.png" style="height:auto"></a><a 
href=""><img src="images/twitter.png" style="height:auto"></a><a href=""><img src="images/youtube.png" style="height:auto"></a></li>
				</div>
			</div>
		</div>
	</body>
</html>
