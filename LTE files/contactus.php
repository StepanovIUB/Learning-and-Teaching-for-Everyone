<?php
include 'function.php';
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="style.css">
                <link rel="stylesheet" type="text/css" href="input.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
					<li style="background-color: #A94343;"> <a href="customerservice.php"  style="color: white;">Customer Service</a></li>
				</div>
				<div class="login">
					<li><a href='login.php'>Login</a></li><li><a href=''>Cart</a></li>
				</div>
			</div>
		</div>
		
		<div class="clear"></div>
		</br>
		<div class="home_body">
			<div class="container">
				<form action='submit.php' method='post' enctype='text/plain'>
					<div style="text-align:center">
						<h1>Contact Us</h1></br>
						<p>We'd love to hear from you! Send us a question or comment with the form below and we'll be in touch with you as soon as possible.</p>
					</div></br>
					<label for="fname">Full Name</label></br>
					<input type="text" id="fname" name="fullname" placeholder="Full Name (First and Last)">
					</br>
					<label for="userid">User ID</label></br>
					<input type="text" id="userid" name="userid" placeholder="Optional">
					</br>
					<label for="email">Email</label></br>
					<input type="text" id="email" name="email" placeholder="Email Address">
					</br>
					<label for="phone">Phone</label></br>
					<input type="text" id="phone" name="phone" placeholder="Phone Number">
					</br>
					<label for="subject">Subject</label></br>
					<input type="text" id="subject" name="subject" placeholder="Subject">
					</br>
					<label for="comment">Comment</label></br>
					<textarea id="comment" name="comment" placeholder="Comment Here" style="height:200px"></textarea>
					</br>
					<input type="submit" value="Submit" name="buttonpressed">
				</form>
			</div>			
		</div>
	</body>
</html>
