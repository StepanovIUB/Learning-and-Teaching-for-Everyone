<?php
include 'function.php';
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
                <meta name="viewport" content="width=device-width">

    <title> Password reset </title>
  </head>
  <body>









  <br>
  <br>
  <br>
  <br>
  

  <div style="color:#A94343; Font-size: 20px; font-weight:bold">
  <center>
  <?php

  function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;}




  // Create connection
  $con = mysqli_connect("db.soic.indiana.edu","i494f17_team31","my+sql=i494f17_team31", "i494f17_team31");
  // Check connection
  //if (mysqli_connect_errno())
  //     {echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }
  //else
  //   { echo nl2br("Established Database Connection \n");}


  // getting data from the registration form and sanitizing it
  $sanpass = mysqli_real_escape_string($con, $_POST['userpass']);
  $sanconpass = mysqli_real_escape_string($con, $_POST['conuserpass']);
  $sanemail = mysqli_real_escape_string($con, $_POST['email']);

 

  // Hashing pasword of the user
  $encpass = password_hash($sanpass,PASSWORD_DEFAULT);



  if ($sanpass == $sanconpass){

     $sql = "UPDATE users SET userpass='$encpass' WHERE email='$sanemail' and active='1'";
     $query = mysqli_query($con, $sql);

     $name_sql = "SELECT * FROM users WHERE email='$sanemail'";
     $sanname = mysqli_query($con,$name_sql);
     $array = mysqli_fetch_array($sanname);
   

     if (!mysqli_query($con,$sql))
        { echo "Your account does not exist or you have entered wrong email.\nPlease try again."; }
     else
      {echo "<div>Resseting password was successful! We have sent a message with your credentials to your email.\n Please use it to finish reseting  your 
account!\n </div>";
       $to      = $sanemail; // Send email to our user
       $subject = 'Account Reset | LTE'; // Give the email a subject
       $message = '

       Welcome back to LTE!
       Your account has been reset, you can log in with the following credentials:

       ------------------------
       Username: '.$array["username"].'
       Password: '.$sanpass.'
       ------------------------

       Please click this link to log in:
       
       http://cgi.soic.indiana.edu/~stepanov/capstone_week_2/login.php

       '; // Our message above including the link

       $headers = 'From:http://cgi.soic.indiana.edu/~stepanov/capstone_week_2/verify.php' . "\r\n"; // Set from headers
       mail($to, $subject, $message, $headers); // Send our email
       }
     }
  else {
     echo "Your password did not match you confirmation password.\n Please try again.\n";}









   ?>


  
  
  </br>
  </br>

<a href="login.php"> <input type="button" value="Back to login page" style = "width: 220px; height: 50px; background-color:#A94343;
color:white; Font-size: 20px; font-weight:bold; border-radius: 7px; border-color:#A94343;"></a> </br>

  </div>
  </center>
  </body>
</html>
