<?php require_once "db.php";
$id = $_GET["id"];
$sql ="SELECT *FROM tintuc where id = $id";
$chitiettintuc = mysqli_query($conn,$sql);
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

<body>
	<?php include '../layouts/main-header.php'; ?>
	
	<section>
		<div class="container">
			<div class="row">
				<?php include '../layouts/danhmuc.php'; ?>
				<div class="col-sm-9">
					<?php 	while ($row = mysqli_fetch_array($chitiettintuc))
					{?>
						<div class="blog-post-area">
							<h2 class="title text-center"><?php echo $row['tieude']; ?></h2>
							<div class="single-blog-post">
								<h3><?php echo $row['mota']; ?></h3>
							
								<a href="">
									<img src="../<?php echo $row['hinhanh']; ?>" style="width:600px;height: 400px"  alt="">
								</a>
								<p>
									<?php echo $row['noidung']; ?>
								</p> <br>


							
							</div>
						</div><!--/blog-post-area-->

					<?php } ?>

				</div>	
			</div>
		</div>
	</section>
	<?php include '../layouts/footer.php'; ?>

	<?php include '../layouts/script.php'; ?>





</body>
</html>