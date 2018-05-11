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
				</div>	
					
		
			</div>
		</div>

                <div class="clear"></div>
                		
		 <div class="home_body">
                        <img src="images/background6.jpg" alt="Main background" width="100%" height="700">
                        <div class="home_con">
                                <li><a>Learning and Teaching for Everyone</a></li>
                                <li><a>L.T.E is a place that connects people together. Whether you want share your passion with the world, or learn something new L.T.E is for 
you.</a></li>
                                <li><a>Find out what you desire with  L.T.E</a></li>
                                <li><form><input type="button" value="Start Learning" onclick="window.location.href='login.php'"></form></li>
                        </div>
                </div>
		
		<div class="home_con1">
			<h2>What is LTE?</h2>
			<li><a>Learning and Teaching for Everyone is a website that allows people </br>
				to share something they are passionate about.  It also provides an opportunity to learn
				something new from other people. </br>  Learning and Teaching for Everyone lets you
				look for activities and classes </br>and connect with people who have interests simillar to
				yours. You can start your own class or activity </br>and participate in classes and
				activities created by other users.</a></li>	
		</div>

		
		<div class="home_con2">
			<h2>Things You Can Do </h2>
			<div class="home_con2_section">
				<div class="con_box">
					<h4>Create Account</h4>
					<ul>
						<li><a>Create an Account To: </a></li>
						<li><a>1. View available classes & activities</a></li>
						<li><a>2. Join an activity or class that you like</a></li>
						<li><a>3. Create your own activity or class</a></li>
						<li><a>3. Start making valuable connections</a></li>
					</ul>
					<p><a href="register.php">> Create an account</a></p>
				</div>

				<div class="con_box">
					<h4>Join & Create an Activity</h4>
					<ul>
						<li><a>[ Join ] </a></li>
						<li><a>Learn something new!</a></li>
						<li><a>Connect with people. </a></li>
						<li><a>Have FUN! </a></li>
					</ul>
					<p><a href="register.php">> Join</a></p>
					<ul>
						<li><a>[ Create ] </a></li>
						<li><a>Share your interest.</a></li>
						<li><a>Connect with people.</a></li>
					</ul>
					<p><a href="create.php">> Create</a></p>
				</div>

				<div class="con_box margin_last">
					<h4>Contact Us</h4>
					<ul>
						<li><a>Customize solutions</a></li>
						<li><a>with individualized support</a></li>
						<li><a>to help admins manage</a></li>
						<li><a >at scale.</a></li>
					</ul>
					<p><a href="customerservice.php">> Contact Us</a></p>
				</div>
			</div>
		</div>
		<div class="home_con3">
			<h2>Designed to take participation and learning to the next level</h2>
			<div class="home_con_section2">
				<div class="con_box2">
					<h4>Simple Creation Flow</h4>
					<ul>
						<img src="images/feature1.png" alt="feature 1">
						<li><a>Creating an activity or class on L.T.E is very easy and convenient.</a></li>
					</ul>
				</div>
				<div class="con_box2">
					<h4>Powerful Features</h4>
					<ul>
						<img src="images/feature2.png" alt="feature 2">
						<li><a>Features like searching by terms, determining the location through a Google Map and much more.</a></li>
					</ul>
				</div>
				<div class="con_box2 margin_last">
					<h4>Dedication to Service</h4>
					<ul>
						<img src="images/feature4.png" alt="feature 1">
						<li><a>Contact us through submitting a Contact Form, receive a reply within two days. </a></li>
					</ul>
				</div>
			</div>		
		</div>
		<div class="home_con4">
			<h3>Join for free and start sharing you passion with the world today!</h3>
		</div>
	


	</body>
</html>
