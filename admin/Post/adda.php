<?php
require_once ('../../db/dbhelper.php');


$id =  $title = $price = $thumbnail = $content = $status = '';
if (!empty($_POST)) {
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}	
	if (isset($_POST['tenbai'])) {
			$title = $_POST['tenbai'];
			$title = str_replace('"', '\\"', $title);
		}
	if (isset($_POST['giatien'])) {
		$price = $_POST['giatien'];
		$price = str_replace('"', '\\"', $price);
	}
	if (isset($_POST['thumbnail'])) {
		$thumbnail = $_POST['thumbnail'];
		$thumbnail = str_replace('"', '\\"', $thumbnail);
	}
	if (isset($_POST['noidung'])) {
		$content = $_POST['noidung'];
		$content = str_replace('"', '\\"', $content);
	}
		if (isset($_POST['trangthai'])) {
		$status = $_POST['trangthai'];
		$status = str_replace('"', '\\"', $status);
	}

	if (!empty($title)) {
		$created_at = date('Y-m-d H:s:i');
		//Luu vao database
		if ($id == '') {
			$sql = 'insert into post(tenbai, thumbnail, noidung, ngaydang, giatien, trangthai) values ("'.$title.'", "'.$thumbnail.'", "'.$content.'", "'.$created_at.'",  "'.$price.'", "'.$status.'")';
		} else {
			$sql = 'update post set tenbai = "'.$title.'", thumbnail = "'.$thumbnail.'", noidung = "'.$content.'", giatien = "'.$price.'", trangthai = "'.$status.'" where id = '.$id;
		}

		// execute($sql);
		echo($sql);
		exit();


		header('Location: index.php');
		die();
	}
}

if (isset($_GET['id'])) {
	$id      = $_GET['id'];
	$sql     = 'select * from post where id = '.$id;
	$post = executeSingleResult($sql);
	if ($post != null) {
		$title       = $post['tenbai'];
		$price       = $post['giatien'];
		$thumbnail   = $post['thumbnail'];
		$status 	 = $post['trangthai'];
		$content     = $post['noidung'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Bài Đăng</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<!-- summernote -->
	<!-- include summernote css/js -->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>
<body>
	<ul class="nav nav-tabs">
	  <li class="nav-item">
	    <a class="nav-link" href="../account/">Quản Lý Tài Khoản</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="index.php">Quản Lý Bài Đăng</a>
	  </li>
	</ul>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Bài Đăng</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="tenbai">Tên :</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="tenbai" name="tenbai" value="<?=$title?>">
					</div>


					<div class="form-group">
					  <label for="thumbnail">Thumbnail:</label>
					  <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?=$thumbnail?>" onchange="updateThumbnail()">
					  <img src="<?=$thumbnail?>" style="max-width: 200px" id="img_thumbnail">
					</div>

					
					<div class="form-group">
					  <label for="giatien">Giá :</label>
					  <input required="true" type="number" class="form-control" id="giatien" name="giatien" value="<?=$price?>">
					</div>


					  <div class="form-group">
					  <label for="trangthai">Trạng Thái:</label>
					  <select class="form-control" name="trangthai" id="trangthai">
					 
					
					  	<option  value=1 selected>Còn phòng</option>
					  	<option  value=0 <?php if( $status!="" && $status==0) echo "selected"?>>Hết phòng</option>	 
					  	 </select>
					</div>

				

					<div class="form-group">
					  <label for="noidung">Nội Dung:</label>
					  <textarea class="form-control" rows="5" name="noidung" id="noidung"><?=$content?></textarea>
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function updateThumbnail() {
			$('#img_thumbnail').attr('src', $('#thumbnail').val())
		}

		$(function() {
			//doi website load noi dung => xu ly phan js
			$('#noidung').summernote({
			  height: 250
			});
		})
	</script>
</body>
</html>