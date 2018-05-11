<?php
include 'dbcon.php';
?>
<?php
$create_table = "CREATE TABLE class (anum INT AUTO_INCREMENT PRIMARY KEY, date DATETIME, type VARCHAR(50), name VARCHAR(50), price VARCHAR(50), startdate VARCHAR(50), description TEXT, location VARCHAR(100), image TEXT, activenum VARCHAR(100))";
$create_table_query = mysqli_query($dbcon, $create_table);
if ($create_table_query) {
	echo "<script>alert('테이블 생성이 완료되었습니다.');</script>";
} else {
	echo "<script>alert('테이블 생성이 실패했습니다.');</script>";
}
?>
