<?php 
require_once "../../db.php";
$id = $_GET["id"];


$sql ="SELECT *FROM don_hangs where id = $id";

$result = mysqli_query($conn,$sql);
$sql2 ="SELECT a.gia,a.so_luong,b.Ten_hang_hoa FROM chi_tiet_don_hangs a left JOIN hang_hoas b on a.id_hang_hoa=b.id where id_Don_hang =$id";

$result2= mysqli_query($conn,$sql2);
if (isset($_POST['hoanthanh'])) {
	$sql2 = "UPDATE don_hangs Set Trang_Thai=2 WHERE id=$id ";
	$in2 = mysqli_query($conn, $sql2);
	header("location:list-donhang.php");

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<?php include  '../layout/style.php' ?>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<?php include '../layout/sidebar.php'  ?>
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Chi tiết đơn hàng</h1>
						</div><!-- /.col -->

					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								Thông tin khách hàng
							</h3>
						</div>
						<?php 	
						$trangthai=null;
						while ($row = mysqli_fetch_array($result))
						{  
							$trangthai = $row['Trang_Thai'];

							?>
							<div class="card-body">
								<dl>
									<dt>Họ và tên</dt>
									<dd><?php echo ($row['ten_khach_hang']); ?></dd>
									<dt>Email</dt>
									<dd><?php echo ($row['email']); ?></dd>
									<dt>Số điện thoai</dt>
									<dd><?php echo ($row['so_dien_thoai']); ?>.</dd>
									<dt>Đia chỉ</dt>
									<dd><?php echo ($row['dia_chi']); ?></dd>

								</dl>
							</div>
						<?php } ?>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- ./col -->
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Thông tin đơn hàng</h3>
						</div>

						<div class="card-body">
							<table class="table table-bordered">
								<thead>
									<tr>

										<th>Tên</th>
										<th>Gía</th>
										<th >Số lượng</th>
									</tr>
								</thead>

								<?php 
								$tongtien=0;

								foreach ($result2 as $in) {
									$tongtien= $tongtien+ $in['gia'];
									?>
									<tbody>
										<tr>
											<td><?php echo ($in['Ten_hang_hoa']); ?></td>
											<td><?php echo ($in['gia']); ?></td>
											<td>
												<?php echo ($in['so_luong']); ?>
											</td>


										</tr>

									</tbody>
								<?php } ?>

							</table>
							<b>Tổng tiền: </b>  <?php echo  $tongtien; ?>
							
							<?php 	if ($trangthai==1) {?>
								<form action="donhang.php?id=<?php  echo $id; ?>" method="POST">
									<br>
									<input type="submit" name="hoanthanh" value="Hoàn thành">

								</form>
							<?php } ?>


						</div>


						<!-- /.card-body -->

					</div>
				</div>
				<!-- ./col -->
			</div>
		</div>


		<?php include '../layout/footer.php'; ?>

		<?php include '../layout/script.php'; ?>
	</div>
</body>
</html>