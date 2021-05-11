<?php
require_once "../../db.php";




$sql2 ="SELECT a.id,a.Ten_hang_hoa,a.gia,a.so_luong_hang,a.hinh,b.Ten_loai FROM hang_hoas a left JOIN loai_hang_hoas b on a.id_loai=b.id";

$result2= mysqli_query($conn,$sql2);



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

    <?php include '../layout/sidebar.php' ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Danh sách sản phẩm</h1>
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
                <th>Tên hàng hóa</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Hình</th>
                <th>id_loai</th>
                <th>
                  <a href="them.php" class="btn btn-sm btn-success">Thêm mới</a>
                  
                </th>
              </tr>
              <?php foreach ($result2 as $sp) {
              ?>
                <tr>
                  <td><?php echo ($sp['id']) ?></td>
                  <td><?php echo ($sp['Ten_hang_hoa']) ?></td>
                  <td><?php echo ($sp['gia']) ?></td>
                  <td><?php echo ($sp['so_luong_hang']) ?></td>
             
                 <td><img src="../../<?php echo($sp['hinh']) ?>"  width="50px"></td>
                  <td><?php echo ($sp['Ten_loai']) ?> </td>
                  <td>

                  </td>

                  <td>
                    <a href="sua.php?id=<?php  echo $sp["id"]; ?>" class="btn btn-sm btn-info">Edit</a>
              <a href="xoa.php?id=<?php  echo $sp["id"]; ?>" onclick="return confirm('Bạn có chắc chắc muốn xóa không?.')" class="btn btn-sm btn-danger">Remove</a>
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
    <?php include '../layout/footer.php' ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <?php include '../layout/script.php'; ?>
</body>

</html>