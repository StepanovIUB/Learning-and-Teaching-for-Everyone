<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
                <meta name="viewport" content="width=device-width">

    <title> Registration verification</title>
  </head>


<body style= "background-color:white; Font-size: 20px; font-weight:bold">



















<br>







<?php



$con= mysqli_connect("db.soic.indiana.edu","i494f17_team31","my+sql=i494f17_team31", "i494f17_team31");



// Verify data
$email = mysql_escape_string($_GET['email']); // Set email variable
$hash = mysql_escape_string($_GET['hash']); // Set hash variable
    
//echo '<div> Email is ' .$email. '</div>';
//echo '<div> Hash is ' . $hash . '</div>';
                     
$search = mysqli_query($con,"SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'"); 
$match  = mysqli_num_rows($search);
                 
if($match > 0){
	// We have a match, activate the account
        mysqli_query($con,"UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'");
        echo '<center> <div> Your account has been activated, you can now login</div></center>';}
else{
        // No match -> invalid url or account has already been activated.
        echo '<center> <div> The url is either invalid or you already have activated your account.</div> </center>';
    }    
?>


</br>
</br>
<center>
<div>
<a href="login.php"> <input type="button" value="Back to login page" style = "color:white; background-color:color:#A94343; width: 220px; height: 50px; 
Font-size: 20px; font-weight:bold; 
border-radius: 7px"></a> </br>
</div>
</center>

</body>
</html>
