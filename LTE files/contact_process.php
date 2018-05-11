<?php 

// define variables and set to empty values
$name_error = $email_error = "";
$name = $userid = $email = $phone = $title = $comment = $success = "";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $name_error = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $name_error = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["userid"])) {
    $userid = "";
  } else {
    $userid = test_input($_POST["userid"]);
  }


  if (empty($_POST["email"])) {
    $email_error = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Invalid email format"; 
    }
  }
  
  if (empty($_POST["phone"])) {
    $phone = "";
  } else {
    $phone = test_input($_POST["phone"]);
  }

  if (empty($_POST["title"])) {
    $title = "";
  } else {
    $title = test_input($_POST["title"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
  
  if ($name_error == '' and $email_error == '' ){
      $message_body = '';
      unset($_POST['submit']);
      foreach ($_POST as $key => $value){
          $message_body .=  "$key: $value\n";
      }
      
      $to = 'stepanov@iu.edu';
      $subject = 'Contact Form Submit';
      $message="Name: ".$name."\n"."User ID: ".$userid."\n"."Phone: ".$phone."\n"."Subject: ".$title."\n"."Message: ".$comment;
      $header="From: ".$email;
      
      if (mail($to, $subject, $message, $header)){
          $success = "Message sent, thank you for contacting us!";
          $name = $userid = $email = $phone = $title = $comment = '';
      }
  }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>	
