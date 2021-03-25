<?php
require_once ('../../db/dbhelper.php');
    session_start();
    if (!isset($_SESSION["username"])|| $_SESSION["username"] !=="admin" )
        {			header("Location: ../../index.php");
        		// header("Location:index.php");
        }
        // else{

        // }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Tài Khoản</title>
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
	    <a class="nav-link active" href="#">Quản Lý Tài Khoản</a>
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
				<h2 class="text-center">Quản Lý Tài Khoản</h2>
			</div>
			<div class="panel-body">
				<a href="add.php">
					<button class="btn btn-success" style="margin-bottom: 15px;">Thêm Tài Khoản</button>
				</a>
				<a href="../../logout.php">
					<button class="btn btn-warning" style="margin-left: 110vh ; margin-bottom: 15px "> Đăng Xuất </button>
				</a>

				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th>Tên Tài Khoản</th>
							<th> Mật Khẩu</th>
							<th> Họ và Tên</th>
							<th>Trạng thái</th>
							<th>Mã nhân viên</th>
							<th>Địa chỉ</th>
							<th>SĐT</th>
							<th width="50px"></th>
							<th width="50px"></th>
						</tr>
					</thead>
					<tbody>
<?php
//Lay danh sach tai khoan tu database
$sql          = 'select * from login';
$loginList = executeResult($sql);

$index = 1;
foreach ($loginList as $item) {
	echo '<tr>
				<td>'.($index++).'</td>
				<td>'.$item['taikhoan'].'</td>
				<td>'.$item['matkhau'].'</td>
				<td>'.$item['hoten'].'</td>
				<td>'.$item['status'].'</td>
				<td>'.$item['manv'].'</td>
				<td>'.$item['diachi'].'</td>
				<td>'.$item['sdt'].'</td>
				
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