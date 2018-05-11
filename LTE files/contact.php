<?php 
include 'contact_process.php';
include 'function.php';
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=0.35">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="contact.css">
	</head>

	<body>
	<?php
        include 'profile_js.php';
        ?>

                <div id="profile"></div>

		<div class="header">
				<div class="logo"
					<a href="home.php"><img src="images/logo.jpg"></a>
				</div>
				<div class="gnb">
					<div class="gnb1">
						<li><a href="home.php">Home</a></li>
						<li><a href="about.php">About Us</a></li>
						<li><a href="content.php">View Classes & Activities</a></li>
						<li><a href="create.php">Create Activity</a></li>
						<li style="background-color: #A94343;"><a href="customerservice.php" style="color:white">Customer Service</a></li>
					</div>
					<div class="login">
						 <?php
        	                                head_login();
	                                        ?>

					</div>
				</div>
			</div>
			
			<div class="clear"></div>
			<div class="home_body">


		<div class="contact_container">  
		  <form id="contact" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
			<h3>Contact Us</h3>
			<h4>We'd love to hear from you! Send us a question or comment with the form below and we'll be in touch with you as soon as possible.</h4>
			<fieldset>
			  <input placeholder="Full Name (First and Last)" type="text" name="name" value="<?= $name ?>" tabindex="1" autofocus>
			  <span class="error"><?= $name_error ?></span>
			</fieldset>
			<fieldset>
			  <input placeholder="User ID" type="text" name="userid" value="<?= $userid ?>" tabindex="2" autofocus>
			</fieldset>
			<fieldset>
			  <input placeholder="Email Address" type="text" name="email" value="<?= $email ?>" tabindex="3">
			  <span class="error"><?= $email_error ?></span>
			</fieldset>
			<fieldset>
			  <input placeholder="Phone Number (Optional)" type="text" name="phone" value="<?= $phone ?>" tabindex="4">
			</fieldset>
			<fieldset>
			  <input placeholder="Subject" type="text" name="title" value="<?= $title ?>" tabindex="5" >
			</fieldset>
			<fieldset>
			  <textarea placeholder="Type your comment here" type="text" value="<?= $comment ?>" name="comment" tabindex="6"></textarea>
			</fieldset>
			<fieldset>
			  <button name="submit" type="submit" id="contact-submit" style="background-color: #435160;" data-submit="...Sending">Submit</button>
			</fieldset>
			<div class="success"><?= $success; ?></div>
		  </form>
		</div>
	</body>
</html>
