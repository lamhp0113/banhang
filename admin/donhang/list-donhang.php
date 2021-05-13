<?php 
require_once "../../db.php";

$qr = "SELECT *FROM don_hangs";
$result = mysqli_query($conn,$qr);

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



    <?php include '../layout/sidebar.php'  ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Đơn hàng</h1>
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
                <th>Tên khach hang</th>
                <th>email</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th>Ngày Đặt Hàng</th>
                <th>Trạng Thái</th>

                




             <!--    <th>
                  <a href="add-new2" class="btn btn-sm btn-success">Add</a>
                </th> -->
              </tr>
              <?php foreach ($result as $dh ) {
             # code...
                ?>
                <tr>
                  <td><?php echo($dh['id']) ?></td>
                  <td><?php echo($dh['ten_khach_hang']) ?></td>
                    <td><?php echo($dh['email']) ?></td> 
                  <td><?php echo($dh['so_dien_thoai']) ?></td>
                  <td><?php echo($dh['dia_chi']) ?></td>
                  <td><?php echo($dh['Ngay_Dat_Hang']) ?></td>
                  <td><?php echo($dh['Trang_Thai']==1?'chưa xử lý':'đã xử lý') ?></td>
                  <td>
                    <a href="donhang.php?id=<?php  echo $dh["id"]; ?>"  class="btn btn-sm btn-danger">Xem</a>
                    <a href="xoa.php?id=<?php  echo $dh["id"]; ?>" onclick="return confirm('Bạn có chắc chắc muốn xóa không?.')"  class="btn btn-sm btn-dark"> Xóa  </a>
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
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
      </div>
    </footer>

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
