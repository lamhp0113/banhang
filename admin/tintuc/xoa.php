<?php 

require '../../db.php';
if (isset($_GET["id"])) {
	$id	= $_GET["id"];
	# code...
}

$sql= " DELETE  FROM tintuc WHERE id= $id ";
$xoa = mysqli_query($conn,$sql);
if ($xoa) {
	header("location:list-tintuc.php");
}else{
	echo ("Sản phẩm đã đặt hàng rồi");
};
 


?>	