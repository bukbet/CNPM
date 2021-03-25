<?php
require_once ('../../db/dbhelper.php');
    session_start();
    if (!isset($_SESSION["username"]) || $_SESSION["username"] !=="admin" )
        {     header("Location:../../index.php");
            // header("Location:index.php");
        }
// require_once ('../../common/utility.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Khách Hàng</title>
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
	    <a class="nav-link" href="../account/">Quản Lý Tài Khoản</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link active" href="../Post">Quản Lý Phòng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link active" href="#">Quản Lý Khách Hàng</a>
	  </li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Quản Lý Khách Hàng</h2>
			</div>
			<div class="panel-body">
				<a href="add.php">
					<button class="btn btn-success" style="margin-bottom: 15px;">Thêm khách</button>
				</a>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th>Tên Khách</th>
							<th>Địa Chỉ</th>
							<th>SĐT</th>
							<th>Ngày Thuê</th>
							<th>Giờ thuê</th>
							<th>Phòng thuê</th>
							<th width="50px"></th>
							<th width="50px"></th>
						</tr>
					</thead>
					<tbody>
<?php
//Lay danh sach tai khoan tu database
$sql          = 'select * from khach';
$loginList = executeResult($sql);

$index = 1;
foreach ($loginList as $item) {
	echo '<tr>
				<td>'.($index++).'</td>
				<td>'.$item['hoten'].'</td>
				<td>'.$item['diachi'].'</td>
				<td>'.$item['sdt'].'</td>
				<td>'.$item['date'].'</td>
				<td>'.$item['time'].'</td>
				<td>'.$item['room'].'</td>
			
				<td>
					<a href="add.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
				</td>
				<td>
					<button class="btn btn-danger" onclick="deleteCategory('.$item['id'].')">Xoá</button>
				</td>
			</tr>';
}
?>
					</tbody>
				</table>
			</div>
		</div>
	</div>



	<script type="text/javascript">
		function deleteCategory(id) {
			var option = confirm('Bạn có chắc chắn muốn xoá danh mục này không?')
			if(!option) {
				return;
			}

			console.log(id)
			//ajax - lenh post
			$.post('ajax.php', {
				'id': id,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>

	
</body>
</html>