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
			<div class="user_profile_edit">
				<?php
				user_profile();
				?>
				<li style="margin-bottom: 10px;"><a style="font-size: 32px; font-weight: bold; color: #A94343; padding-left:25px">Edit Your Profile</a></li>
				<form method="post" action="profile_edit_ok.php" class="u_p_e">
					<li>username : <?php echo $array['username']; ?></li>
					<li class="u_d_input">Email : <br><input type="text" name="email" value="<?php echo $array['email']; ?>"></li>
					<li class="u_d_input">Password : <br><input type="password" name="pw" value="<?php echo $array['pw']; ?>"></li>
					<li class="u_d_input">Phone : <br><input type="text" name="phone" value="<?php echo $array['phone']; ?>"></li>
					<li class="u_d_input_ad">Address : <br><input type="text" name="street" value="<?php echo $array['street']; ?>" ><br><input type="text" 
name="city" value="<?php echo $array['city']; ?>" ><br><input type="text" name="state" value="<?php echo $array['state']; ?>"><br><input type="text" 
name="zipcode" value="<?php echo $array['zipcode']; ?>" </li>
					<li style="font-weight: bold; font-size:17px">Intro<br>
						<textarea name="intro" style="width: 580px; height: 200px; border: 1px solid #CCC; text-align:justify">
						<?php echo $array['intro']; ?>
						</textarea>
					</li>
					<li><input type="submit" style="background-color:#435160;" value="Update"></li>
				</form>
			</div>
		</div>


	</body>
</html>

