<?php
include 'function.php';
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
                <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="registeration.css">

    <title> Registration completed</title>
  </head>
  <body>











  <br>
  <br>
  <br>
  <br>

  <div style="color:#A94343; Font-size: 20px; font-weight:bold;">
  <center>










  <?php
   
  function test_input($data) {     
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);  
     return $data;}
 //  }
  
  

  
  // Create connection
  $con = mysqli_connect("db.soic.indiana.edu","i494f17_team31","my+sql=i494f17_team31", "i494f17_team31");
  // Check connection
  //if (mysqli_connect_errno())  
  //     {echo nl2br("Failed to connect to MySQL: " . mysqli_connect_error() . "\n "); }
  //else
  //   { echo nl2br("Established Database Connection \n");}


  // getting data from the registration form and sanitizing it
  $sanpass = mysqli_real_escape_string($con, $_POST['userpass']);
  $sanname = mysqli_real_escape_string($con, $_POST['username']);
  $sanconpass = mysqli_real_escape_string($con, $_POST['conuserpass']);
  $sanfirstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $sanlastname = mysqli_real_escape_string($con, $_POST['lastname']);
  $sanemail = mysqli_real_escape_string($con, $_POST['email']);  
  $sangender = mysqli_real_escape_string($con, $_POST['gender']);
  $sanphone = mysqli_real_escape_string($con, $_POST['phone']);
  $sanquestion = mysqli_real_escape_string($con, $_POST['question']);
  $sananswer = mysqli_real_escape_string($con, $_POST['answer']);
  $sanaddress = mysqli_real_escape_string($con, $_POST['address']);
  $sanzip = mysqli_real_escape_string($con, $_POST['zip']);
  





  // Second  data sanitizition
  $sanpass = test_input($sanpass);
  $sanname = test_input($sanname);
  $sanconpass = test_input($sanconpass);
  $sanfirstname = test_input($sanfirstname);
  $sanlastname = test_input($sanlastname);  
  $sanemail = test_input($sanemail);
  $sangender = test_input($sangender);
  $sanphone = test_input($sanphone);
  $sanquestion = test_input($sanquestion);
  $sananswer = test_input($sananswer);
  $sanaddress = test_input($sanaddress);
  $sanzip = test_input($sanzip);

  









  // Hashing pasword of the user
  $encpass = password_hash($sanpass,PASSWORD_DEFAULT);
  
  
  // Creating a hash for the link to send the confirmation email from
  $hash = md5( rand(0,1000) ); 
  
 
  
 // Insering data into the database 
  if ($sanpass == $sanconpass){

     $sql = "INSERT INTO users (username, userpass, first_name, last_name, email, gender, phone, question, answer, address, zip, hash) VALUES ('$sanname','$encpass','$sanfirstname',
     '$sanlastname','$sanemail','$sangender','$sanphone','$sanquestion','$sananswer','$sanaddress','$sanzip','$hash')";
     if (!mysqli_query($con,$sql))
        { echo "<div><p>The username or email address is already used.\nPlease choose another username or email address.</p></div>"; }
     else
      {echo "Registration was successful!\n We have sent a confirmation message to your email.\n Please use it to verify your account!\n";
       $to      = $sanemail; // Send email to our user
       $subject = 'Signup | Verification'; // Give the email a subject 
       $message = '
 
       Thanks for signing up!
       Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
       ------------------------
       Username: '.$sanname.'
       Password: '.$sanpass.'
       ------------------------
 
       Please click this link to activate your account:
       http://cgi.soic.indiana.edu/~stepanov/capstone_week_2/verify.php?email='.$sanemail.'&hash='.$hash.'
 
       '; // Our message above including the link
                     
       $headers = 'From:http://cgi.soic.indiana.edu/~stepanov/capstone_week_2/verify.php' . "\r\n"; // Set from headers
       mail($to, $subject, $message, $headers); // Send our email
       }
     }
  else {
     echo "Your password did not match you confirmation password.\n Please try again.\n";}
   
  
  //if (!mysqli_query($con,$sql))
    // { echo "The username or email address is already used.\nPlease choose another username or email address."; }

  //  echo "Registration was successful!";
  
  







  mysqli_close($con);
  ?>




  
  </br>
  </br>
  <a href="login.php"> <input type="button" value="Back to login page" style = "width: 220px; height: 50px; background-color:#A94343; 
color:white; Font-size: 20px; font-weight:bold; border-radius: 7px"></a> </br>
  

  </div>
  </center>
  
  </body>
</html>
