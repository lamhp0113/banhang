<?php 
require_once "../db.php";

include("class.smtp.php");
include("class.phpmailer.php"); 
session_start();
if (isset($_POST['order'])) { 	 
	$cart=empty($_SESSION["cart-add"])?[]:$_SESSION["cart-add"];
	$ten=$_POST['ten'];
	$email=$_POST['email'];
	$diachi=$_POST['diachi'];
	$sdt=$_POST['sdt'];
	$tinhtong=$_POST['tinhtong'];
		// don hang 
	$sql="INSERT INTO `don_hangs` (`ten_khach_hang`,`email`,`so_dien_thoai`, `dia_chi`, `Trang_Thai`, `tong_tien`) VALUES ('$ten','$email','$sdt','$diachi',1,'$tinhtong')";
	$don_hang = mysqli_query($conn,$sql);
	$donhang_id = $conn->insert_id;	
	foreach ($cart as $value) {
		$id=$value['id'];
		$sl=$value['sl'];
		$tong =  $value["gia"]*$value["sl"];
		$order_detail="INSERT INTO `chi_tiet_don_hangs`( `id_hang_hoa`,`gia`, `so_luong`, `id_Don_hang`) VALUES ('$id','$tong','$sl','$donhang_id')";
		echo $order_detail;
		$ketqua_detail=mysqli_query($conn,$order_detail);
	}

 	// $nFrom = "lamhp0115@gmail.com";    //mail duoc gui tu dau, thuong de ten cong ty ban
  //   $mFrom = 'lamhp0115@gmail.com';  //dia chi email cua ban 
  //   $mPass = 'lamdaica1';       //mat khau email cua ban
  //   $nTo = 'Tiep Nguyen'; //Ten nguoi nhan
  //   $mTo = 'nguyenanhtiep@gmail.com';   //dia chi nhan mail
  //   $mail             = new PHPMailer();
  //   $body             = 'Bạn đang tìm hiểu về cách gửi email bằng php mailler trên freetuts.net chúc các bạn có         những phút giây vui vẻ.';   // Noi dung email
  //   $title = 'Hướng dẫn gửi mail bằng PHPMailer';   //Tieu de gui mail
  //   $mail->IsSMTP();             
  //   $mail->CharSet  = "utf-8";
  //   $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
  //   $mail->SMTPAuth   = true;    // enable SMTP authentication
  //   $mail->SMTPSecure = "ssl";   // sets the prefix to the servier
  //   $mail->Host       = "smtp.gmail.com";    // sever gui mail.
  //   $mail->Port       = 465;         // cong gui mail de nguyen
  //   // xong phan cau hinh bat dau phan gui mail
  //   $mail->Username   = $mFrom;  // khai bao dia chi email
  //   $mail->Password   = $mPass;              // khai bao mat khau
  //   $mail->SetFrom($mFrom, $nFrom);
  //   $mail->AddReplyTo('lamhp0113@gmail.com', 'Freetuts.net'); //khi nguoi dung phan hoi se duoc gui den email nay
  //   $mail->Subject    = $title;// tieu de email 
  //   $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.
  //   $mail->AddAddress($mTo, $nTo);
  //   // thuc thi lenh gui mail 
  //   if(!$mail->Send()) {
  //   	echo 'Co loi!';

  //   } else {

  //   	echo 'mail của bạn đã được gửi đi hãy kiếm tra hộp thư đến để xem kết quả. ';
  //   }
    unset($_SESSION["cart-add"]);
	header("location:trangchu.php");
}
?>
