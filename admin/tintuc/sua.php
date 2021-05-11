<?php
require_once "../../db.php";


if (isset($_GET["id"])) {
  $id	= $_GET["id"];



     // truy van id va in ra value form
  $sql= " SELECT * FROM tintuc WHERE id=$id";
  $truyvan=mysqli_query ($conn,$sql);
  $in1 = mysqli_fetch_array($truyvan);



  if (isset($_POST['sua'])) {
   $tieude = $_POST["tieude"];
   $noidung = $_POST["noidung"];
   $mota = $_POST["mota"];
   $hinh = $_FILES['hinhanh'];
        $path ="../../public/uploads/"; // Ảnh sẽ lưu vào thư mục images
        $tmp_name = $_FILES['hinhanh']['tmp_name'];
        $name = $_FILES['hinhanh']['name'];
        $img_url = $path . $name;
        move_uploaded_file($tmp_name, $img_url);
        $img_url2 = "public/uploads/".$name; //
        $image_url = $path . $name;
        $sql = "UPDATE `tintuc` SET 
        `tieude`='$tieude',`noidung`='$noidung',`mota`='$mota',`hinhanh`='$img_url2' WHERE id=$id";

        $in2 = mysqli_query($conn, $sql);
        
        header('location:list-tintuc.php');
      };
    };
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>AdminLTE 3 | Dashboard</title>

      <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <?php include '../layout/script.php'; ?>
      <script>
        tinymce.init({
          selector: '#mytextarea'
        });
      </script>
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
                      <label>Tiêu đề</label>
                      <input type="text" class="form-control"  style="width:30%" value="<?php  echo $in1["tieude"]; ?>" name="tieude">

                      <label>Nội dung</label>

                      <input type="text" class="form-control" style="width:30%" value="<?php  echo $in1["noidung"]; ?>" name="noidung">
                      <br>
                      <label>Mô tả</label>


                      <textarea id="mytextarea" name="mota" style="width:30%"><?php echo ($in1['mota']) ?></textarea>
                      <br>
                      <label>Hình ảnh</label>

                      <input type="file" name="hinhanh"  alt="" >

                      <img src="../../<?php echo($in1['hinhanh'])?>" width="50px" alt="">
                      <br>


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
        </aside>

      </div>
    </body>

    </html>