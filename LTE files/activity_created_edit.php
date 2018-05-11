<?php
include 'function.php';
if ($_SESSION['username'] == Null) {
	echo "<script>alert('Please Login..'); history.back();</script>";
}
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=0.35">
		<link rel="stylesheet" type="text/css" href="style.css">
                <link rel="stylesheet" type="text/css" href="registeration.css">

		<script src="http://code.jquery.com/jquery.min.js"></script>
				<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	</head>
	<body>
	<?php
	include 'profile_js.php';
	?>
	<div id="profile"></div>



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



	<script type="text/javascript">
	
	<!--
	
	var count = 0;
	function add_item(){
		count++;
		var div = document.createElement('div');
		div.id = 'sec'+count;
		var num = 'sec'+count;
		var num2 = "'#"+num+"'";
		div.innerHTML = document.getElementById('pre_set').innerHTML;
		document.getElementById('field').appendChild(div);
	}
	
	function remove_item(obj){
		document.getElementById('field').removeChild(obj.parentNode);
	}
	
	function remove_item2(obb){
		//document.getElementById('field5').innerHTML="";
		document.getElementById('field5').removeChild(obb.parentNode);
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
	<!---------- L.T.E Login ---------->
		<div class="create_body_edit">
		<div class="create_main">
			<?php
			activity_created_edit();
			?>
			<div class="create_con" style="margin-top:-200px">
				<div class="create_left">
					<form method="post" action="activity_created_edit_ok.php?comnum=<?php echo $_GET['comnum']; ?>" enctype="multipart/form-data">
						<li>
							</br>
							<h1>Edit Activity</h1>
							<a>Type</a>
							<select name="type">
								<option value="">Select</option>
								<option value="art" <?php if ($array['type'] == "art") {print "selected='selected'";} ?>>Art</option>
								<option value="music" <?php if ($array['type'] == "music") {print "selected='selected'";} ?>>Music</option>
								<option value="sport" <?php if ($array['type'] == "sport") {print "selected='selected'";} ?>>Sport</option>
								<option value="computer" <?php if ($array['type'] == "computer") {print "selected='selected'";} ?>>Computer</option>
								<option value="science" <?php if ($array['type'] == "science") {print "selected='selected'";} ?>>Science</option>
								<option value="english" <?php if ($array['type'] == "english") {print "selected='selected'";} ?>>English</option>
								<option value="game" <?php if ($array['type'] == "game") {print "selected='selected'";} ?>>Game</option>
								<option value="business" <?php if ($array['type'] == "business") {print "selected='selected'";} ?>>Business</option>
							</select>
						</li>
						<li><a>Name</a><input type="text" name="name" value="<?php echo $array['username']; ?>"></li>
						<li><a>Price   &emsp;&ensp;&emsp;$</a><input type="text" name="price" value="<?php echo $array['price']; ?>"></li>
						<li>
							<a>SelectDate</a><br>
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
							<div id="field5">
							<?php
							$edit_date = explode('/-/', $array['startdate']);
							$edit_date_fil = array_filter(array_map('trim',$edit_date));
							//print_r($edit_date_fil);
							$edit_date_count = count($edit_date_fil);
							//print $edit_date_count;
							for ($i=0; $i<=(int)$edit_date_count-1; $i++) {
								$edit_date_slide = explode('/', $edit_date_fil[$i]);
								$edit_date_slide_fil = array_filter(array_map('trim',$edit_date_slide));
								?>
							
							<div>
							<select name="selectdate1[]">
								<?php
								for ($a=2018; $a<=2050; $a++) {
									if ($a == (int)$edit_date_slide_fil[0]) {
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
									if ($b == (int)$edit_date_slide_fil[1]) {
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
									if ($c == (int)$edit_date_slide_fil[2]) {
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
							<input id="delic" type="button" value="Delete" onclick="remove_item2(this)">
							</div>
							
							

								<?php
							}
							?>
							</div>
							<div id="field">
							<div style="display: none;">
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
							<input id="delic" type="button" value="Delete" onclick="remove_item(this)">
							</div>
							</div>
							<div id="field"></div>
							<input type="button" value="Add Date" onclick="add_item()"><br>



						</li>
						<li><a>Description</a><br>
							<textarea rows="5" name="description"><?php echo $array['description']; ?></textarea>
						</li>

						<li><a style="width: 100%;">Upload Image Files</a></li>
						<li><input type="file" name="upload1"></li>
						<li><input type="file" name="upload2"></li>
						<li><input type="file" name="upload3"></li>

						<li style="float:left; margin-right:10px">
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
						 
						<li><center><input type="submit" value="Edit"></center></li>
					</form>
				</div>
				
			</div>
		</div>
		</div>
	<!---------- L.T.E Login ---------->
	</body>
</html>
