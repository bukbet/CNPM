<?php
require_once ('../../db/dbhelper.php');
    session_start();
    if (!isset($_SESSION["username"]) || $_SESSION["username"] !=="admin" )
        {     header("Location:../../index.php");
            // header("Location:index.php");
        }
$id = $hoten  = $diachi = $sdt=$date=$time=$room=  '';
if (!empty($_POST)) {
	if (isset($_POST['hoten'])) {
		$hoten = $_POST['hoten'];
	}
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}

	if (isset($_POST['diachi'])) {
		$diachi = $_POST['diachi'];
	}
	if (isset($_POST['sdt'])) {
		$sdt = $_POST['sdt'];
	}
	if (isset($_POST['date'])) {
		$date = $_POST['date'];
	}
	if (isset($_POST['time'])) {
		$time = $_POST['time'];
	}
	if (isset($_POST['room'])) {
		$room = $_POST['room'];
	}
    if (isset($_POST['trangthai'])) {
		$room = $_POST['trangthai'];
	}
	
	if (!empty($hoten)) {
		//Luu vao database
		if ($id == '') {
			   $sql = 'insert into khach(hoten,diachi,sdt,date,time,room) values("'.$hoten.'", "'.$diachi.'","'.$sdt.'","'.$date.'","'.$time.'","'.$room.'")';
			   $sqlup = 'update post set trangthai="0" where id = '.$room;
		}
		 else {
			$sql = 'update khach set hoten= "'.$hoten.'", diachi = "'.$diachi.'",sdt= "'.$sdt.'",date= "'.$date.'",time= "'.$time.'",room= "'.$room.'" where id = '.$id;
		}

		execute($sql);
		execute($sqlup);
		header('Location: index.php');
		die();
	}
}

if (isset($_GET['id'])) {
	$id       = $_GET['id']; 
	$sql      = 'select * from khach where id = '.$id;
	$khach = executeSingleResult($sql);
	if ($khach != null) {
		$hoten= $khach['hoten'];
		$diachi=$khach['diachi'];
		$sdt=$khach['sdt'];
		$date=$khach['date'];
		$time=$khach['time'];
		$room=$khach['room'];
	}
}
if (isset($_GET['id'])) {
	$id       = $_GET['id']; 
	$sql      = 'select * from post where id = '.$id;
	$post = executeSingleResult($sql);
	if ($post != null) {
		$trangthai= $post['trangthai'];
	}
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Sửa Khách Hàng</title>
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
	  <ul class="nav nav-tabs">
	  <li class="nav-item">
	    <a class="nav-link active" href="index.php">Quản Lý Khách Hàng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link " href="../../test.php">Thống kê doanh thu</a>
	  </li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Sửa Khách Hàng</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="hoten">Họ và tên:</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">

					  <input required="true" type="text" class="form-control" id="hoten" name="hoten" 
					  value="<?=$hoten?>" >

					</div>
					<div class="form-group">
					  <label for="diachi">Địa Chỉ:</label>
					  
					  <input required="true" type="text" class="form-control" id="diachi" name="diachi" value="<?=$diachi?>" >
					</div>
					<div class="form-group">
					  <label for="sdt">SĐT:</label>
					  
					  <input required="true" type="text" class="form-control" id="sdt" name="sdt" value="<?=$sdt?>" >
					</div>
					<div class="form-group">
					  <label for="date">Ngày Thuê:</label>
					  
					  <input required="true" type="date" class="form-control" id="date" name="date" value="<?=$date?>" >
					</div>
					<div class="form-group">
					  <label for="time">Thời gian thuê ( Ngày ):</label>
					  
					  <input required="true" type="text" class="form-control" id="time" name="time" value="<?=$time?>" >
					</div>
					<div class="form-group">
					  <label for="room">Phòng thuê:</label>
					  
					  <input required="true" type="text" class="form-control" id="room" name="room" value="<?=$room?>" >
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>