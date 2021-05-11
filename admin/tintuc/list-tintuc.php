<?php 
require_once "../../db.php";



$sql = "SELECT *FROM tintuc";
$result = mysqli_query($conn,$sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Dashboard</title>


	<?php include  '../layout/style.php' ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">


		<?php include '../layout/sidebar.php'; ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Danh sách tin tức</h1>
						</div><!-- /.col -->

					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tbody>
							<tr>
								<th>ID</th>
								<th>Tiêu đề</th>

								<th>Mô tả</th>

								<th>
									<a href="them.php" class="btn btn-sm btn-success">Add</a>
								</th>
							</tr>
							<?php foreach ($result as $tintuc ) {
             # code...
								?>
								<tr>
									<td><?php echo($tintuc['id']) ?></td>
									<td><?php echo($tintuc['tieude']) ?></td>
									<td><?php echo($tintuc['mota']) ?></td>
									<td>
										<a href="sua.php?id=<?php  echo $tintuc["id"]; ?>" class="btn btn-sm btn-info">Edit</a>
										<a href="xoa.php?id=<?php  echo $tintuc["id"]; ?>" onclick="return confirm('Bạn có chắc chắc muốn xóa không?.')" class="btn btn-sm btn-danger">Remove</a>

									</td>
								</tr>
							<?php } ?>
							<tr>
								<td colspan="5" class="text-center"></td>
							</tr>
						</tbody>
					</table>
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<?php include '../layout/footer.php'; ?>

		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<?php include '../layout/script.php'; ?>
</body>
</html>
