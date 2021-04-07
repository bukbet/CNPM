<?php
require_once ('../../db/dbhelper.php');
    session_start();
    if (!isset($_SESSION["username"]) || $_SESSION["username"] !=="admin" )
        {     header("Location:../../index.php");
            // header("Location:index.php");
        }
$id = $tenbai  = $thumbnail =  $ngaydang =$giatien=$trangthai=$sdt=$mota=$id_user= '';
if (!empty($_POST)) {
	if (isset($_POST['tenbai'])) {
		$tenbai = $_POST['tenbai'];
	}
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}
	if (isset($_POST['thumbnail'])) {
		$thumbnail = $_POST['thumbnail'];
	}

	if (isset($_POST['ngaydang'])) {
		$ngaydang = $_POST['ngaydang'];
	}
	if (isset($_POST['giatien'])) {
		$giatien = $_POST['giatien'];
	}
	if (isset($_POST['trangthai'])) {
		$trangthai = $_POST['trangthai'];
	}
	if (isset($_POST['sdt'])) {
		$sdt = $_POST['sdt'];
	}
	if (isset($_POST['mota'])) {
		$mota = $_POST['mota'];
	}
	if (isset($_POST['id_user'])) {
		$id_user = $_POST['id_user'];
	}
	

	if (!empty($tenbai)) {
		//Luu vao database
		if ($id == '') {
			   $sql = 'insert into post(tenbai,thumbnail,ngaydang,giatien,trangthai,sdt,mota,id_user) values("'.$tenbai.'", "'.$thumbnail.'","'.$ngaydang.'","'.$giatien.'","'.$trangthai.'","'.$sdt.'","'.$mota.'","'.$id_user.'")';
		}
		 else {
			$sql = 'update post set tenbai = "'.$tenbai.'", thumbnail = "'.$thumbnail.'",ngaydang="'.$ngaydang.'",giatien= "'.$giatien.'",trangthai= "'.$trangthai.'",sdt= "'.$sdt.'",mota="'.$mota.'",id_user="'.$id_user.'" where id = '.$id;
		}

		execute($sql);

		header('Location: index.php');
		die();
	}
}

if (isset($_GET['id'])) {
	$id       = $_GET['id']; 
	$sql      = 'select * from post where id = '.$id;
	$post = executeSingleResult($sql);
	if ($post != null) {
		$tenbai = $post['tenbai'];
		$thumbnail = $post['thumbnail'];
		$ngaydang = $post['ngaydang'];
		$giatien = $post['giatien'];
		$trangthai = $post['trangthai'];
		$sdt = $post['sdt'];
		$mota = $post['mota'];
		$id_user = $post['id_user'];
		
	}
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Phòng</title>
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
	    <a class="nav-link active" href="../Post/">Quản Lý Phòng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../khachhang/">Quản Lý Khách Hàng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link active" href="../../test.php">Thống kê doanh thu</a>
	  </li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Phòng</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="tenbai">Tên Phòng:</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">

					  <input required="true" type="text" class="form-control" id="tenbai" name="tenbai" 
					  value="<?=$tenbai?>" >

					</div>
					<div class="form-group">
					  <label for="thumbnail">Thumbnail:</label>
					  
					  <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?=$thumbnail?>" >
					</div>
					<div class="form-group">
					  <label for="ngaydang">Ngày Đăng:</label>
					  
					  <input required="true" type="date" class="form-control" id="ngaydang" name="ngaydang" value="<?=$ngaydang?>" >
					</div>
					<div class="form-group">
					  <label for="giatien">Giá tiền:</label>
					  
					  <input required="true" type="text" class="form-control" id="giatien" name="giatien" value="<?=$giatien?>" >
					</div>
					<div class="form-group">
					  <label for="trangthai">Trạng thái:</label>
					  
					  <input required="true" type="int" class="form-control" id="trangthai" name="trangthai" value="<?=$trangthai?>" >
					</div>
					<div class="form-group">
					  <label for="sdt">SĐT</label>
					  
					  <input required="true" type="text" class="form-control" id="sdt" name="sdt" value="<?=$sdt?>" >
					</div>
					<div class="form-group">
					  <label for="mota">Mô tả:</label>
					  
					  <input required="true" type="int" class="form-control" id="mota" name="mota" value="<?=$mota?>" >
					</div>
					<div class="form-group">
					  <label for="id_user">ID Người Đăng:</label>
					  
					  <input required="true" type="int" class="form-control" id="id_user" name="id_user" value="<?=$id_user?>" >
					</div>
					
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>