<?php 

require '../../db.php';
?>
<?php 
if (isset($_GET["id"])) {
	$id	= $_GET["id"];
	# code...
}

$sql= " DELETE  FROM loai_hang_hoas WHERE id= $id ";
$xoa = mysqli_query($conn,$sql);
if($xoa){
header("location:list-loai.php");

}else{
	echo "Không thể xóa loại sản phẩm";
	header( "refresh:4;url=list-loai.php" );
}

// header("location:list-loai.php");


?>