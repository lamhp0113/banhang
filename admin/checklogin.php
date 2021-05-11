<?php 
session_start();
if (!isset($_SESSION["users"])) {
	header("location:../login.php");
} 

echo $_SESSION["users"];

?>