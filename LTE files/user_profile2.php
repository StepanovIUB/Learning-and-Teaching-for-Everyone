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
					<li style="background-color: #A94343"><a href="home.php" style="color: white;">Home</a></li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="content.php">View Classes & Activities</a></li>
					<li><a href="create.php">Create Activity</a></li>
					<li><a href="customer.php">Customer Service</a></li>
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
			<div class="user_profile">
				<?php
				user_profile2();
				?>
				<div class="u_p_left">
					<div class="profile_image"><img src="image/<?php echo $array['profileimage']; ?>" style="height:auto"></div>
				</div>
				<div class="u_p_right">
					<li><a><?php echo $array['username']; ?></a></li>
					<li><a><?php echo $array['']; ?></a></li>
					<li><a>Contact Information : </a><a><?php echo $array['email']; ?></a></li>
					<li><a>Intro</a><br><a><?php echo $array['intro']; ?></a></li>
				</div>
			</div>
			<div class="user_pro_review">
				<form method="POST" action="user_pro_review_ok.php?usernum=<?php echo $array['id']; ?>&username=<?php echo $_GET['username']; ?>">
					<li><a>UserName : </a><a><?php echo $_SESSION['username']; ?></a></li>
					<li><input type="text" name="profile_review"></li>
					<li><input type="submit" value="SEND"></li>
				</form>
			</div>
			<div class="user_pro_review_list">
				<?php
				user_pro_review_list();
				?>
			</div>
		</div>


	</body>
</html>
