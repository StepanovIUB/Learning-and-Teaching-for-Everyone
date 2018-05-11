<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>



	
<?php
   
  function test_input($data) {     
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);  
     return $data;}
 
  
  

  
  // Create connection
  $con = mysqli_connect("db.soic.indiana.edu","i494f17_team31","my+sql=i494f17_team31", "i494f17_team31");


  // getting data from the registration form and sanitizing it
 
  $sanfirstname = mysqli_real_escape_string($con, $_POST['firstname']);
  $sanlastname = mysqli_real_escape_string($con, $_POST['secondname']);
  $sanemail = mysqli_real_escape_string($con, $_POST['email']);  
  $sanoccupation = mysqli_real_escape_string($con, $_POST['occupation']);
 
  





  // Second  data sanitizition
  
  $sanfirstname = test_input($sanfirstname);
  $sanlastname = test_input($sanlastname);  
  $sanemail = test_input($sanemail);
  $sanoccupation = test_input($sanoccupation);
  $sql = "INSERT INTO leads (first_name, family_name, email, occupation) VALUES ('$sanfirstname','$sanlastname','$sanemail','$sanoccupation')";
	

  if (!mysqli_query($con,$sql))
  	{ echo "<script>alert('Your are already subscribed to L.T.E! We will notify you about our launch as soon as we can.'); window.location.replace('landing_page.html');</script>"; }
  else
  	{ echo "<script>alert('Thank you for subscribing to L.T.E! We will notify you about our launch as soon as we can.'); window.location.replace('landing_page.html');</script>";
        $to      = $sanemail; // Send email to our user
        $subject = 'L.T.E Subscription'; // Give the email a subject 
        $message = '
 
        '.$sanfirstname.', thank you for signing up to L.T.E!
       
	We will notify you about our launch as soon as we can. 
	   
        Best,
	   
	L.T.E Development Team
     
 
        '; // Our message above including the link
                     
        $headers = 'From: L.T.E' . "\r\n"; // Set from headers
        mail($to, $subject, $message, $headers); // Send our email
        }
     
 
   

?>



<body>
</body>
</html>
