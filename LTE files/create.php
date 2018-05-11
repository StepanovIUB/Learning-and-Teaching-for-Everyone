<?php
session_start();

//putting permissions on what sessions have access
if (!isset($_SESSION['userpass']) && !isset($_SESSION['userData'])&& !isset($_SESSION['token'])){
	 echo "<script>alert('Please log in to recieve access.'); window.location.replace('login.php');</script>";

}

//including functions
include 'function.php';

?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=0.35">
		<link rel="stylesheet" type="text/css" href="style.css">
                <link rel="stylesheet" href="registeration.css">


                <script>
                function rules_agreed() {
  			// Get the checkbox
  			var checkBoxOne = document.getElementById("myCheckOne");
                        var checkBoxTwo = document.getElementById("myCheckTwo");
  			// Get the output text
  			var text = document.getElementById("policy_text");

  			// If the checkbox is checked, display the output text
  			if (checkBoxOne.checked == true){
    				policy_text.style.display = "block";
  			} else {
    				policy_text.style.display = "none";
  			}
                        
			if (checkBoxTwo.checked == true){
                                law_text.style.display = "block";
                        } else {
                                law_text.style.display = "none";
                        }

		}


               </script>

	</head>
	
<body>

        <?php
	include 'profile_js.php';
	?>
	<div id="profile"></div>
	<script type="text/javascript">
	
	<!--
	

	function add_item(){
		var div = document.createElement('div');
		div.innerHTML = document.getElementById('pre_set').innerHTML;
		document.getElementById('field').appendChild(div);
	}
	
	function remove_item(obj){
		document.getElementById('field').removeChild(obj.parentNode);
	}

	function delic() {
		if (count == 0) {
			document.getElementById("delic").style.display="none";
		} else {
			document.getElementById("delic").style.display="inline";
		}
	}
	//-->
	
	</script>




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
					<li style="background-color: #A94343;"><a href="create.php" style="color: white;">Create Activity</a></li>
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

<div style="border-top: 2px solid #435160">
	<!---------- L.T.E Login ---------->
		<div>
		<div>
			<div class="" style="margin-top:-100px">
				<div class="create_left">
					<form method="post" action="create_ok.php" enctype="multipart/form-data">
						<br>
						<h1>Create Activity</h1>
                                                <br>
                                                 <li>
							<a>Type</a>
							<select name="type">
								<option value="">Select</option>
								<option value="art">Art</option>
								<option value="music">Music</option>
								<option value="sport">Sport</option>
								<option value="computer">Computer</option>
								<option value="science">Science</option>
								<option value="english">English</option>
								<option value="game">Game</option>
								<option value="business">Business</option>
							</select>
						</li>
						<li><a>Activity name</a><input type="text" name="name"></li>	
						<li><a>Price   &emsp;&ensp;&emsp;$</a><input type="text" name="price"></li>
                                                <li><a>Payment address</a><input type="text" name="payment_adress"></li>

						<li>

                  				<a>Select Date</a><br>
							<!--<select name="selectdate1[]">
								<?php
								for ($a=2018; $a<=2050; $a++) {
									print "<option value='".$a."'>".$a."</option>";
								}
								?>
							</select>Y
							<select name="selectdate2[]">
								<?php
								for ($b=1; $b<=12; $b++) {
									print "<option value='".$b."'>".$b."</option>";
								}
								?>
							</select>M
							<select name="selectdate3[]">
								<?php
								for ($c=1; $c<=31; $c++) {
									print "<option value='".$c."'>".$c."</option>";
								}
								?>
							</select>D
							<select name="selectdate4[]">
								<?php
								for ($d=1; $d<=24; $d++) {
									print "<option value='".$d."'>".$d."</option>";
								}
								?>
							</select>h
							<select name="selectdate5[]">
								<?php
								for ($e=0; $e<=50; $e = $e + 10) {
									print "<option value='".$e."'>".$e."</option>";
								}
								?>
							</select>m-->


							<div id="pre_set">
							<select name="selectdate1[]">
								<?php
								for ($a=2018; $a<=2050; $a++) {
									if ($a == date("Y")) {
										print "<option value='".$a."' selected='selected'>".$a."</option>";
									} else {
										print "<option value='".$a."'>".$a."</option>";
									}
								}
								?>
							</select>Y
							<select name="selectdate2[]">
								<?php
								for ($b=1; $b<=12; $b++) {
									if ($b == (int)date("n")) {
										print "<option value='".$b."' selected='selected'>".$b."</option>";
									} else {
										print "<option value='".$b."'>".$b."</option>";
									}
								}
								?>
							</select>M
							<select name="selectdate3[]">
								<?php
								for ($c=1; $c<=31; $c++) {
									if ($c == (int)date("j")) {
										print "<option value='".$c."' selected='selected'>".$c."</option>";
									} else {
										print "<option value='".$c."'>".$c."</option>";
									}
								}
								?>
							</select>D
							<select name="selectdate4[]">
								<?php
								for ($d=1; $d<=24; $d++) {
									print "<option value='".$d."'>".$d."</option>";
								}
								?>
							</select>h
							<select name="selectdate5[]">
								<?php
								for ($e=0; $e<=50; $e = $e + 10) {
									print "<option value='".$e."'>".$e."</option>";
								}
								?>
							</select>m
							<input id="delic" type="button" value="Delete" onclick="remove_item(this)">
							</div>
							<div id="field"></div>
							<input type="button" value="Add Date" onclick="add_item()"><br>


						</li>
						<li><a>Number of participants</a><input type="text" name="number"></li>
						<li><a>Description</a><br>
							<textarea rows="8" name="description" style="width:100%"></textarea>
						</li>
                                               
						<li><a style="width: 100%;">Upload Image Files</a></li>
						<li><input type="file" name="upload1"></li>
						<li><input type="file" name="upload2"></li>
						<li><input type="file" name="upload3"></li>
                                               
                                                <li style="float:left; margin-left:10px; margin-right:10px">
               					Confirm with <a href="TermsOfUse.html" style="color:#A94343">website policy</a> &ensp; <input 
type="checkbox" 
style="transform: scale(1.5)" id="myCheckOne" 
required 
onclick="rules_agreed()">
     						<p id="policy_text" style="display:none"> I confirm that I do not violate rules 
of the website. </p>
						</li>

                                                              
						<li>
                                                Confirm that your class or activity is legal &ensp; <input type="checkbox" style="transform: 
scale(1.5)" id="myCheckTwo" required onclick="rules_agreed()">
                                                <p id="law_text" style="display:none"> I confirm that I do not violate any laws.</p>
                                                </li>

						</br>
                                           
						
<li> <center> <input type="submit" style="background-color:#A94343; border-color:#A94343" value="Continue"> </center> </li>
					</form>
				</div>
				
			</div>
		</div>
		</div>

	<!---------- L.T.E Login ---------->
	</body>
</html>
