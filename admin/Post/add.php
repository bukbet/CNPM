<?php
require_once ('../../db/dbhelper.php');	
			
    session_start();
    if (!isset($_SESSION["username"]) || $_SESSION["username"] !=="admin" )
        {     header("Location:../../index.php");
            // header("Location:index.php");
        }

$id =  $title = $price = $thumbnail  = $status =  $SDT = $mota = $diachi = '';
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
	if (isset($_POST['ngaydang'])) {
		$created_at = $_POST['ngaydang'];
		$created_at = str_replace('"', '\\"', $created_at);
	}
	if (isset($_POST['thumbnail'])) {
		$thumbnail = $_POST['thumbnail'];
		$thumbnail = str_replace('"', '\\"', $thumbnail);
	}
	
		if (isset($_POST['trangthai'])) {
		$status = $_POST['trangthai'];
		$status = str_replace('"', '\\"', $status);
	}
	if (isset($_POST['sdt'])) {
		$sdt = $_POST['sdt'];
		$sdt = str_replace('"', '\\"', $sdt);
	}
	if (isset($_POST['id_user'])) {
		$id_user = $_POST['id_user'];
		$id_user = str_replace('"', '\\"', $id_user);
	}
	
	
	

	$r = mysqli_query($con, "select * from login where taikhoan ='" .$_SESSION['username']."'");
    $id_user = "";
    while ($row = mysqli_fetch_array($r)) 
    {
      $id_user = $row["id"];
    } 


	if (!empty($title)) {
		$created_at = date('Y-m-d H:s:i');
		//Luu vao database
		if ( (!isset($_GET['id'])) && $id == '') {

			$sql = 'insert into post(tenbai, thumbnail, ngaydang, giatien, trangthai,   SDT,  id_user) values("'.$title.'", "'.$thumbnail.'",  "'.$created_at.'", "'.$price.'", "'.$status.'","'.$sdt.'","'.$id_user.'")';
		} else {
			$id      = $_GET['id'];
			$sq     = 'select * from post where id = '.$id;
			$post = executeSingleResult($sq);
			$sql = 'update post set tenbai = "'.$title.'", thumbnail = "'.$thumbnail.'",  ngaydang = "'.$created_at.'", giatien = "'.$price.'", trangthai = "'.$status.'",sdt="'.$sdt.'" ,id_user = "'.$id_user.'" where id = '.$id;
		}

		 execute($sql);


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
		$created_at  = $post['ngaydang'];
		$thumbnail   = $post['thumbnail'];
		$status 	 = $post['trangthai'];
		$sdt 	 = $post['sdt'];
		$id_user 	 = $post['id_user'];
		
		
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Phòng</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	         <link rel="stylesheet" type="text/css" href="add.css">

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
	    <a class="nav-link" href="index.php">Quản Lý Phòng</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="../khachhang/">Quản Lý Khách Hàng</a>
	  </li>
	</ul>

	

				<h2 class="text-center">Thêm/Sửa Phòng</h2>


	<div class="container">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <div id="info">


              <div>
           
            <hr> 
            <label for="title_r" style="color: #a52a2a; font-size:22px; margin-left:-10px ; ">Tên bài đăng</label>
            <input type="text" style="margin-left: 80px;" name="tenbai" id="tenbai" maxlength="500" value="<?=$title?>">
          </div>
            <hr>



            
            <hr>

          <h2>Trạng Thái</h2>
            <div class="row">
              <label for="room_price" class="col-4">Tình Trạng phòng</label>
              <select class="form-control" style="width: 200px; " name="trangthai" id="trangthai">					  	
              	<option  value=1 selected>Còn phòng</option>
					  	<option  value=0 <?php if( $status!="" && $status==0) echo "selected"?>>Hết phòng</option>	 
					  	 </select>
            </div>

            <hr>

            <h2>Chi phí</h2>
            <div class="row">
              <label for="room_price" class="col-4">Giá cho thuê</label>
              <input style="width: 200px;" type="number" name="giatien" id="giatien" min="0" value="<?=$price?>">
              VND/phòng
            </div>
            
           <hr>

         
          <div style="margin-left:0px;" id="contact">
          <h2>Thông tin khác</h2>
          <div>
            <label for="phone_number">Số điện thoại liên hệ</label>
            <input type="number" name="SDT" id="SDT" min="0" maxlength="20" value="<?=$SDT?>">
          </div>

          <div>
            <label for="description">Mô tả</label>
            <textarea id="mota" name="mota" rows="10" cols="50" maxlength="4000" ><?=$mota?></textarea>
          </div>




        </div>



          </div>

          
        </div>

        <!-- address -->
        

        
          
         <div class="form-group">
					  <label for="thumbnail">Thumbnail:</label>
					  
					  <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?=$thumbnail?>" onchange="updateThumbnail()">
					  <img src="<?=$thumbnail?>" style="max-width: 200px" id="img_thumbnail">

           <hr>
            
		</div>

   
        	<button class="btn btn-success">Lưu</button>

    </form>
    </div>

  </div>
					</div>
				
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