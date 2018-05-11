<?php

include 'function.php';

insert_joined();

empty_cart();


if ($_SESSION['username'] == Null) {
                echo "<script>alert('Please Login.'); history.back();</script>";
                }
                $username = $_SESSION['username'];
                $sql = "SELECT * FROM users WHERE username LIKE '".$username."'";
                $query = mysqli_query($dbcon, $sql);
                $array = mysqli_fetch_array($query);
                $joined_array = explode('/-/', $array['joined']);
                $joined_array_fil = array_filter(array_map('trim',$joined_array));

		foreach ($joined_array_fil as $c_l) {
                      $c_l_sql_update = "UPDATE class set cur_participants = (cur_participants + 1) WHERE anum LIKE '".$c_l."'";
                      $c_l_query_update = mysqli_query($dbcon, $c_l_sql_update);
		}
		
		foreach ($joined_array_fil as $c_l_2) {
                        $c_l_sql = "SELECT * FROM class WHERE anum LIKE '".$c_l_2."'";
                        $c_l_query = mysqli_query($dbcon, $c_l_sql);
                        $c_l_array = mysqli_fetch_array($c_l_query);

			
			$provider_sql = "SELECT * FROM users WHERE username  LIKE '".$c_l_array['username']."'";
                        $provider_query = mysqli_query($dbcon, $provider_sql);
                        $provider_array = mysqli_fetch_array($provider_query);


			$provider = $provider_array['email']; // Send email to our user
		        $subject = 'LTE notification of a participant joining the activity'; // Give the email a subject
        		$message = '

        		Congratulations '.$provider_array["first_name"].',

        		A person has just joined your '.$c_l_array["name"].' LTE activity happening on '.$c_l_array["dates"].'.

       			Best,

        		LTE


        		'; // Our message above including the link

       			$headers = 'From: L.T.E' . "\r\n"; // Set from headers
        		mail($provider, $subject, $message, $headers); // Send our email

		}






if (isset($_SESSION['userpass']) || isset($_SESSION['userData']) || isset($_SESSION['token'] )|| isset($_SESSION['fb'])){
        header("Location: joined.php");
};

	/*
	$participant = $sanemail; // Send email to our user
        $subject = 'LTE confirmation of participation in the activity'; // Give the email a subject
        $message = '

        '.$sanfirstname.', your participation in "" was confirmed!

        Here are the details of your activity:

        Best,

        LTE 


        '; // Our message above

        $headers = 'From: L.T.E' . "\r\n"; // Set from headers
        mail($to, $subject, $message, $headers); // Send our email

	

	$provider      = $sanemail; // Send email to our user
        $subject = 'LTE notification of a participant joining the activity; // Give the email a subject
        $message = '

        '.$sanfirstname.', 

	The following user "" has just joined your LTE activity	"".

        Best,

        LTE 


        '; // Our message above including the link

        $headers = 'From: L.T.E' . "\r\n"; // Set from headers
        mail($to, $subject, $message, $headers); // Send our email

	*/

?>
