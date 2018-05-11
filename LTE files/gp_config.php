<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '24364289885-ou5pjcr5646kp6u4b8orbjoii7egtoj1.apps.googleusercontent.com';
$clientSecret = 'tYyAtO3Di2MyCF-hzisrgXro';
$redirectURL = 'http://cgi.soic.indiana.edu/~stepanov/capstone_week_2/google_process.php';

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to LTE');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
