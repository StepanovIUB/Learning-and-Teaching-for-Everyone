<?php
// Include FB config file && User class
require_once 'fbConfig.php';
require_once 'fb_user.php';
include 'function.php';

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
	
	// Get logout url
	$logoutURL = $helper->getLogoutUrl($accessToken, $redirectURL.'logout.php');
	
	// Render facebook profile data
	if(!empty($userData)){
		$output  = '<h1>Facebook Profile Details </h1>';
		$output .= '<img src="'.$userData['picture'].'">';
        $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        $output .= '<br/>Logout from <a href="'.$logoutURL.'">Facebook</a>'; 
	}else{
		$output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
	}
	
}else{
	// Get login url
	$loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
	
	// Render facebook login button
	$output = '<a href="'.htmlspecialchars($loginURL).'"><img src="images/ffbbbb.jpg"></a>';
}

?>















<?php

//Include GP config file && User class
include_once 'gp_config.php';

if(isset($_GET['code'])){
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
    //Get user profile data from google
    $gpUserProfile = $google_oauthV2->userinfo->get();


    //Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => $gpUserProfile['gender'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);

    //Storing user data into session
    $_SESSION['googleData'] = $userData;


//Render facebook profile data
    if(!empty($userData)){

    }else{
        $google = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
    $authUrl = $gClient->createAuthUrl();
    $google = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/graygoogle.jpg" alt=""/></a>';
}
?>


















<?php

if (isset($_SESSION['userpass']) || isset($_SESSION['userData']) || isset($_SESSION['token'] )|| isset($_SESSION['fb'])){
	header("Location: content.php");
};
?>


<html>
<head>
                <title> Login to L.T.E </title>
                <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=0.35">

		<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>













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

	<!---------- Header ---------->
<div class="clear"></div>
	<!---------- L.T.E Login ---------->
		<div class="login_body">
		<div class="login_main">
			<div class="login_title">
				<a>L.T.E Login</a>
			</div>
			<div class="login_con">
		<div class="login_left">
					<form action="login-process.php" method="post">
						<li><input type="text" name="username" placeholder="Username"></li>
						<li><input type="password" name="userpass" placeholder="Password"></li>
						<li><a href="password_reset.php">Remember ID |</a><a href="password_reset.php"> Forgot 
Password</a></li>
						<li><input type="submit" value="Log in"></li>
					</form>
				</div>
				<div class="login_right">
					<li><a href=""><div><?php echo $output; ?></div></a></li>
					<li><a href=""><div><?php echo $google; ?></div></a></li>
					<li><a>---------- or ----------</a></li>
					<li><form><input type="button" value="Register account" onclick="window.location.href='register.php'"></form> </li>
				</div>
			</div>
		</div>
		</div>
	<!---------- L.T.E Login ---------->










</body>
</html>

