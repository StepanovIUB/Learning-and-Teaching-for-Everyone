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
			<div class="user_profile">
				<?php
				user_profile();
				?>
				<div class="u_p_left">
					<div class="profile_image"><img src="image/<?php echo $array['profileimage']; ?>" style="height:auto"></div>
					<div>
						<form method="post" action="profileimage_ok.php" enctype="multipart/form-data">
							<!--<li><a style="width: 100%;">Upload Image Files</a></li>-->
							<li><input id="choose_pic" type="file" name="upload1"></li>
							<li><input id="upload_btn" type="submit" value="Upload Profile Image"></li>
						</form>
					</div>
				</div>
				<div class="u_p_right">
					<li><p class="user_name"><?php echo $array['username']; ?></p></li>
					<li><p><?php echo $array['']; ?></p></li>
					<li><p class="user_info">Contact Information : </a><a><?php echo $array['email']; ?></p></li>
					<li><p class="user_detail">Intro</a><br><a><?php echo $array['intro']; ?></p></li>
				</div>
			</div>
		</div>


	</body>
</html>

