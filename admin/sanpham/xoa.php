<?php 

require '../../db.php';
if (isset($_GET["id"])) {
	$id	= $_GET["id"];
	# code...
}

$sql= " DELETE  FROM hang_hoas WHERE id= $id ";
$xoa = mysqli_query($conn,$sql);
if ($xoa) {
	header("location:list-sanpham.php");
}else{
	echo ("Sản phẩm đã đặt hàng rồi");
};
 


?>	