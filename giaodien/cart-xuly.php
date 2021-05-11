<?php 		
session_start();
require_once "db.php";
$id = $_GET["id"];
$qr = "SELECT *FROM hang_hoas where id = $id";
$result = mysqli_query($conn,$qr);

$product_cart = array();
foreach ($result as $value) {
	$product_cart[$value["id"]]= $value;
}
$detail = $product_cart[$id];


	// echo "<pre>";
	// print_r($detail); 
	// kiem tra xem hanh dong co phai la add-to-cart
if (isset($_POST["add-to-cart"])) {
		// lay so luong tu form sl
	$sl = $_POST["sl"];
			// kiem tra session cart-add da ton tai hay chua
	if (!isset($_SESSION["cart-add"]) || $_SESSION["cart-add"] == null) 
	{
				//chua ton tai thi:
		$product_cart[$id]["sl"] = $sl;
				// tao session cart-add voi id la san pham o trang produt detail truyen sangs
		$_SESSION["cart-add"][$id] = $product_cart[$id];
	}
	else{

				// kiem tra session cart-add co chua ID cua san pham hay chua
		if (array_key_exists($id, $_SESSION["cart-add"])) {
					// neu ton tai roi
			$_SESSION["cart-add"][$id]["sl"] +=$sl;
		}
		else{
					// chua ton tai
			$product_cart[$id]["sl"] = $sl;
			$_SESSION["cart-add"][$id] = $product_cart[$id];
		}
		
	}

}else{
	$sl=1;

					// kiem tra session cart-add da ton tai hay chua
	if (!isset($_SESSION["cart-add"]) || $_SESSION["cart-add"] == null) 
	{
				//chua ton tai thi:
		$product_cart[$id]["sl"] = $sl;
				// tao session cart-add voi id la san pham o trang produt detail truyen sangs
		$_SESSION["cart-add"][$id] = $product_cart[$id];
	}
	else{

				// kiem tra session cart-add co chua ID cua san pham hay chua
		if (array_key_exists($id, $_SESSION["cart-add"])) {
					// neu ton tai roi
			$_SESSION["cart-add"][$id]["sl"] +=$sl;
		}
		else{
					// chua ton tai
			$product_cart[$id]["sl"] = $sl;
			$_SESSION["cart-add"][$id] = $product_cart[$id];
		}
	}
}
header("location:cart-hienthi.php");

?>
