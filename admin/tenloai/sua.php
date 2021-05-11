<?php
require_once "../../db.php";
if (isset($_GET["id"])) {
    $id    = $_GET["id"];
    $sql = " SELECT * FROM loai_hang_hoas WHERE id=$id";
    $truyvan = mysqli_query($conn, $sql);
    $in1 = mysqli_fetch_array($truyvan);
    //in value cua id
    if (isset($_POST['sua'])) {
        $ten = $_POST["ten"];
        $sql = "UPDATE loai_hang_hoas Set Ten_loai='$ten' WHERE id=$id ";
        $in2 = mysqli_query($conn, $sql);
        header("location:list-loai.php");
    };
}
?>
<script>
    function validate() {
        if (document.myForm.ten.value == "") {
            alert("chua nhập tên!");
            return false;
        }
        return true;
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
                        <form action="sua.php?id=<?php echo $in1["id"]; ?>" onsubmit="return validate()" name="myForm" method="POST">
                            <tbody>
                                <h3>Sửa LOẠI HÀNG</h3>
                                <tr>
                                    <label>Tên loại</label>
                                    <th><input type="text" value="<?php echo $in1["Ten_loai"]; ?>" name="ten"></th>
                                    <th><input type="submit" name="sua" value="sua"></th>

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