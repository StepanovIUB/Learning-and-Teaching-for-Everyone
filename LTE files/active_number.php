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
					<li style="background-color: gray;"><a href="create.php" style="color: white;">Create Activity</a></li>
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
	<!---------- Header ---------->
	<div class="clear"></div>
<?php
created();
?>
	<div class="create_body">
		<div class="activity_num_main">
			<div class="activity_num_title">
				<li><a>Your Activity is Created !</a></li>
				<!--<li><a>Activity Number : </a></li>-->
			</div>
			<div class="activity_num_con">
				<li><a>Name</a><a><?php echo $created_array['name']; ?></a></li>
				<li><a>Price</a><a><?php echo $created_array['price']; ?></a></li>
				<li><a>Location</a><a><?php echo $created_array['location']; ?></a></li>
				<li><a>Date</a><a><?php echo $created_array['startdate']; ?></a></li>
				<li><a>Description</a><a></a></li>
				<li><a><?php echo $created_array['description']; ?></a></li>
			</div>
			<div class="back">
				<li><a href="index.html">Go to my Class</a></li>
			</div>
		</div>
	</div>
		</body>
</html>
