<?php

session_start();

$con=mysqli_connect("db.soic.indiana.edu","i494f17_team31","my+sql=i494f17_team31", "i494f17_team31");

//if (mysqli_connect_errno()) {
//   echo "Failed to connect to MySQL: " .mysqli_connect_error();
//}

$sanupass = mysqli_real_escape_string($con,$_POST['userpass']);
$sanuname = mysqli_real_escape_string($con,$_POST['username']);

//$encpass = password_hash($sanpass,PASSWORD_DEFAULT);


$result = mysqli_query($con,"Select userpass from users where username='$sanuname' and active = '1'");

if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($sanupass, $row['userpass'])) {
     // if ($sanupass==$row["userpass"]) {
            $_SESSION['userpass'] = $sanupass;
            $_SESSION['username'] = $sanuname;
           // echo "Password correct!";
            }            
//          } else { echo "<script>alert('Please write register method.'); history.back();</script>";}
        }
    }

//else { echo "Incorrect User";}

//mysqli_free_result($result);
//mysqli_close($con);
















// Include FB config file && User class
require_once 'fbConfig.php';
require_once 'fb_user.php';


if(isset($accessToken)){
	if(isset($_SESSION['fb'])){
		$fb->setDefaultAccessToken($_SESSION['fb']);
	}else{
		// Put short-lived access token in session
		$_SESSION['fb'] = (string) $accessToken;
			  	// OAuth 2.0 client handler helps to manage access tokens
		$oAuth2Client = $fb->getOAuth2Client();
		
		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['fb']);
		$_SESSION['fb'] = (string) $longLivedAccessToken;
		
		// Set default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['fb']);
	}
	
	// Redirect the user back to the same page if url has "code" parameter in query string
	if(isset($_GET['code'])){
		header('Location: ');
	}
	
	// Getting user facebook profile info
	try {
		$profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,picture');
		$fbUserProfile = $profileRequest->getGraphNode()->asArray();
	} catch(FacebookResponseException $e) {
		echo 'Graph returned an error: ' . $e->getMessage();
		session_destroy();
		// Redirect user back to app login page
		header("Location: ./");
		exit;
	} catch(FacebookSDKException $e) {
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	
	// Initialize User class
	$user = new User();
	
	// Insert or update user data to the database
	$fbUserData = array(
		'oauth_provider'=> 'facebook',
		'oauth_uid' 	=> $fbUserProfile['id'],
		'first_name' 	=> $fbUserProfile['first_name'],
		'last_name' 	=> $fbUserProfile['last_name'],
		'email' 		=> $fbUserProfile['email'],
		'gender' 		=> $fbUserProfile['gender'],
		'locale' 		=> $fbUserProfile['locale'],
		'picture' 		=> $fbUserProfile['picture']['url'],
		'link' 			=> $fbUserProfile['link']
	);
	$userData = $user->checkUser($fbUserData);
	
	// Put user data into session
	$_SESSION['userData'] = $userData;
	
	
}else{
}




?>




<?php

if (isset($_SESSION['userpass']) || isset($_SESSION['userData'])){
	header("Location: content.php");
}
else {
       header("Location: login.php");
};
?>
