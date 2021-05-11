  <?php
      require_once "../../db.php";


      if (isset($_GET["id"])) {
        $id	= $_GET["id"];
       

    // truy van id va in ra value form
      $sql= " SELECT * FROM hang_hoas WHERE id=$id";
       $truyvan=mysqli_query ($conn,$sql);
       $in1 = mysqli_fetch_array($truyvan);


      $qr = "SELECT *FROM loai_hang_hoas";
      $result = mysqli_query($conn, $qr);

      if (isset($_POST['sua'])) {

        $ten = $_POST["ten"];
        $gia = $_POST["gia"];
        $soluong = $_POST["soluong"];
        $hinh = $_FILES['hinh'];

        $path = "../../public/uploads/"; // Ảnh sẽ lưu vào thư mục images
        $tmp_name = $_FILES['hinh']['tmp_name'];
        $name = $_FILES['hinh']['name'];
        $img_url = $path . $name;
        $img_url2 = "public/uploads/" . $name; //        
        move_uploaded_file($tmp_name, $img_url);
        $image_url = $path . $name;
        $idloaisanpham = $_POST["loaihang"];
        $sql = "UPDATE `hang_hoas` SET 
        `Ten_hang_hoa`='$ten',`gia`='$gia',`so_luong_hang`='$soluong',`hinh`='$img_url2',`id_loai`=$idloaisanpham WHERE id=$id";
      
        $in2 = mysqli_query($conn, $sql);
        
         header('location:list-sanpham.php');
      };
    };
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


          <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
          </div>

          <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
              <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
              <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                  <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                  <a href="#" class="d-block">Alexander Pierce</a>
                </div>
              </div>
              <!-- SidebarSearch Form -->
              <?php include '../layout/sidebar.php'; ?>
              <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
          </aside>

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
                  <form action="sua.php?id=<?php echo $in1["id"]; ?>  " method="POST" enctype="multipart/form-data">
                    <tbody>



                      <h3>Sửa</h3>
                      <tr>
                        <label>Tên loại hàng</label>
                        <input type="text" class="form-control"  style="width:30%" value="<?php  echo $in1["Ten_hang_hoa"]; ?>" name="ten">

                        <label>Gía</label>

                        <input type="number" class="form-control" style="width:30%" value="<?php  echo $in1["gia"]; ?>" name="gia">
                        <br>
                        <label>Số lượng</label>

                        <input type="text" class="form-control" style="width:30%" value="<?php  echo $in1["so_luong_hang"]; ?>" name="soluong">
                        <br>
                        <label>Hình ảnh</label>

                        <input  type="file" name="hinh" value="../../<?php echo ($in1['hinh'])?>"  alt="" >
                        <img src="../../<?php echo ($in1['hinh']) ?>" width="50px" alt="">
                        <br>
                        <label>loại hàng hóa</label>

                        <select name="loaihang" id="">
                          <?php while ($loaihang= mysqli_fetch_array($result)) {
                          ?>
                     
                            <option value="<?php echo ($loaihang['id']) ?>"><?php echo ($loaihang['Ten_loai']) ?></option>
                          <?php } ?>
                        </select>
                        <br>
                        <input type="submit" class="btn btn-primary" name="sua" value="sua">

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