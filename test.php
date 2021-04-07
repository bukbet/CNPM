<?php
require_once ('db/dbhelper.php');
    session_start();
    if (!isset($_SESSION["username"])|| $_SESSION["username"] !=="admin" )
        {			header("Location: ../../index.php");
        		// header("Location:index.php");
        }
        // else{

        // }

	
	$cond = "";
	if (isset ($_POST['thongke'])){
		if ($_POST ['thoigian'] != null){
		$thoigian = $_POST['thoigian'];
		//$cond = "where ";
		$cond = " where thoigian = '{$thoigian}' ";

		$sql = "select sum(giatien)as doanhthu from hoadon {$cond} ";
		
		$rs = executeSingleResult($sql);
		
		
		}
	}
	if (isset ($_POST['thongketheothang'])){
		if ($_POST ['thoigian'] != null){
		$thoigian = explode('-',$_POST['thoigian']);
		//$cond = "where ";
		
		$cond = " where month(thoigian) = '$thoigian[1]' and year(thoigian) = '$thoigian[0]' ";
		
		$sql = "select sum(giatien)as doanhthu from hoadon {$cond} ";

		
		
		$rs1 = executeSingleResult($sql);
		
		}
	}
	if (isset ($_POST['thongketheonam'])){
		if ($_POST ['thoigian'] != null){
		$thoigian =$_POST['thoigian'];
		//$cond = "where ";
		
		$cond = " where year(thoigian) = $thoigian ";
		
		$sql = "select sum(giatien)as doanhthu from hoadon {$cond} ";

		
		
		$rs2 = executeSingleResult($sql);
		
		}
	}
		
	
	

	
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thống kê doanh thu</title>
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
	    <a class="nav-link " href="admin/Account/">Quản Lý Tài Khoản</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="admin/Post/">Quản Lý Phòng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="admin/khachhang">Quản Lý Khách Hàng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link active" href="#">Doanh thu</a>
	  </li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Doanh Thu</h2>
			</div>
			<div class="panel-body">
			<label><h5>Thống kê theo ngày giờ cụ thể:</h5></label>
			<div class="clear-both"></div>
			<form method ="post" action ="">
				<input type="datetime-local" step="1" name="thoigian" value=""/>
				<input type ="submit" name = "thongke" value ="Thống kê">
				
			</form> 
			<label><h5>Thống kê theo tháng cụ thể:</h5></label>
			<div class="clear-both"></div>
			<form method ="post" action ="">
				<input type="month" name="thoigian" value=""/>
				<input type ="submit" name = "thongketheothang" value ="Thống kê">
				
			</form>
			<label><h5>Thống kê theo năm cụ thể:</h5></label>
			<div class="clear-both"></div>
			<form method ="post" action ="">
				<input type="text" name="thoigian" value=""/>
				<input type ="submit" name = "thongketheonam" value ="Thống kê">
				
			</form>
			
		
			
			<div class="clear-both"></div>
			 
             <?php if(isset ($rs) && $rs != NULL)
				       echo "Doanh thu của ngày " . date_format(date_create($_POST['thoigian']),'d/m/Y')." vào lúc ".date_format(date_create($_POST['thoigian']),'H:i:s') ." là : ". $rs['doanhthu']. " VNĐ";
				   if(isset ($rs1) && $rs1 != NULL)
					   echo "Doanh thu tháng ". date_format(date_create($_POST['thoigian']),'m/Y')." là ". $rs1['doanhthu']." VNĐ";
				   if(isset ($rs2) && $rs2 != NULL)
					   echo "Doanh thu của năm ".$_POST['thoigian']." là ". $rs2['doanhthu']." VNĐ";
				?>

            

	
</body>
</html>