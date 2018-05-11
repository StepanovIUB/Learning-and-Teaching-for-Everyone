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
			<li style="background-color: #A94343;"><a href="about.php" style="color: white;">About Us</a></li>
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
        <div class="content_body"></div>


<div class="about">
	<h1> What Is Behind L.T.E. </h1>
	<p>We are all senior students from Indiana University Bloomington. </br>We created a website for our Capstone project in which we applied what we've learned with Informatics degree.</p>
	<span class="line"></span>
<div class="team_section">
	<a href="#p1"><img src="images/kyubi.jpg" alt="" style="width:180px;"></a>
	<a href="#p2"><img src="images/jinwook.jpg" alt="" style="width:180px;"></a>
	<a href="#p3"><img src="images/vlad.jpg" alt="" style="width:180px;"></a>
	<a href="#p4"><img src="images/hyuklee.jpeg" alt="" style="width:180px;"></a>
	<a href="#p5"><img src="images/soyeonlee.jpeg" alt="" style="width:180px;"></a>
	<span class="line_two"></span>
</div>

<div class="intro_section" id="p1">
	<span class="member_name">Kyubi Kang</span>
	<span class="line"></span>
	<p> 
	My name is Kyubi KANG. I am studying Informatics and business cognate at Indiana University Bloomington. As one of developers in this capstone project team, I created a few functions for this website.  
	
	</p>

</div>

<div class="intro_section" id="p2">
	<span class="member_name">Jinwook Lee</span>
	<span class="line"></span>
	<p> 
	My name is Jinwook LEE. I am studying Informatics and Business Finance Cognate at Indiana University Bloomington. My part is developers in this capstone project, I also created functions for this project.
	
	</p>

</div>

<div class="intro_section" id="p3">
	<span class="member_name">Vladislav Stepanov</span>
	<span class="line"></span>
	<p> 
	My name is Vladislav Stepanov. I am an Informatics major with a cognate in innovation management and business certificate from Kelley School of Business. I was a lead developer for this project and did all the API's and 
around 
half of the website's back-end. I also combined it together from the separate files and adjusted the design. 	
	</p>

</div>

<div class="intro_section" id="p4">
	<span class="member_name">Hyuk Lee</span>
	<span class="line"></span>
	<p> 
	Hello. I am Hyuk Lee (from South Korea) who will be graduating from the School of Informatics and Computing at Indiana University Bloomington with a Bachelor's degree in Informatics, Cognate in Business, and a Minor in marketing. 
	
	</p>

</div>

<div class="intro_section" id="p5">
	<span class="member_name">Soyeon Lee</span>
	<span class="line"></span>
	<p> 
	Hi, my name is Soyeon Lee and I am from South Korea. I am a senior and I will be graduating from the school of Informatics at Indiana University Bloomington with a degree in Informatics business cognate. 
	
	</p>

</div>
</div>

</body>
</html>
