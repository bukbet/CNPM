<?php
require_once ('../../db/dbhelper.php');
    session_start();
    if (!isset($_SESSION["username"]) || $_SESSION["username"] !=="admin" )
        {     header("Location:../../index.php");
            // header("Location:index.php");
        }
$id = $name  = $mk =  $status =$manv=$diachi=$sdt=$hoten= $chucvu='';
if (!empty($_POST)) {
	if (isset($_POST['taikhoan'])) {
		$name = $_POST['taikhoan'];
	}
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}

	if (isset($_POST['matkhau'])) {
		$mk = $_POST['matkhau'];
	}
	if (isset($_POST['status'])) {
		$status = $_POST['status'];
	}
	if (isset($_POST['diachi'])) {
		$diachi = $_POST['diachi'];
	}
	if (isset($_POST['manv'])) {
		$manv = $_POST['manv'];
	}
	if (isset($_POST['sdt'])) {
		$sdt = $_POST['sdt'];
	}
	if (isset($_POST['hoten'])) {
		$hoten = $_POST['hoten'];
	}
	if (isset($_POST['chucvu'])) {
		$chucvu = $_POST['chucvu'];
	}

	if (!empty($name)) {
		//Luu vao database
		if ($id == '') {
			   $sql = 'insert into login(taikhoan, matkhau,hoten,status,manv,diachi,sdt,chucvu) values("'.$name.'", "'.$mk.'","'.$hoten.'","'.$status.'","'.$manv.'","'.$diachi.'","'.$sdt.'","'.$chucvu.'")';
		}
		 else {
			$sql = 'update login set taikhoan = "'.$name.'", matkhau = "'.$mk.'",hoten="'.$hoten.'",status= "'.$status.'",manv= "'.$manv.'",diachi= "'.$diachi.'",sdt= "'.$sdt.'",chucvu="'.$chucvu.'" where id = '.$id;
		}

		execute($sql);

		header('Location: index.php');
		die();
	}
}

if (isset($_GET['id'])) {
	$id       = $_GET['id']; 
	$sql      = 'select * from login where id = '.$id;
	$login = executeSingleResult($sql);
	if ($login != null) {
		$name = $login['taikhoan'];
		$mk = $login['matkhau'];
		$status=$login['status'];
		$manv=$login['manv'];
		$diachi=$login['diachi'];
		$sdt=$login['sdt'];
		$hoten=$login['hoten'];
		$chucvu=$login['chucvu'];
	}
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Tài Khoản</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<ul class="nav nav-tabs">
	  <li class="nav-item">
	    <a class="nav-link" href="index.php">Quản Lý Tài Khoản</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../Post/">Quản Lý Phòng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../khachhang/">Quản Lý Khách Hàng</a>
	  </li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Tài Khoản</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="taikhoan">Tên Tài Khoản:</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">

					  <input required="true" type="text" class="form-control" id="taikhoan" name="taikhoan" 
					  value="<?=$name?>" >

					</div>
					<div class="form-group">
					  <label for="matkhau">Đặt Mật Khẩu:</label>
					  
					  <input required="true" type="text" class="form-control" id="matkhau" name="matkhau" value="<?=$mk?>" >
					</div>
					<div class="form-group">
					  <label for="hoten">Họ và Tên:</label>
					  
					  <input required="true" type="text" class="form-control" id="hoten" name="hoten" value="<?=$hoten?>" >
					</div>
					<div class="form-group">
					  <label for="status">Status:</label>
					  
					  <input required="true" type="text" class="form-control" id="status" name="status" value="<?=$status?>" >
					</div>
					<div class="form-group">
					  <label for="manv">Mã nhân viên:</label>
					  
					  <input required="true" type="int" class="form-control" id="manv" name="manv" value="<?=$manv?>" >
					</div>
					<div class="form-group">
					  <label for="diachi">Địa chỉ:</label>
					  
					  <input required="true" type="text" class="form-control" id="diachi" name="diachi" value="<?=$diachi?>" >
					</div>
					<div class="form-group">
					  <label for="sdt">SĐT:</label>
					  
					  <input required="true" type="int" class="form-control" id="sdt" name="sdt" value="<?=$sdt?>" >
					</div>
					<div class="form-group">
					  <label for="chucvu">Chức vụ:</label>
					  
					  <input required="true" type="text" class="form-control" id="chucvu" name="chucvu" value="<?=$chucvu?>" >
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>