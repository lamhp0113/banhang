<?php 
require_once "../../db.php";


if (isset($_POST['them'])) {

  $ten=$_POST["ten"];




   $sql = "INSERT INTO loai_hang_hoas (Ten_loai) VALUES('$ten')";
    $in = mysqli_query($conn,$sql);
    
    header("location: list-loai.php");
}

    
   
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
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <form action="them.php" method="POST">
            <tbody>
              <h3>THÊM LOẠI HÀNG</h3>
              <tr>
            <label>Tên loại</label>
                <th><input type="text" placeholder ="nhap ten loại" name="ten"></th>
               <th><input type="submit" name="them" value="them"></th>

              </tr>
      
            </tbody>
          </form>
          </table>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
     <?php include '../layout/footer.php'; ?>


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
