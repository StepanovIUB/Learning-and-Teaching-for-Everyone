  <?php
  print_r($_SESSION);
  function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;}
 //  }




  // Create connection
  $con = mysqli_connect("db.soic.indiana.edu","i494f17_team31","my+sql=i494f17_team31", "i494f17_team31");


  // getting data from the registration form and sanitizing it
  $sanname = mysqli_real_escape_string($con, $_POST['name']);
  $sanlat = mysqli_real_escape_string($con, $_POST['lat']);
  $sanlong = mysqli_real_escape_string($con, $_POST['long']);
  $santype = mysqli_real_escape_string($con, $_POST['type']);
  $sanaddress = mysqli_real_escape_string($con, $_POST['address']);

  // Second  data sanitizition
  $sanname = test_input($sanname);
  $sanlat = test_input($sanlat);
  $sanlong = test_input($sanlong);
  $santype = test_input($santype);
  $sanaddress = test_input($sanaddress);

  $anum_sql = "SELECT MAX(anum) as maxnum FROM class";
              $anum_result = mysqli_query($con, $anum_sql);
              if (mysqli_num_rows($anum_result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($anum_result)) {
                            $anum = $row["maxnum"];
                    }
                 }

  
 
  $sql = "INSERT INTO markers (name, address, lat, lng, type, anum) VALUES ('$sanname', '$sanaddress', '$sanlat',
'$sanlong',
'$santype','$anum')";
        $query = mysqli_query($con, $sql);
        if ($query) {
                sleep(3);
                echo "<script>alert('Activity was succesfully created!');
window.location.replace('class_detail.php?comnum=".$anum."');</script>";
        } else {
                echo "<script>alert('Something went wrong! Your activity was not created!'); history.back();</script>";
        }
  

?>
