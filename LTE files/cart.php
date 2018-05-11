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
					<li><a href="home.php">Home</a></li>
					<li><a href="about.php">About Us</a></li>
					<li style="background-color: #A94343"><a href="content.php" style="color: white;">View Classes & Activities</a></li>
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

		<!---------- Content ---------->
		<div class="clear"></div>
		<div class="cart_body">
		<div class="content">
			<!--<div class="content_left">
				<li><a href="content.php">Categories</a></li>
				<li><a href="content.php?categories=art">Art</a></li>
				<li><a href="content.php?categories=music">Music</a></li>
				<li><a href="content.php?categories=sport">Sport</a></li>
				<li><a href="content.php?categories=computer">Computer</a></li>
				<li><a href="content.php?categories=science">Science</a></li>
				<li><a href="content.php?categories=english">English</a></li>
				<li><a href="content.php?categories=game">Game</a></li>
				<li><a href="content.php?categories=business">Business</a></li>
			</div>-->
			<div class="cart">
				<div class="cart_title">
					<a>My Cart</a>
				</div>
				<!--<div class="search">
					<form method="get" action="search_list.php">
						<li><input type="text" name="search" placeholder="Search"></li>
						<li><input type="submit" value="search"></li>
					</form>
				</div>-->
				<div class="cart_list">
					<div class="cart_list_left">
						<li><a></a><a>Class Name</a><a></a><a>Price</a></li>
						<?php
						cart_list();
						?>
					</div>
					<!--<div class="con_list_right">
						<li><img src="https://fhhuqw.by3302.livefilestore.com/y4mCO-GCtnaTEjsSE5cndv_1lkST0z9rsrlfEANmBa4nfXC1Qtc8Hl4riTFFBWr4Lt8oSbWqV1y0jwLs6z_Mqc4HvDH-BEi9tccHS1AcLRWHGXjMeAeFTzjiBffwm6oziACk8JGHSaS1gxvXG1BqSkW5yIgf9vlG_VoEKz7UuG6MDFW0tBBbcsrrt3GWE4ssjJKHJMkF-pATZM_JrbSN0W3Yg?width=482&height=522&cropmode=none"></li>
					</div>-->
				</div>
			</div>
		</div>
		</div>
		<!---------- Content ---------->
	</body>
</html>
