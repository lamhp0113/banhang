<?php 
require_once "../db.php";
session_start();
if (isset($_POST['order'])) {
	$cart=empty($_SESSION["cart-add"])?[]:$_SESSION["cart-add"];

	$ten=$_POST['ten'];
	$diachi=$_POST['diachi'];
	$sdt=$_POST['sdt'];
	$tinhtong=$_POST['tinhtong'];
		// don hang 
	$sql="INSERT INTO `don_hangs` (`ten_khach_hang`,`so_dien_thoai`, `dia_chi`, `Trang_Thai`, `tong_tien`) VALUES ('$ten','$sdt','$diachi',1,'$tinhtong')";
	
	$don_hang = mysqli_query($conn,$sql);

		$donhang_id = $conn->insert_id;	
		foreach ($cart as $value) {
			$id=$value['id'];
			$sl=$value['sl'];
			$tong =  $value["gia"]*$value["sl"];
			$order_detail="INSERT INTO `chi_tiet_don_hangs`( `id_hang_hoa`,`gia`, `so_luong`, `id_Don_hang`) VALUES ('$id','$tong','$sl','$donhang_id')";
			echo $order_detail;
			$ketqua_detail=mysqli_query($conn,$order_detail);
		}
	

    unset($_SESSION["cart-add"]);
   header("location:trangchu.php");
	}

	?>