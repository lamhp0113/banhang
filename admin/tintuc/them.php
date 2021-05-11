      <?php
      require_once "../../db.php";

      if (isset($_POST['them'])) {
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




        $sql = "INSERT INTO `tintuc`(`tieude`, `noidung`, `mota`, `hinhanh`) VALUES ('$tieude','$noidung','$mota','$img_url2')";
        $in = mysqli_query($conn, $sql);
        header('location:list-tintuc.php');
      }
      ?>


      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | Dashboard</title>


        <?php include  '../layout/style.php' ?>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <?php include '../layout/script.php'; ?>
        <script>
          tinymce.init({
            selector: '#mytextarea'
          });

          function validate() {
            if (document.myForm.tieude.value == "") /*goi ra dư lại sau value điều kiên thoải mãn*/ {
              alert("chua nhập tiêu đề!");
              return false;
            }

            if (document.myForm.gia.noidung.length < 6) {
              alert("chua nhập nội dung");
              return false;
            }

            if (document.myForm.mota.value == "") {
              alert("chưa nhập mô tả");
              return false;
            }

            var fuData = document.myForm.hinhanh;
            var FileUploadPath = fuData.value;
            if (FileUploadPath == '') {
              alert("Thêm ảnh vào");
              return false;
            } else {
              var Extension = FileUploadPath.substring(
                FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
              if (Extension !== "gif" && Extension !== "png" && Extension !== "bmp" &&
                Extension !== "jpeg" && Extension !== "jpg") {
                alert(" ảnh chỉ cho phép loại tệp GIF, PNG, JPG, JPEG and BMP. ");
              return false
            }
          }

          alert('Dữ liệu hợp lệ, ta có thể chấp nhận submit form');
          return (true);
        }        
      </script> 

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



                    <h3>THÊM TIN TỨC</h3>
                    <tr>
                      <label>Tiêu đề</label>
                      <input type="text" class="form-control" style="width:30%" placeholder="nhập tiêu đề" name="tieude">

                      <label>Nội dung</label>

                      <input type="text" class="form-control" style="width:30%" placeholder="nhập nội dung" name="noidung">
                      <br>
                      <label>Mô tả</label>


                      <textarea id="mytextarea" name="mota" style="width:30%"></textarea>
                      <br>
                      <label>Hình ảnh</label>

                      <input class="form-control" type="file" name="hinhanh" style="width:30%" id="formFileMultiple" multiple>
                      <br>

                      <br>
                      <input type="submit" class="btn btn-primary" name="them" value="them">

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


    </body>

    </html>