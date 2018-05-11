<?php
// set "chmod 757 image"
$file_name = $_FILES['upload']['name'];
$tmp_file = $_FILES['upload']['tmp_name'];
$file_path = './image/'.date("y-m-d h:i:s", time()).$file_name;
move_uploaded_file($tmp_file, $file_path);
print $file_name."--".$tmp_file."--".$file_path;
print date("y-m-d h:i:s", time());
print "<img src='image/".$file_name."'>";
?>
