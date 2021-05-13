<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<?php include '../layouts/main-header.php'; ?>


	<section id="cart_items">
		<div class="container">
			
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">

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
					$tinhtong = 0;
						if (isset($_SESSION["cart-add"])) {
						foreach ($_SESSION["cart-add"] as  $value) {
						$tong =  $value["gia"]*$value["sl"];
						$tinhtong  += $value["gia"]*$value["sl"];

					?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="../<?php echo $value['hinh'] ?>" width="100px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><?php echo $value["Ten_hang_hoa"]; ?></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p><?php echo number_format( $value["gia"]); ?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
							
									<input type="text" disabled name="sl<?php echo $value["id"]; ?>" value="<?php echo $value["sl"]; ?>"  min="1">
								
								</div>
							</td>
							<td class="cart_total">                      
								<p class="cart_total_price"><?php echo number_format($tong);  ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="deletecart.php?id=<?php echo $value["id"]; ?>" onclick="return confirm('Bạn có chắc chắc muốn xóa không?.')"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					<?php 
					
								}
								}

					 ?>


						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				
			
			</div>
			<div class="row">
			<form action="xuly-thanhtoan.php" method="POST">

				<div class="col-sm-6">

					<div class="chose_area">
						<h3>Thông tin khách hàng</h3>
						<ul class="user_option">
							<li>
							
								<input type="text" name="ten" required="text" >
											<label style="font-size: 20px">Họ và tên</label>
							
							</li>
							<li>
							
								<input type="text" name="email" required="email" >
											<label style="font-size: 20px">Email</label>
							
							</li>
							<li>
							
								<input type="text" name="diachi" required="text" >
									<label style="font-size: 20px">Địa chỉ</label>
							
							</li>
							<li>
								
								<input type="number" name="sdt" required="number" >
								<label style="font-size: 20px">Số điện thoại</label>
								<input type="hidden" name="tinhtong" value="<?php echo $tinhtong ?>">

							
							</li>
						</ul>
					
							
						<input class="btn btn-default update"  type="submit" name="order" value="order">

					</div>
				</div>
			</form>
				<div class="col-sm-6">
			
					<div class="total_area">
						<ul>
									<h3>Tổng tiền sản phẩm</h3>
							
							<h3>Total <span><?php echo  number_format($tinhtong ); ?>
</span></h3>
						</ul>
					
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<?php include '../layouts/footer.php'; ?>

	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>