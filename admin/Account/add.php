<?php
require_once ('../../db/dbhelper.php');
    session_start();
    if (!isset($_SESSION["username"]) || $_SESSION["username"] !=="admin" )
        {     header("Location:../../index.php");
            // header("Location:index.php");
        }
$id = $name  = $mk =  $status =$manv=$diachi=$sdt= '';
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

	if (!empty($name)) {
		//Luu vao database
		if ($id == '') {
			   $sql = 'insert into login(taikhoan, matkhau,status,manv,diachi,sdt) values("'.$name.'", "'.$mk.'","'.$status.'","'.$manv.'","'.$diachi.'","'.$sdt.'")';
		}
		 else {
			$sql = 'update login set taikhoan = "'.$name.'", matkhau = "'.$mk.'",status= "'.$status.'",manv= "'.$manv.'",diachi= "'.$diachi.'",sdt= "'.$sdt.'" where id = '.$id;
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
	    <a class="nav-link" href="../Post/">Quản Lý Bài Đăng</a>
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
					  <label for="status">Status:</label>
					  
					  <input required="true" type="text" class="form-control" id="status" name="status" value="<?=$status?>" >
					</div>
					<div class="form-group">
					  <label for="status">Mã nhân viên:</label>
					  
					  <input required="true" type="text" class="form-control" id="manv" name="manv" value="<?=$manv?>" >
					</div>
					<div class="form-group">
					  <label for="status">Địa chỉ:</label>
					  
					  <input required="true" type="text" class="form-control" id="diachi" name="diachi" value="<?=$diachi?>" >
					</div>
					<div class="form-group">
					  <label for="status">SĐT:</label>
					  
					  <input required="true" type="text" class="form-control" id="sdt" name="sdt" value="<?=$sdt?>" >
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>