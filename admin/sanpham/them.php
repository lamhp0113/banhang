      <?php
      require_once "../../db.php";



      $qr = "SELECT *FROM loai_hang_hoas";
      $result = mysqli_query($conn, $qr);

      if (isset($_POST['themhang'])) {
       

        $ten = $_POST["ten"];
        $masp = $_POST["masp"];

      
        $gia = $_POST["gia"];
        $soluong = $_POST["soluong"];
        $hinh = $_FILES['hinh'];
        $path ="../../public/uploads/"; // Ảnh sẽ lưu vào thư mục images
        $tmp_name = $_FILES['hinh']['tmp_name'];
        $name = $_FILES['hinh']['name'];
        $img_url = $path . $name;
        move_uploaded_file($tmp_name, $img_url);
        $img_url2 = "public/uploads/".$name; //
        $image_url = $path . $name;
        $idloaisanpham = $_POST["loaihang"];




        $sql = "INSERT INTO `hang_hoas`(`Ten_hang_hoa`,`ma_code`, `gia`, `so_luong_hang`, `hinh`, `id_loai`, `lvproduct`) VALUES ('$ten','$masp','$gia','$soluong','$img_url2',$idloaisanpham,'2')";
        $in = mysqli_query($conn, $sql);
        header('location:list-sanpham.php');
      }
      ?>
      <script>
        function validate() {
              if (document.myForm.masp.value == "") /*goi ra dư lại sau value điều kiên thoải mãn*/ {
            alert("chua nhập masp!");
            return false;
          }
          if (document.myForm.ten.value == "") /*goi ra dư lại sau value điều kiên thoải mãn*/ {
            alert("chua nhập tên!");
            return false;
          }
     
          if (document.myForm.gia.value.length < 6) {
            alert("chua nhap giá trên 6 ky tự");
            return false;
          }

          if (document.myForm.soluong.value == "") {
            alert("chua nhap soluong");
            return false;
          }

          var fuData = document.myForm.hinh;
          var FileUploadPath = fuData.value;
          if (FileUploadPath == '') {
            alert("Thêm ảnh vào");
            return false;
          } else {
            var Extension = FileUploadPath.substring(
              FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
            if (Extension !== "gif" && Extension !== "png" && Extension !== "bmp" &&
              Extension !== "jpeg" && Extension !== "jpg") {
              alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
              return false
            }
          }

          alert('Dữ liệu hợp lệ, ta có thể chấp nhận submit form');
          return (true);
        }
      </script>

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
                  <form action="them.php" name="myForm" onsubmit="return validate()" method="POST" enctype="multipart/form-data">
                    <tbody>



                      <h3>THÊM LOẠI HÀNG</h3>
                      <tr>
                        <label>Tên loại hàng</label>
                        <input type="text" class="form-control" style="width:30%" placeholder="nhap ten loại" name="ten">
                              <label>Ma sp</label>
                        <input type="text" class="form-control" style="width:30%" placeholder="nhap masp" name="masp">

                        <label>Gía</label>

                        <input type="number" class="form-control" style="width:30%" placeholder="nhap ten loại" name="gia">
                        <br>
                        <label>Số lượng</label>

                        <input type="text" class="form-control" style="width:30%" placeholder="nhap số lượng hàng" name="soluong">
                        <br>
                        <label>Hình ảnh</label>

                        <input type="file" name="hinh">
                        <br>
                        <label>loại hàng hóa</label>

                        <select name="loaihang" id="">
                          <?php foreach ($result as $loaihang) { ?>
                            <option value="<?php echo ($loaihang['id']) ?>"><?php echo ($loaihang['Ten_loai']) ?></option>
                          <?php } ?>
                        </select>
                        <br>
                        <input type="submit" class="btn btn-primary" name="themhang" value="them">

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