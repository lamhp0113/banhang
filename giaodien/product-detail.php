<?php require_once "db.php";
$id = $_GET["id"];
$sql ="SELECT *FROM hang_hoas where id = $id";
$result = mysqli_query($conn,$sql);
?>
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

	<?php require_once "../layouts/main-header.php"; ?>
	
	<section>
		<div class="container">
			<div class="row">
				<?php require_once "../layouts/danhmuc.php"; ?>

				<?php 	while ($row = mysqli_fetch_array($result))
				{?>
					<div class="col-sm-9 padding-right">
						<div class="product-details"><!--product-details-->
							<div class="col-sm-5">
								<div class="view-product">
									<img src="../<?php echo $row['hinh'] ?>" alt="" />
								</div>
								
							</div>
							<div class="col-sm-7">

								<div class="product-information"><!--/product-information-->

									<h2><?php  echo $row["Ten_hang_hoa"]; ?></h2>
									<p>Mã code: <?php  echo  $row["ma_code"]; ?></p>
									<span>
										<span><?php  echo number_format($row["gia"]); ?></span>
										<form action="cart-xuly.php?id=<?php echo $row["id"]; ?>" method="POST">
											<label>Quantity:</label>
											<input type="number" value="1" name="sl"  min="1" />


											<button class="btn btn-fefault cart" type="submit" name="add-to-cart" <!-- tự đặt -->
												<i class="fa fa-shopping-cart"></i>
												Thêm giỏ hàng
											</button>
										</form>
									</span>

								</div><!--/product-information-->
							<?php } ?>

						</div>
					</div><!--/product-details-->
					

					

					
				</div>
			</div>
		</div>
	</section>
	
<?php include '../layouts/footer.php'; ?>
</body>
</html>