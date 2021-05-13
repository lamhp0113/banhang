

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Product Details | E-Shopper</title>
	<?php include '../layouts/style.php'; ?>
	<?php include '../layouts/script.php'; ?>
</head><!--/head-->


<body>
	<?php include '../layouts/main-header.php'; ?>
	<section>
		<div class="container">
			<div class="row">
				<?php 
				require_once "db.php";
				if (isset($_POST['search'])) {
					$timkiem = $_POST["keyword"];
					if ($timkiem!="") {
						$sql=  "SELECT *FROM hang_hoas WHERE Ten_hang_hoa LIKE '%$timkiem%'";
						$kq1=mysqli_query($conn,$sql);
						?>
						<h2 class="title text-center"><?php echo 'Bạn đã tìm kiếm từ khóa: '. $timkiem; ?> </h2>
						<?php foreach ($kq1 as $value) {?>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<a href="product-detail.php?id=<?php echo $value['id']; ?>">
												<img src="../<?php echo $value["hinh"]; ?>" alt="" width="200px" height="200px" /> 
											</a>
											<h2><?php echo number_format($value["gia"]); ?></h2>
											<span style="white-space: nowrap;overflow: hidden;text-overflow: clip;"><?php echo $value["Ten_hang_hoa"]; ?></span>
											<br>
											<a href="cart-xuly.php?id=<?php echo $value['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a>
											<a href="product-detail.php?id=<?php echo $value['id']; ?>" class="btn btn-default add-to-cart">Xem sản phẩm </a>
										</div>
									</div>
								</div>
							</div>
							
						<?php  }
					}else{ ?>
						<h2 class="title text-center">Chưa nhập từ khóa</h2>
					<?php }
				}
				?>
			</div>

		</div>
	</section>
	<?php include '../layouts/footer.php'; ?>
</body>
</html>