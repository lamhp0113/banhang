<?php 

$server ="localhost";
$username ="root";
$password ="";
$namedb ="tmdt";

$conn = mysqli_connect($server,$username,$password,$namedb);

if ($conn) {

	mysqli_query($conn,"SET NAMES 'utf8'");
}
else {

	echo "kết nối thất bại";
}


?>