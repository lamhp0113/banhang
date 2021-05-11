<?php
include "db.php";

// BƯỚC 2: TÌM TỔNG SỐ RECORDS
$sql = "SELECT count(id) as total from hang_hoas";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
$current_page = isset($_GET['page']) ? $_GET['page'] : 1; // ? là đúng lấy  $_get['page '] nghĩa là url 
// if (isset($_GET['page'])) {
// 	$current_page = $_GET['page']
// }else{
// 	$current_page=1  
// } tương đương $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$limit = 6;
// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
// tổng số trang
$total_page = ceil($total_records / $limit);

// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page) {
	$current_page = $total_page;
} else if ($current_page < 1) {
	$current_page = 1;
}

// Tìm Start
$start = ($current_page - 1) * $limit;

// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
$qr = "SELECT * FROM hang_hoas LIMIT $start, $limit";     // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
$result = mysqli_query($conn, $qr);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Home | E-Shopper</title>

	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->
<?php include '../layouts/style.php'; ?>
<?php include '../layouts/script.php'; ?>

</head>
<!--/head-->

<body>
	<?php include '../layouts/main-header.php'; ?>
	<?php include '../layouts/slider.php'; ?>
	<section>
		<div class="container">
			<div class="row">
				<?php include '../layouts/danhmuc.php'; ?>
				<div class="col-sm-9 padding-right">
					<div class="features_items">
						<!--features_items-->
						<h2 class="title text-center"> Sản phẩm</h2>
						<?php
						foreach ($result as $value) { ?>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<a href="product-detail.php?id=<?php echo $value['id']; ?>">
												<img src="../<?php echo $value["hinh"]; ?>" width="200px" /> </a>
												<h2><?php echo number_format($value["gia"]); ?></h2>
												<p  style="white-space: nowrap;overflow: hidden;text-overflow: clip;"><?php echo $value["Ten_hang_hoa"]; ?></p>
												<a href="cart-xuly.php?id=<?php echo $value['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a>
												<a href="product-detail.php?id=<?php echo $value['id']; ?>" class="btn btn-default add-to-cart">Xem sản phẩm </a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="phantrang" style=" width:18%;margin:auto" >
				<?php
				// PHẦN HIỂN THỊ PHÂN TRANG
				// BƯỚC 7: HIỂN THỊ PHÂN TRANG

				// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
				if ($current_page > 1 && $total_page > 1) {
					echo '<a href="trangchu.php?page=' . ($current_page - 1) . '">Trang sau</a> | ';
				}

				// Lặp khoảng giữa
				for ($i = 1; $i <= $total_page; $i++) {
					// Nếu là trang hiện tại thì hiển thị thẻ span
					// ngược lại hiển thị thẻ a
					if ($i == $current_page) {
						echo '<span>' . $i . '</span> | ';
					} else {
						echo '<a href="trangchu.php?page=' . $i . '">' . $i . '</a> | ';
					}
				}

				// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
				if ($current_page < $total_page && $total_page > 1) {
					echo '<a href="trangchu.php?page=' . ($current_page + 1) . '">Trang trước</a> | ';
				}
				?>
			</div>
		</div>
	</section>

	<?php include '../layouts/footer.php'; ?>

</body>

</html>