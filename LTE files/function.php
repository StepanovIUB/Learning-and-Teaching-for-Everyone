<?php
include 'dbcon.php';
session_start();
?>


<?php

// -------------------------- user Registeration --------------------------


function regi_ok() {
		global $dbcon;
		$username = $_POST['username'];
		$email = $_POST['email'];
		$reemail = $_POST['reemail'];
		$pw = $_POST['pw'];
		$confirmpw = $_POST['confirmpw'];
		$phone = $_POST['phone'];
		$security = $_POST['security'];
		$answer = $_POST['answer'];
		$street = $_POST['street'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zipcode = $_POST['zipcode'];
		$username_search = "SELECT * FROM user WHERE username LIKE '".$username."'";
		$username_search_query = mysqli_query($dbcon, $username_search);
		$username_search_array = mysqli_fetch_array($username_search_query);
		if ($username == Null) {
			echo "<script>alert('Please enter username.'); history.back();</script>";
		} elseif ($username_search_array['username'] != Null) {
			echo "<script>alert('The same username exists.'); history.back();</script>";
		} elseif (!ctype_alnum($username)) {
			echo "<script>alert('username can only be entered in English and numbers.'); history.back();</script>";
		} elseif ($pw == Null) {
			echo "<script>alert('Please enter a password.'); history.back();</script>";
		} elseif ($pw != $confirmpw) {
			echo "<script>alert('The password you entered is not the same.'); history.back();</script>";
		} elseif ($email == Null) {
			echo "<script>alert('Please enter email.'); history.back();</script>";
		} elseif ($email != $reemail) {
			echo "<script>alert('The email you entered is not the same.'); history.back();</script>";
		} elseif ($answer == Null) {
			echo "<script>alert('Please fill in the answer to your question.'); history.back();</script>";
		}/* elseif (!is_numeric($phone)) {
			echo "<script>alert('You can only enter numbers for mobile phone numbers.'); history.back();</script>";
		} elseif ($addr == Null) {
			echo "<script>alert('Please, write your address.'); history.back();</script>";
		} elseif ($sector == Null) {
			echo "<script>alert('Please write register method.'); history.back();</script>";
		}*/ else {
			$checknum = mt_rand(123456, 999999);
			mail("$email", "The authentication number sent from L.T.E.", "$checknum");
			$join_member_sql = "INSERT INTO user (date, username, email, pw, phone, security, answer, street, city, state, zipcode, checknum, checkmail) VALUE (now(), '$username', '$email', '$pw', '$phone', '$security', '$answer', '$street', '$city', '$state', '$zipcode', '$checknum', 'x')";
			$join_member_query = mysqli_query($dbcon, $join_member_sql);
			if ($join_member_query) {
				echo "<script>alert('Sign up is complete.'); window.location.replace('home.php');</script>";
			} else {
				echo "<script>alert('Failed membership. (call:0000-0000)'); window.location.replace('home.php');</script>";
			}
		}
}



// -------------------------- user Registeration --------------------------



// -------------------------- Login --------------------------


function login_ok() {
		global $dbcon;
		$username = $_POST['username'];
		$pw = $_POST['pw'];
		$login_sql = "SELECT * FROM user WHERE username LIKE '".$username."'";
		$login_query = mysqli_query($dbcon, $login_sql);
		$login_array = mysqli_fetch_array($login_query);
		if ($login_array['username'] == Null) {
			echo "<script>alert('username does not exist.'); window.location.replace('login.php');</script>";
		} elseif ($login_array['pw'] == $pw) {
			if ($login_array['checkmail'] == 'x') {
				echo "<script>window.location.replace('checkmail.php?anum=".$login_array['anum']."');</script>";	
			} else {
				$_SESSION['username'] = $username;
				echo "<script>alert('You are signed in.'); window.location.replace('home.php');</script>";
			}
			
		} else {
			echo "<script>alert('Passwords do not match.'); window.location.replace('login.php');</script>";
		}
}



// -------------------------- Login --------------------------



// -------------------------- Head Login --------------------------


function head_login() {
	if ($_SESSION['username'] == Null) {
		print "<li><a href='login.php'>Login</a></li><li><a href='register.php'>Join</a></li>";
	} else {
		print "<li><a href='logout.php'>Logout</a></li><li><a href='javascript:profile();'>Settings</a></li>";
	}
}

// -------------------------- Head Login --------------------------



// -------------------------- Logout --------------------------


function logout() {
		unset($_SESSION['username']);
		if ($_SESSION['username'] == Null) {
			echo "<script>alert('You have been signed out.'); window.location.replace('home.php');</script>";
		} else {
			echo "<script>alert('Logout failed<br>call:0000-0000'); window.location.replace('home.php');</script>";
		}
}



// -------------------------- Logout --------------------------




// -------------------------- Check Mail --------------------------


function checkmail_ok() {
	global $dbcon;
	$login_anum = $_GET['anum'];
	$checkmail_num = $_POST['checkmail'];
	$sql = "SELECT * FROM user WHERE anum LIKE '".$login_anum."'";
	$query = mysqli_query($dbcon, $sql);
	$array = mysqli_fetch_array($query);
	if ((int)$array['checknum'] == (int)$checkmail_num) {
		$_SESSION['username'] = $array['username'];
		$sql = "UPDATE user set checkmail='o' where anum='".$login_anum."'";
		$query = mysqli_query($dbcon, $sql);
		echo "<script>alert('authorized!'); window.location.replace('home.php');</script>";
	} else {
		echo "<script>alert('fail authorized'); history.back();</script>";
	}
	//print $login_anum."--".$array['checknum']."--".$checkmail_num;
}


// -------------------------- Check Mail --------------------------




// -------------------------- Create Activity --------------------------


function create_ok() {
	global $dbcon;


        if (isset($_SESSION['userpass'])){
              $username = $_SESSION['username'];
              $id_sql = "SELECT id FROM users WHERE username='$username'";
              $id_result = mysqli_query($dbcon, $id_sql);
              if (mysqli_num_rows($id_result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($id_result)) {
                            $id = $row["id"];
                    }
                 }
        }

	$username = $_SESSION['username'];

	$type = $_POST['type'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$number = $_POST['number'];
	$selectdate1 = $_POST['selectdate1'];
	$selectdate2 = $_POST['selectdate2'];
	$selectdate3 = $_POST['selectdate3'];
        $selectdate4 = $_POST['selectdate4'];
        $selectdate5 = $_POST['selectdate5'];

        $count = count($selectdate1);

        for ($i=0; $i<$count; $i++) {
		 $startdate .= $selectdate1[$i]."/".$selectdate2[$i]."/".$selectdate3[$i]."/".$selectdate4[$i]."/".$selectdate5[$i]."/-/";
	}        

	$description = $_POST['description'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zipcode = $_POST['zipcode'];
	$upload1 = date("y-m-d h:i:s", time()).$_FILES['upload1']['name'];
	$upload2 = date("y-m-d h:i:s", time()).$_FILES['upload2']['name'];
	$upload3 = date("y-m-d h:i:s", time()).$_FILES['upload3']['name'];
	$upload4 = date("y-m-d h:i:s", time()).$_FILES['upload4']['name'];
	$upload5 = date("y-m-d h:i:s", time()).$_FILES['upload5']['name'];
	$tmp_upload1 = $_FILES['upload1']['tmp_name'];
	$tmp_upload2 = $_FILES['upload2']['tmp_name'];
	$tmp_upload3 = $_FILES['upload3']['tmp_name'];
	$tmp_upload4 = $_FILES['upload4']['tmp_name'];
	$tmp_upload5 = $_FILES['upload5']['tmp_name'];
	$file_path1 = './images/'.$upload1;
	$file_path2 = './images/'.$upload2;
	$file_path3 = './images/'.$upload3;
	$file_path4 = './images/'.$upload4;
	$file_path5 = './images/'.$upload5;
	move_uploaded_file($tmp_upload1, $file_path1);
	move_uploaded_file($tmp_upload2, $file_path2);
	move_uploaded_file($tmp_upload3, $file_path3);
	move_uploaded_file($tmp_upload4, $file_path4);
	move_uploaded_file($tmp_upload5, $file_path5);
	$image = $upload1."/-/".$upload2."/-/".$upload3."/-/".$upload4."/-/".$upload5;
	$active_num = date("y-m-d h:i:s", time()).$name;
        $_SESSION['active_num'] = $active_num;    
    

	$sql = "INSERT INTO class (date, type, name, price, startdate, description, image, activenum, userid, username, max_participants, cur_participants) VALUE (now(), '$type', '$name', 
'$price', 
'$startdate', '$description', '$image', '$active_num','$id','$username','$number','0')";
	$query = mysqli_query($dbcon, $sql);
	if ($query) {
		sleep(3);
		echo "<script>alert('Your activity information was saved. Continue to add a location of the activity.'); 
window.location.replace('add_map.php');</script>";
	} else {
		echo "<script>alert('Something went wrong! Your activity was not created!'); history.back();</script>";
	}
}


// -------------------------- Create Activity --------------------------




// -------------------------- Activity Created --------------------------


function created() {
	global $dbcon, $created_array;
	$active_num = $_GET['activenum'];
	$sql = "SELECT * FROM class WHERE activenum LIKE '".$active_num."'";
	$query = mysqli_query($dbcon, $sql);
	$created_array = mysqli_fetch_array($query);
}


// -------------------------- Activity Created --------------------------








// -------------------------- Class List --------------------------


function class_list() {
		global $dbcon;
		$categories = $_GET['categories'];
		if ($_GET['pagenum'] == Null) {
			$now_page = 1;
		} else {
			$now_page = $_GET['pagenum'];
		}

		if ($_GET['paging'] == Null) {
			$paging = 0;
		} else {
			$paging = $_GET['paging'];
		}
		$prev = $paging - 8;
		$next = $paging + 8;
		$pageprev = $now_page - 1;
		$pagenext = $now_page + 1;
		if ($categories == Null) {
			$class_list = "SELECT * FROM class ORDER BY date DESC LIMIT ".$paging.", 8";
		} else {
			$class_list = "SELECT * FROM class WHERE type LIKE '".$categories."' ORDER BY date DESC LIMIT ".$paging.", 8";
		}
		//$class_list = "SELECT * FROM class ORDER BY date DESC LIMIT ".$paging.", 12";
		$class_list_query = mysqli_query($dbcon, $class_list);
		$class_all_num_sql = "SELECT * FROM class";
		$class_all_num_query = mysqli_query($dbcon, $class_all_num_sql);
		$class_all_num = mysqli_num_rows($class_all_num_query);
		while ($class_list_array = mysqli_fetch_array($class_list_query)) {
			$image_array = explode('/-/', $class_list_array['image']);
			$image_array_fil = array_filter(array_map('trim',$image_array));
			$ad_array = explode(' ', $class_list_array['addr']);
			$ad_array_fil = array_filter(array_map('trim',$ad_array));
			//print "<span><a href='healing_place.php?comnum=".$company_list_array['anum']."'><img src='".$image_array_fil[0]."'></a></span>";
			print "<div><a href='class_detail.php?comnum=".$class_list_array['anum']."'><img 
src='images/".$image_array_fil[0]."'><a>".$class_list_array['name']."</a><a>$ ".$class_list_array['price']."</a></a></div>";
		}
		if ($paging == 0) {
			print "<li class='listnext'><a>prev</a><a href='content.php?categories=".$categories."&paging=".$next."&pagenum=".$pagenext."'>next</a></li>";
		} elseif (ceil($class_all_num/4) == $now_page) {
			print "<li class='listnext'><a href='content.php?categories=".$categories."&paging=".$prev."&pagenum=".$pageprev."'>prev</a><a>next</a></li>";	
		} else {
			print "<li class='listnext'><a href='content.php?categories=".$categories."&paging=".$prev."&pagenum=".$pageprev."'>prev</a><a href='content.php?categories=".$categories."&paging=".$next."&pagenum=".$pagenext."'>next</a></li>";
		}
		//print ceil($company_all_num/12);
}



// -------------------------- Class List --------------------------









// -------------------------- Search List --------------------------


function search_list() {
		global $dbcon;
		$search = $_GET['search'];
		if ($_GET['pagenum'] == Null) {
			$now_page = 1;
		} else {
			$now_page = $_GET['pagenum'];
		}

		if ($_GET['paging'] == Null) {
			$paging = 0;
		} else {
			$paging = $_GET['paging'];
		}
		$prev = $paging - 8;
		$next = $paging + 8;
		$pageprev = $now_page - 1;
		$pagenext = $now_page + 1;
		/*if ($categories == Null) {
			$class_list = "SELECT * FROM class ORDER BY date DESC LIMIT ".$paging.", 4";
		} else {
			$class_list = "SELECT * FROM class WHERE type LIKE '".$categories."' ORDER BY date DESC LIMIT ".$paging.", 4";
		}*/
		$class_list = "SELECT * FROM class WHERE (type LIKE '%".$search."%') OR (name LIKE '%".$search."%') ORDER BY date DESC LIMIT ".$paging.", 8";
		$class_list_query = mysqli_query($dbcon, $class_list);
		$class_all_num_sql = "SELECT * FROM class WHERE (type LIKE '%".$search."%') OR (name LIKE '%".$search."%')";
		$class_all_num_query = mysqli_query($dbcon, $class_all_num_sql);
		$class_all_num = mysqli_num_rows($class_all_num_query);
		if ($class_all_num == Null) {
			print "<li class='search_title'><a>No Result</a></li>";	
		} else {
			print "<li class='search_title'><a>".$search."</a></li>";
		}
		while ($class_list_array = mysqli_fetch_array($class_list_query)) {
			$image_array = explode('/-/', $class_list_array['image']);
			$image_array_fil = array_filter(array_map('trim',$image_array));
			$ad_array = explode(' ', $class_list_array['addr']);
			$ad_array_fil = array_filter(array_map('trim',$ad_array));
			//print "<span><a href='healing_place.php?comnum=".$company_list_array['anum']."'><img src='".$image_array_fil[0]."'></a></span>";
			print "<div><a href='class_detail.php?comnum=".$class_list_array['anum']."'><img src='images/".$image_array_fil[0]."'><a>".$class_list_array['name']."</a><a>".$class_list_array['price']."</a></a></div>";
		}
		if ($paging == 0) {
			print "<li class='listnext'><a>prev</a><a href='search_list.php?search=".$search."&paging=".$next."&pagenum=".$pagenext."'>next</a></li>";
		} elseif (ceil($class_all_num/8) == $now_page) {
			print "<li class='listnext'><a href='search_list.php?search=".$search."&paging=".$prev."&pagenum=".$pageprev."'>prev</a><a>next</a></li>";	
		} else {
			print "<li class='listnext'><a href='search_list.php?search=".$search."&paging=".$prev."&pagenum=".$pageprev."'>prev</a><a 
href='search_list.php?search=".$search."&paging=".$next."&pagenum=".$pagenext."'>next</a></li>";
		}
		//print ceil($company_all_num/12);
}



// -------------------------- Search List --------------------------





// -------------------------- Class Detail Left --------------------------


function class_detail_left() {
	global $dbcon;
	$comnum = $_GET['comnum'];
	$sql = "SELECT * FROM class WHERE anum LIKE '".$comnum."'";
	$query = mysqli_query($dbcon, $sql);
	$array = mysqli_fetch_array($query);
	print "<li><a>Activity name</a><a>".$array['name']."</a></li>";
	print "<li><a>Provider name</a><a href='user_profile2.php?username=".$array['username']."'>".$array['username']."</a></li>";
	print "<li><a>Price</a><a>$ ".$array['price']."</a></li>";
	print "<li><a>Rating</a><a>".round($array['score'],2)."</a></li>";
	
	$spots = $array['max_participants'] - $array['cur_participants'];
	if ($spots <= 0) {
		$spots = "none";
	}
	
	$GLOBAL['spots']=$spots;
	print "<li><a>Spots available</a><a>".$spots."</a></li>";

	

}

// --------------------------- Class Detail Left -------------------------



// -------------------------- Class Detail Description --------------------------

function class_detail_description() {
        global $dbcon;
        $comnum = $_GET['comnum'];
        $sql = "SELECT * FROM class WHERE anum LIKE '".$comnum."'";
        $query = mysqli_query($dbcon, $sql);
        $array = mysqli_fetch_array($query);

        print "<li><a>Description</a><br><br><p>".$array['description']."</p></li>";
}


// -------------------------- Class Detail Description --------------------------


// -------------------------- Class Detail Down --------------------------

function class_detail_down() {
        global $dbcon;
        $comnum = $_GET['comnum'];
        $sql = "SELECT * FROM class WHERE anum LIKE '".$comnum."'";
        $query = mysqli_query($dbcon, $sql);
        $array = mysqli_fetch_array($query);


	print "<li class='review_header'><a>Review</a><br><a></a></li>";
        $username = $_SESSION['username'];
        if ($username != Null) {
                print "<form method='post' action='review_insert.php?comnum=".$comnum."' class='review'>";
                print "RATE ACTIVITY <input type='radio' name='score' value='0'>0 ";
                print "<input type='radio' name='score' value='1'>1 ";
                print "<input type='radio' name='score' value='2'>2 ";
                print "<input type='radio' name='score' value='3'>3 ";
                print "<input type='radio' name='score' value='4'>4 ";
                print "<input type='radio' name='score' value='5' checked='checked'>5";
                print "<input type='text' name='review'>";
                print "<input type='submit' value='OK'>";
                print "</form>";
		print '

		<div style="margin-bottom: 30px; margin-top: 20px; float:left" class="fb-share-button" data-href="'.$share_url.'" data-layout="button" data-size="large" data-mobile-iframe="true"><a target="_blank" 
href = "'.$share_url.'" class="fb-xfbml-parse-ignore">Share</a>
 		</div>
		
		<div style="float:left; margin-left: 10px; margin-top: 20px">
		<a 
		class="twitter-share-button"
  		href="https://twitter.com/intent/tweet?text=Enjoy the activity from LTE!"
		url="'.$share_url.'"
  		data-size="large">
		Tweet</a>
		</div> <div class="clear"> </div>';
        }
        
	$review_sql = "SELECT * FROM review WHERE classnum LIKE '".$comnum."'";
        $review_query = mysqli_query($dbcon, $review_sql);
        while ($review_array = mysqli_fetch_array($review_query)) {
                print "<div class='review_list'>";
                print "<li class='review_list1'><a>username : </a><a href='user_profile2.php?username=".$review_array['username']."'>".$review_array['username']."</a><a>| Score : 
</a><a>".$review_array['score']."</a><br><a>".$review_array['date']."</a></li>";

                print "<li class='review_list2'><a>".$review_array['content']."</a></li>";
                print "</div>";
        }
}
// -------------------------- Class Detail Down --------------------------






// -------------------------- Class Detail Right --------------------------


function class_detail_right() {
	global $dbcon, $key;
	$comnum = $_GET['comnum'];
	$sql = "SELECT * FROM class WHERE anum LIKE '".$comnum."'";
	$query = mysqli_query($dbcon, $sql);
	$array = mysqli_fetch_array($query);
	$image_array = explode('/-/', $array['image']);
	$image_array_fil = array_filter(array_map('trim',$image_array));
	for ($i=0; $i<=4; $i++) {
		if (strpos($image_array_fil[$i], '.jpg') == false) {
			unset($image_array_fil[$i]);
		}
	}
	foreach ($image_array_fil as $t) {
		print "<div class='swiper-slide'><img src='images/".$t."'></div>";
	}
	//print "<div class='show_avail'><a href='javascript:show_avail();'>SHOW<br>Availability</a></div>";
	$username = $_SESSION['username'];
	$user_sql = "SELECT * FROM users WHERE username LIKE '".$username."'";
	$user_query = mysqli_query($dbcon, $user_sql);
	$user_array = mysqli_fetch_array($user_query);
	$cart_array = explode('/-/', $user_array['cart']);
	$cart_array_fil = array_filter(array_map('trim',$cart_array));
	$key = in_array($comnum, $cart_array_fil);
	/*if ($key == Null) {
	print "<div class='show_avail'><a href='insert_cart.php?comnum=".$comnum."'>Add to cart</a></div>";
        
	if (mysqli_num_rows($query) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($id_result)) {
                            $anum = $row["anum"];
                    }
                 }
	
	}*/
}

// -------------------------- Class Detail Right --------------------------





// -------------------------- Show Availability --------------------------


function class_detail_show() {
	global $dbcon;
	$comnum = $_GET['comnum'];
	$sql = "SELECT * FROM class WHERE anum LIKE '".$comnum."'";
	$query = mysqli_query($dbcon, $sql);
	$array = mysqli_fetch_array($query);
	$startdate_array = explode('/-/', $array['startdate']);
	$startdate_array_fil = array_filter(array_map('trim',$startdate_array));
	$selectsql = "SELECT * FROM users WHERE username LIKE '".$_SESSION['username']."'";
	$selectquery = mysqli_query($dbcon, $selectsql);
	$selectarray = mysqli_fetch_array($selectquery);
	$selectdate_array = explode('/-/', $selectarray['selectdate']);
	$selectdate_array_fil = array_filter(array_map('trim',$selectdate_array));
	//print_r($selectdate_array_fil);
	//print "<a href='selectdate_delete.php?comnum=".$comnum."&selectdate=".$s_d."' class='d_s_a_submit selected'>Selected</a></li></form>";
	print "<div class='detail_show_avail'>
			<li class='d_s_a_title'><a>Select Date and Time</a></li>
		";
	$s_d_count = 0;
	foreach ($startdate_array_fil as $s_d) {
		$s_d_array_fil = explode('/', $s_d);
		print "<form method='post' action='insert_cart.php?comnum=".$comnum."'><li class='d_s_a'><input class='d_s_a_hide' type='text' name='selectdate' value='".$s_d."'><a>".$s_d_array_fil[0]." y ".$s_d_array_fil[1]." m 
".$s_d_array_fil[2]." d <br>".$s_d_array_fil[3]." h ".$s_d_array_fil[4]." min </a>";
		$last = $comnum."--".$s_d;
		$s_d_count++;
		$in_count = "'s_d".$s_d_count."'";
		if (in_array($last, $selectdate_array_fil)) {
			print '<span id="s_d'.$s_d_count.'"><a class="d_s_a_submit selected">Selected</a></span></li>';
		} else {
			print '<span id="s_d'.$s_d_count.'"><a href="javascript:selectdate_ok('.$in_count.', \''.$comnum.'\', \''.$s_d.'\');" class="d_s_a_submit">Select</a></span></li>';
		}
		
	}
	print "<li class='d_s_a_submit2'><input type='submit' value='Add Cart'></li></form></div>";
}


// -------------------------- Show Availability --------------------------


// -------------------------- Cart List --------------------------

function cart_list() {
		global $dbcon;
		if ($_SESSION['username'] == Null) {
		echo "<script>alert('Please Login.'); history.back();</script>";
		}
		$username = $_SESSION['username'];
		$sql = "SELECT * FROM users WHERE username LIKE '".$username."'";
		$query = mysqli_query($dbcon, $sql);
		$array = mysqli_fetch_array($query);
		$cart_array = explode('/-/', $array['cart']);
		$cart_array_fil = array_filter(array_map('trim',$cart_array));
		//$cart_all_num = count($cart_array_fil);
		foreach ($cart_array_fil as $c_l) {
			$c_l_sql = "SELECT * FROM class WHERE anum LIKE '".$c_l."'";
			$c_l_query = mysqli_query($dbcon, $c_l_sql);
			$c_l_array = mysqli_fetch_array($c_l_query);
			$image_array = explode('/-/', $c_l_array['image']);
			$image_array_fil = array_filter(array_map('trim',$image_array));
			//print "<div><a href='class_detail.php?comnum=".$c_l."'><img src='images/".$image_array_fil[0]."'><a>".$c_l_array['name']."</a><a>".$c_l_array['price']."</a><a href='cart_delete_ok.php?comnum=".$c_l."'>delete</a></a></div>";
			print "
				<li><a href='class_detail.php?comnum=".$c_l."'><img src='images/".$image_array_fil[0]."'></a><a href='class_detail.php?comnum=".$c_l."'>".$c_l_array['name']."</a><a 
href='cart_delete_ok.php?comnum=".$c_l."'>delete</a><a>$ ".$c_l_array['price']."</a></li>
				";
			$sum_result = (int)$sum_result + (int)$c_l_array['price'];
		}
		
		print "<li><a></a><a></a><a>Total : </a><a>$ ".$sum_result."</a></li>";
		print '
			<li style="border-bottom:none;"><a></a><a><form class="paypal" action="payments.php" method="post" id="paypal_form" target="_blank">
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="lc" value="US" />
        <input type="hidden" name="price" value='.$sum_result.' />
        <input type="hidden" name="currency_code" value="USD" />
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
        <input type="hidden" name="first_name" value="Customers First Name" />
        <input type="hidden" name="last_name" value="Customers Last Name" />
        <input type="hidden" name="payer_email" value="" />
        <input type="hidden" name="item_number" value="123456" / >
        <input type="submit" name="submit" class="animated" value="Pay Now"/>
        </form></a><a></a><a></a></li>
			';
		
		print '<style>
                input[type="submit"] {
                background: #A94343;
                width: 200px;
                height: 45px;
                border-radius: 5px;
		border-width: 2px;
		border-color: #A94343;
                color: #fff;
                font-size: 14px;
                font-weight: bold;
                cursor: pointer;
		transition: background 0.3s ease-in-out;
		border:none;
}

                input[type="submit"]:hover {
                background: #A94343;
                animation-name: shake;
}

.animated {
        animation-duration: 2s;
        animation-fill-mode: both;
}

@keyframes shake {
  0%, 100% {
    transform: translateX(0);
  }
  10%, 30%, 50%, 70%, 90% {
    transform: translateX(-10px);
  }
  20%, 40%, 60%, 80% {
    transform: translateX(10px);
  }
}
</style>';
		

		/*if ($paging == 0) {
			print "<li class='listnext'><a>prev</a><a href='content.php?categories=".$categories."&paging=".$next."&pagenum=".$pagenext."'>next</a></li>";
		} elseif (ceil($class_all_num/15) == $now_page) {
			print "<li class='listnext'><a href='content.php?categories=".$categories."&paging=".$prev."&pagenum=".$pageprev."'>prev</a><a>next</a></li>";	
		} else {
			print "<li class='listnext'><a href='content.php?categories=".$categories."&paging=".$prev."&pagenum=".$pageprev."'>prev</a><a href='content.php?categories=".$categories."&paging=".$next."&pagenum=".$pagenext."'>next</a></li>";
		}*/
		//print ceil($company_all_num/12);
}

// -------------------------- Cart List --------------------------

// -------------------------- Empty Cart ------------------------------

function empty_cart() {
         global $dbcon;
         $username = $_SESSION['username'];
         $sql = "UPDATE users SET cart = NULL WHERE username LIKE '".$username."'";
                $query = mysqli_query($dbcon, $sql);
}

//-------------------------- Empty Cart -----------------------------------



// ------------------------- Joined Activities ------------------------




function joined_list() {
                global $dbcon;
                if ($_SESSION['username'] == Null) {
                echo "<script>alert('Please Login.'); history.back();</script>";
                }
                $username = $_SESSION['username'];
                $sql = "SELECT * FROM users WHERE username LIKE '".$username."'";
                $query = mysqli_query($dbcon, $sql);
                $array = mysqli_fetch_array($query);
                $joined_array = explode('/-/', $array['joined']);
                $joined_array_fil = array_filter(array_map('trim',$joined_array));
     

		$selectdate_array = explode('/-/', $array['selectdate']);
	        $selectdate_array_fil = array_filter(array_map('trim',$selectdate_array));
                foreach ($selectdate_array_fil as $yy) {
                        //if (strpos($yy, $joined_array_fill."--") == false) {
                                $result2 .= $yy."*";
                
			//}
			//} else {
			//	$result2 = "not working";
			//}
		}

		$result2 = substr_replace($result2, "*", 0, 0);
		$id_date_array = explode('*', $result2);
		//$id_date_array = array_filter(array_map('trim',$id_date_array));

		foreach ($id_date_array as $i_a) {
			$id_date_array_split = explode('--',$i_a);
			$comnum=($id_date_array_split[0]);
			//print_r($comnum);
			
			$date=($id_date_array_split[1]);
			
			$insert_sql = "update class set dates = '".$date."' WHERE anum LIKE '".$comnum."'";
                        $insert_sql = mysqli_query($dbcon, $insert_sql);

			
			foreach($id_date_array_split as $i_s) {
				//$comnum=($i_s[0]);
				//$date=($i_s[1]);
			}
		}




		//print_r($id_date_array);
           //$joined_all_num = count($cart_array_fil);
                foreach ($joined_array_fil as $c_l) {
                        $c_l_sql = "SELECT * FROM class WHERE anum LIKE '".$c_l."'";
                        $c_l_query = mysqli_query($dbcon, $c_l_sql);
                        $c_l_array = mysqli_fetch_array($c_l_query);
                        $image_array = explode('/-/', $c_l_array['image']);
                        $image_array_fil = array_filter(array_map('trim',$image_array));
                        //print "<div><a href='class_detail.php?comnum=".$c_l."'><img src='images/".$image_array_fil[0]."'><a>".$c_l_array['name']."</a><a>".$c_l_array['price']."</a><a href='cart_delete_ok.php?comnum=".$c_l."'>delete</a$
                        print "
                                <li><a href='class_detail.php?comnum=".$c_l."'><img src='images/".$image_array_fil[0]."'></a><a href='class_detail.php?comnum=".$c_l."'>".$c_l_array['name']."</a><a 
href='joined_delete_ok.php?comnum=".$c_l."'> cancel </a><a>".$c_l_array['dates']."</a></li>
                                ";
                }
}



/// ---------------------------------Insert Joined-------------------------------------

function insert_joined() {
	 global $dbcon;
	 $username = $_SESSION['username'];
	 $sql = "SELECT * FROM users WHERE username LIKE '".$username."'";
                $query = mysqli_query($dbcon, $sql);
                $array = mysqli_fetch_array($query);
                $joined_array = explode('/-/', $array['joined']);
                        if (!in_array($array[cart], $joned_array)) {
                                $all_comnum = $array['joined'];
                                $all_comnum .= $array['cart']."/-/";
                                $update_sql = "UPDATE users set joined='".$all_comnum."' WHERE username LIKE '".$username."'";
                                $update_query = mysqli_query($dbcon, $update_sql);
				
			}
}


// ------------------------------------------Insert Joined-----------------------------------------

// -------------------------- Cancel Joined Activities --------------------------


function joined_delete_ok() {
        global $dbcon;
        $comnum = $_GET['comnum'];
        $username = $_SESSION['username'];
        $joined_sql = "SELECT * FROM users WHERE username LIKE '".$username."'";
        $joined_query = mysqli_query($dbcon, $joined_sql);
        $joined_array = mysqli_fetch_array($joined_query);
        $in_joined_array = explode('/-/', $joined_array['joined']);
        $in_joined_array_fil = array_filter(array_map('trim',$in_joined_array));
        
	foreach ($in_joined_array_fil as $c_l) {
                     $c_l_sql = "UPDATE class set cur_participants = (cur_participants - 1) WHERE anum LIKE '".$c_l."'";
                     $c_l_query = mysqli_query($dbcon, $c_l_sql);
                     $c_l_array = mysqli_fetch_array($c_l_query);
               }
	

	$key = array_search($comnum, $in_joined_array_fil);
        array_splice($in_joined_array_fil, $key, 1);
        foreach ($in_joined_array_fil as $tt) {
                $result .= $tt."/-/";
        }

        $selectdate_array = explode('/-/', $joined_array['selectdate']);
        $selectdate_array_fil = array_filter(array_map('trim',$selectdate_array));
        foreach ($selectdate_array_fil as $yy) {
                if (strpos($yy, $comnum."--") === false) {
                        $result2 .= $yy."/-/";
                }
        }


	


        $sql = "UPDATE users set joined='".$result."', selectdate='".$result2."' WHERE username LIKE '".$username."'";
        $query = mysqli_query($dbcon, $sql);
        $array = mysqli_fetch_array($query);
        echo "<script>alert('Your activity was cancelled!'); history.back();</script>";


}


// ------------------------------- Cancel Joined Activities ---------------------------------

// -------------------------- Cart Delete --------------------------



// -------------------------- Insert Cart --------------------------


function insert_cart() {
	global $dbcon;
	if ($_SESSION['username'] == Null) {
		echo "<script>alert('Please Login.'); history.back();</script>";
	} else {
		$comnum = $_GET['comnum'];
		$username = $_SESSION['username'];
		$sql = "SELECT * FROM users WHERE username LIKE '".$username."'";
		$query = mysqli_query($dbcon, $sql);
		$array = mysqli_fetch_array($query);
		$cart_array = explode('/-/', $array['cart']);
		$joined_array = explode('/-/', $array['joined']);

	        $sql_c = "SELECT * FROM class WHERE anum LIKE '".$comnum."'";
        	$query_c = mysqli_query($dbcon, $sql_c);
        	$array_c = mysqli_fetch_array($query_c);
		
		$spots = $array_c['max_participants'] - $array_c['cur_participants'];
	        if ($spots <= 0) {
                	$spots = "none";
        	}


		if (strpos($array['selectdate'], $comnum."--") !== false) {
			if (in_array($comnum, $cart_array)) {
				 echo "<script>alert('Activity is already in the cart!'); history.back();</script>";
			}
			elseif (in_array($comnum, $joined_array)) {
				 echo "<script>alert('You are already participating in this activity!'); history.back();</script>"; 
			}
			elseif ($spots == "none") {
                                 echo "<script>alert('There are currently no spots available for that activity!'); history.back();</script>";
			}else {
				$all_comnum = $array['cart'];
                                $all_comnum .= $comnum."/-/";
                                $update_sql = "UPDATE users set cart='".$all_comnum."' WHERE username LIKE '".$username."'";
                                $update_query = mysqli_query($dbcon, $update_sql);
                                echo "<script>alert('Activity was successfuly added to the cart!'); history.back();</script>";

			}
		} else {
			echo "<script>alert('Select Date!'); history.back();</script>";
		}
	}
}


// -------------------------- Insert Cart --------------------------



// -------------------------- Cart Delete --------------------------


function cart_delete_ok() {
	global $dbcon;
	$comnum = $_GET['comnum'];
	$username = $_SESSION['username'];
	$cart_sql = "SELECT * FROM users WHERE username LIKE '".$username."'";
	$cart_query = mysqli_query($dbcon, $cart_sql);
	$cart_array = mysqli_fetch_array($cart_query);
	$in_cart_array = explode('/-/', $cart_array['cart']);
	$in_cart_array_fil = array_filter(array_map('trim',$in_cart_array));
	$key = array_search($comnum, $in_cart_array_fil);
	array_splice($in_cart_array_fil, $key, 1);
	foreach ($in_cart_array_fil as $tt) {
		$result .= $tt."/-/";
	}
	$selectdate_array = explode('/-/', $cart_array['selectdate']);
	$selectdate_array_fil = array_filter(array_map('trim',$selectdate_array));
	foreach ($selectdate_array_fil as $yy) {
		if (strpos($yy, $comnum."--") === false) {
			$result2 .= $yy."/-/";
		}
	}
	$sql = "UPDATE users set cart='".$result."', selectdate='".$result2."' WHERE username LIKE '".$username."'";
	$query = mysqli_query($dbcon, $sql);
	$array = mysqli_fetch_array($query);
	echo "<script>alert('Activity was deleted from the cart!'); history.back();</script>";
}


// -------------------------- Cart Delete --------------------------




// -------------------------- Review Insert --------------------------


function review_insert() {
	global $dbcon;
	$username = $_SESSION['username'];
	$classnum = (int)$_GET['comnum'];
	$content = $_POST['review'];
	$score = $_POST['score'];
	$sql = "INSERT INTO review (date, classnum, content, username, score) VALUE (now(), '$classnum', '$content', '$username', '$score')";
	$query = mysqli_query($dbcon, $sql);
	echo "<script>alert('Your review has been written.');</script>";
	sleep(3);
	$score_sql = "SELECT * FROM review WHERE classnum LIKE '".$classnum."'";
	$score_query = mysqli_query($dbcon, $score_sql);
	$score_all_num = mysqli_num_rows($score_query);
	while ($score_array = mysqli_fetch_array($score_query)) {
		$score_sum = (int)$score_sum+(int)$score_array['score'];
	}
	$last_score = (int)$score_sum/(int)$score_all_num;
	//print $last_score;

	$update_sql = "UPDATE class set score='".(float)$last_score."' WHERE anum LIKE '".$classnum."'";
	$update_query = mysqli_query($dbcon, $update_sql);
	echo "<script>window.location.replace('class_detail.php?comnum=".$classnum."');</script>";
}


// -------------------------- Review Insert --------------------------


// -------------------------- SelectDate Insert --------------------------


function selectdate_ok() {
	global $dbcon;
	/*if ($_SESSION['username'] == Null) {
		echo "<script>alert('Please Login.'); window.location.replace('login.php');</script>";
	}*/
	//print $_GET['comnum']."-".$_POST['selectdate'];
	$comnum = $_POST['comnum'];
	$selectdate = $_POST['selectdate'];
	$username = $_SESSION['username'];
	$select_sql = "SELECT * FROM users WHERE username LIKE '".$username."'";
	$select_query = mysqli_query($dbcon, $select_sql);
	$select_array = mysqli_fetch_array($select_query);
	$selectdate_sum .= $select_array['selectdate']."/-/".$comnum."--".$selectdate;
	$sql = "UPDATE users set selectdate='".$selectdate_sum."' WHERE username LIKE '".$username."'";
	$query = mysqli_query($dbcon, $sql);
	//echo "<script>alert('Class Selected!'); history.back();</script>";
}


// -------------------------- SelectDate Insert --------------------------



// -------------------------- SelectDate Delete --------------------------


function selectdate_delete() {
	global $dbcon;
	/*if ($_SESSION['username'] == Null) {
		echo "<script>alert('Please Login.'); window.location.replace('login.php');</script>";
	}*/
	$comnum = $_POST['comnum'];
	$selectdate = $_POST['selectdate'];
	$username = $_SESSION['username'];
	$s_d = $comnum."--".$selectdate;
	$sql = "SELECT * FROM users WHERE username LIKE '".$username."'";
	$query = mysqli_query($dbcon, $sql);
	$array = mysqli_fetch_array($query);
	$date_array = explode('/-/', $array['selectdate']);
	$date_array_fil = array_filter(array_map('trim',$date_array));
	$delete = array_diff($date_array_fil, array($s_d));
	$delete = array_values($delete);
	foreach ($delete as $tt) {
		$result .= $tt."/-/";
	}
	$r_sql = "UPDATE users set selectdate='".$result."' WHERE username LIKE '".$username."'";
	$r_query = mysqli_query($dbcon, $r_sql);
	//echo "<script>alert('Delete OK!'); history.back();</script>";
}


// -------------------------- SelectDate Delete --------------------------





// -------------------------- User Profile --------------------------


function user_profile() {
	global $dbcon, $array;
	$sql = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
	$query = mysqli_query($dbcon, $sql);
	$array = mysqli_fetch_array($query);
}

function user_profile2() {
	global $dbcon, $array;
	$sql = "SELECT * FROM users WHERE username='".$_GET['username']."'";
	$query = mysqli_query($dbcon, $sql);
	$array = mysqli_fetch_array($query);
}



// -------------------------- User Profile --------------------------




// -------------------------- Profileimage_ok --------------------------


function profileimage_ok() {
	global $dbcon;
	$username = $_SESSION['username'];
	$upload1 = date("y-m-d h:i:s", time()).$_FILES['upload1']['name'];
	$tmp_upload1 = $_FILES['upload1']['tmp_name'];
	$file_path1 = './image/'.$upload1;
	move_uploaded_file($tmp_upload1, $file_path1);
	$sql ="UPDATE users set profileimage='".$upload1."' WHERE username='".$username."'";
	$query = mysqli_query($dbcon, $sql);
	if ($query) {
		echo "<script>alert('Your profile picture was changed.'); window.location.replace('user_profile.php');</script>";
	} else {
		echo "<script>alert('Ooops! Uploading a pictue failed.'); history.back();</script>";
	}
}


// -------------------------- Profileimage_ok --------------------------






// -------------------------- Activity Created --------------------------



function activity_created() {
	global $dbcon;
	$username = $_SESSION['username'];
	$sql = "SELECT * FROM class WHERE username LIKE '".$username."'";
	$query = mysqli_query($dbcon, $sql);
	while ($array = mysqli_fetch_array($query)) {
		$image_array = explode('/-/', $array['image']);
		$image_array_fil = array_filter(array_map('trim',$image_array));
		$description = substr($array['description'],0,50).'...';

		print "
			<li><a href='class_detail.php?comnum=".$array['anum']."'><img src='images/".$image_array_fil[0]."'></a><a href='class_detail.php?comnum=".$array['anum']."'>Activity Name : 
".$array['name']."<br>Description<br>".$description."</a><a 
href='activity_created_edit.php?comnum=".$array['anum']."'>edit</a><a href='activity_created_delete.php?comnum=".$array['anum']."'>delete</a></li>
			";
	}
}



// -------------------------- Activity Created --------------------------




// -------------------------- Activity Created edit --------------------------


function activity_created_edit() {
	global $dbcon, $array;
	$comnum = $_GET['comnum'];
	$sql = "SELECT * FROM class WHERE anum LIKE '".$comnum."'";
	$query = mysqli_query($dbcon, $sql);
	$array = mysqli_fetch_array($query);
}


// -------------------------- Activity Created edit --------------------------



// -------------------------- Activity Created edit OK --------------------------



function activity_created_edit_ok() {
	global $dbcon;
	$anum = $_GET['comnum'];
	$type = $_POST['type'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	
	$selectdate1 = $_POST['selectdate1'];
	$selectdate2 = $_POST['selectdate2'];
	$selectdate3 = $_POST['selectdate3'];
	$selectdate4 = $_POST['selectdate4'];
	$selectdate5 = $_POST['selectdate5'];
	unset($selectdate1[2]);
	unset($selectdate2[2]);
	unset($selectdate3[2]);
	unset($selectdate4[2]);
	unset($selectdate5[2]);
	$select1date1 = array_values($selectdate1);
	$select2date2 = array_values($selectdate2);
	$select3date3 = array_values($selectdate3);
	$select4date4 = array_values($selectdate4);
	$select5date5 = array_values($selectdate5);

	$count = count($select1date1);

	for ($i=0; $i<$count; $i++) {
		$startdate .= $select1date1[$i]."/".$select2date2[$i]."/".$select3date3[$i]."/".$select4date4[$i]."/".$select5date5[$i]."/-/";
	}
	/*print_r($select1date1);
	print $startdate;*/
	$description = $_POST['description'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zipcode = $_POST['zipcode'];
	$location = $street." ".$city." ".$state." ".$zipcode;
	$sql = "UPDATE class SET type='".$type."', name='".$name."', price='".$price."', startdate='".$startdate."', description='".$description."', location='".$location."' WHERE anum='".$anum."'";
	$query = mysqli_query($dbcon, $sql);
	if ($query) {
		echo "<script>alert('Your activity has beed edited.'); window.location.replace('activity_created.php');</script>";
	} else {
		echo "<script>alert('We could not make the changes.'); history.back();</script>";
	}
}



// -------------------------- Activity Created edit OK --------------------------




// -------------------------- Activity Created Delete OK --------------------------


function activity_created_delete_ok() {
        global $dbcon;
        $anum = $_GET['comnum'];
        $sql2 = "DELETE FROM class WHERE anum='$anum'";
        $sql1 = "DELETE FROM markers WHERE anum='$anum'";
        $query2 = mysqli_query($dbcon, $sql1);
        $query1 = mysqli_query($dbcon, $sql2);
        if ($query1) {
                echo "<script>alert('Activiy was deleted.'); window.location.replace('activity_created.php');</script>";
        } else {
                echo "<script>alert('Delete Fail with anum being = $anum.'); window.location.replace('activity_created.php');</script>";
        }
}


// -------------------------- Activity Created Delete OK --------------------------




// -------------------------- Profile Edit Ok --------------------------



function profile_edit_ok() {
	global $dbcon;
	$username = $_SESSION['username'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zipcode = $_POST['zipcode'];
	$intro = $_POST['intro'];
 	$sanpass = $_POST['pw'];
        
        $address = $street . $city . ", " . $state . $zipcode; 
	// Hashing pasword of the user
	$encpass = password_hash($sanpass,PASSWORD_DEFAULT);


	$sql = "UPDATE users set email='".$email."', userpass='".$encpass."', phone='".$phone."', address='".$address."', intro='".$intro."' WHERE 
username='".$username."'";
	$query = mysqli_query($dbcon, $sql);
	if ($query) {
		echo "<script>alert('Your personal information was edited'); window.location.replace('user_profile.php');</script>";
	} else {
		echo "<script>alert('Ooops, something went wrong! Editing failed.'); history.back();</script>";
	}
}

// --------------------------- Profile Edit Ok --------------------------------------------

// -------------------------- User Profile Review OK --------------------------


function user_pro_review_ok() {
	global $dbcon;
	$username = $_SESSION['username'];
	$profile_review = $_POST['profile_review'];
	$usernum = $_GET['usernum'];
	$username2 = $_GET['username'];
	$sql = "INSERT INTO proreview (usernum, date, content, username) VALUE ('".$usernum."', now(), '".$profile_review."', '".$username."')";
	$query = mysqli_query($dbcon, $sql);
	if ($query) {
		echo "<script>alert('Your review was added.'); window.location.replace('user_profile2.php?username=".$username2."');</script>";
	}
}


// -------------------------- User Profile Review OK --------------------------


// -------------------------- User Profile Review List --------------------------


function user_pro_review_list() {
	global $dbcon;
	$username = $_GET['username'];
	$sql = "SELECT * FROM users WHERE username='".$username."'";
	$query = mysqli_query($dbcon, $sql);
	$array = mysqli_fetch_array($query);
	$usernum = $array['id'];
	$review_sql = "SELECT * FROM proreview WHERE usernum='".$usernum."'";
	$review_query = mysqli_query($dbcon, $review_sql);
	while ($review_array = mysqli_fetch_array($review_query)) {
		print "
			<li><a>UserName : </a><a>".$review_array['username']."</a></li>
			<li class='profile_review_one'><a>Review</a><br><a>".$review_array['content']."</a></li>
			";
	}

}


// -------------------------- User Profile Review List --------------------------


?>
