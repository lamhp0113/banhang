<?php 
session_start();
require_once("db.php");
if (isset($_POST["update-cart"])) {
	if (isset($_SESSION["cart-add"])) {
		foreach ($_SESSION["cart-add"] as $value) {
			if ($_POST["sl".$value["id"]] <= 0) {
				
				unset($_SESSION["cart-add"]["sl".$value["id"]]);
			}
			else{
				$_SESSION["cart-add"][$value["id"]]["sl"] = $_POST["sl".$value["id"]];
			}
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Cart | E-Shopper</title>
	<?php include '../layouts/style.php'; ?>
	<?php include '../layouts/script.php'; ?>
</head><!--/head-->

<body>
	<?php include '../layouts/main-header.php'; ?>

	<section id="cart_items">
		<div class="container">
			
			<div class="table-responsive cart_info">
				<form action="cart-hienthi.php" method="POST">
					<table class="table table-condensed">
						<thead>
							<tr class="cart_menu">
								<td class="image">Ảnh</td>
								<td class="description">Tên sản phẩm</td>
								<td class="price">Giá</td>
								<td class="quantity">Số lượng</td>
								<td class="total">Tổng </td>
								<td></td>
							</tr>
						</thead>
						<tbody>

							<?php 
							

							if (isset($_SESSION["cart-add"])) {
								foreach ($_SESSION["cart-add"] as  $value) {
									$tong =  $value["gia"]*$value["sl"];

									?>
									<tr>
										<td class="cart_product">
											<a href=""><img src="../<?php echo $value['hinh'] ?>" width="100px" alt=""></a>
										</td>
										<td class="cart_description">
											<h4><?php echo $value["Ten_hang_hoa"]; ?></h4>
										
										</td>
										<td class="cart_price">
											<p><?php echo number_format( $value["gia"]); ?></p>
										</td>
										<td class="cart_quantity">
											<div class="cart_quantity_button">
												
												<input type="number" name="sl<?php echo $value["id"]; ?>" value="<?php echo $value["sl"]; ?>" min="1">
												
											</div>
										</td>
										<td class="cart_total">
											<p class="cart_total_price"><?php echo number_format($tong);  ?></p>
										</td>
										<td class="cart_delete">
											<a class="cart_quantity_delete"  href="deletecart.php?id=<?php echo $value["id"]; ?>" onclick="return confirm('Bạn có chắc chắc muốn xóa không?.')"><i class="fa fa-times"></i></a>
										</td>
									</tr>
									<?php 
									
								}
							}

							?>


							
						</tbody>
					</table>
					<button class="btn btn-fefault cart" type="submit" name="update-cart">Cập nhật giỏ hàng</button>
					<a class="btn btn-fefault cart" href="thanhtoan.php">Thanh toán</button></a>

				</form>
			</div>
		</div>
	</section> <!--/#cart_items-->



	<?php include '../layouts/footer.php'; ?>


	
</body>
</html>