<?php
require_once ('../../db/dbhelper.php');
    session_start();
    if (!isset($_SESSION["username"]) || $_SESSION["username"] !=="admin" )
        {     header("Location:../../index.php");
            // header("Location:index.php");
        }
$IDHD = $thoigian  = $Idp=$Idk=$giatien='';
if (!empty($_POST)) {
	
	if (isset($_POST['IDHD'])) {
		$IDHD = $_POST['IDHD'];
	}

	if (isset($_POST['thoigian'])) {
		$thoigian = $_POST['thoigian'];
	}
	if (isset($_POST['Idp'])) {
		$Idp = $_POST['Idp'];
	}
	if (isset($_POST['Idk'])) {
		$Idk = $_POST['Idk'];
	}
	if (isset($_POST['giatien'])) {
		$giatien = $_POST['giatien'];
	}
	if (!empty($giatien)) {
		//Luu vao database
		if ($IDHD == '') {
			   $sql = 'insert into hoadon( thoigian,giatien,Idp,Idk) values("'.$thoigian.'","'.$giatien.'","'.$Idp.'","'.$Idk.'")';
			  
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
		
		$thoigian = $khach['date'];
		$Idk=$khach['id'];
	}
}
if (isset($_GET['id'])) {
	$id       = $_GET['id']; 
	$sql      = 'select * from post where id = '.$id;
	$post = executeSingleResult($sql);
	if ($post != null) {
		$Idp=$post['id'];
	}
}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Thanh toán</title>
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
	    <a class="nav-link active" href="../khachhang/">Quản Lý Khách Hàng</a>
	  </li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thanh toán</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					
					<div class="form-group">
					  <label for="thoigian">Thời gian thanh toán:</label>
					  
					  <input required="true" type="date" class="form-control" id="thoigian" name="thoigian" value="<?=$thoigian?>" >
					</div>
					<div class="form-group">
					  <label for="Idp">ID phòng:</label>
					  
					  <input required="true" type="text" class="form-control" id="Idp" name="Idp" value="<?=$Idp?>" >
					</div>
					<div class="form-group">
					  <label for="Idk">ID khách:</label>
					  
					  <input required="true" type="text" class="form-control" id="Idk" name="Idk" value="<?=$Idk?>" >
					</div>
					<div class="form-group">
					  <label for="giatien">Giá phòng:</label>
					  
					  <input required="true" type="text" class="form-control" id="giatien" name="giatien" value="<?=$giatien?>" >
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>