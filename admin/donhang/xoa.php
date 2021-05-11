<?php require_once "../../db.php";



if (isset($_GET["id"])) {
	$id	= $_GET["id"];
	# code...
}

	$sql ="DELETE FROM `don_hangs` WHERE id=$id";
	$xoa= mysqli_query($conn,$sql);
	
	if ($xoa) {
	
		header("location:list-donhang.php");
	}
	else {

		echo "Đon hàng tồn tại";
		header( "refresh:4;url=list-donhang.php" );
	}
 ?>