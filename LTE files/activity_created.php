<?php
include 'function.php';
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=0.35">
		<link rel="stylesheet" type="text/css" href="style.css">
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
					<li style="background-color: #A94343;"><a href="home.php" style="color: white;">Home</a></li>
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
		
		
		<div class="home_body">
			<center>
			<div class="activity_created">
				<div style="margin-top:20px; margin-bottom:20px">
					<li>
						<a>Activities Created</a>
					</li>
				</div>
				<div class="a_c_list">
					<?php
					activity_created();
					?>
				</div>
			</div>
			</center>
		</div>


	</body>
</html>
