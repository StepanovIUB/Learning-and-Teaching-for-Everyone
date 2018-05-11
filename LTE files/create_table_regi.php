<?php
include 'dbcon.php';
?>
<?php
$create_table = "CREATE TABLE user (anum INT AUTO_INCREMENT PRIMARY KEY, date DATETIME, username VARCHAR(50), email VARCHAR(50), pw VARCHAR(50), phone VARCHAR(50), security VARCHAR(50), answer VARCHAR(100), street VARCHAR(50), city VARCHAR(50), state VARCHAR(50), zipcode VARCHAR(50))";
$create_table_query = mysqli_query($dbcon, $create_table);
if ($create_table_query) {
	echo "<script>alert('테이블 생성이 완료되었습니다.');</script>";
} else {
	echo "<script>alert('테이블 생성이 실패했습니다.');</script>";
}
?>
