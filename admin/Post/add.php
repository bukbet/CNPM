<?php
require_once ('../../db/dbhelper.php');	
			
    session_start();
    if (!isset($_SESSION["username"]) || $_SESSION["username"] !=="admin" )
        {     header("Location:../../index.php");
            // header("Location:index.php");
        }

$id =  $title = $price = $thumbnail = $content = $status = $tienich = $dientich = $SDT = $mota = $diachi = '';
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
	if (isset($_POST['dientich'])) {
		$dientich = $_POST['dientich'];
		$dientich = str_replace('"', '\\"', $dientich);
	}
	if (isset($_POST['SDT'])) {
		$SDT = $_POST['SDT'];
		$SDT = str_replace('"', '\\"', $SDT);
	}
	if (isset($_POST['mota'])) {
		$mota = $_POST['mota'];
		$mota = str_replace('"', '\\"', $mota);
	}
	if (isset($_POST['diachi'])) {
		$diachi = $_POST['diachi'];
		$diachi = str_replace('"', '\\"', $diachi);
	}

	$r = mysqli_query($con, "select * from login where taikhoan ='" .$_SESSION['username']."'");
    $id_user = "";
    while ($row = mysqli_fetch_array($r)) 
    {
      $id_user = $row["id"];
    } 

		if(isset($_POST["tienich"]))
		{
			foreach ($_POST["tienich"] as $value) 
			{
				$tienich = $tienich . $value .", ";
			}
			$tienich = substr($tienich, 0, strlen($tienich)-2);

		}

	if (!empty($title)) {
		$created_at = date('Y-m-d H:s:i');
		//Luu vao database
		if ( (!isset($_GET['id'])) && $id == '') {

			$sql = 'insert into post(tenbai, thumbnail, noidung, ngaydang, giatien, trangthai, tienich, dientich, SDT, mota, diachi,id_user) values("'.$title.'", "'.$thumbnail.'", "'.$content.'", "'.$created_at.'", "'.$price.'", "'.$status.'", "'.$tienich.'", "'.$dientich.'", "'.$SDT.'", "'.$mota.'", "'.$diachi.'" , "'.$id_user.'")';
		} else {
			$id      = $_GET['id'];
			$sq     = 'select * from post where id = '.$id;
			$post = executeSingleResult($sq);
			$sql = 'update post set tenbai = "'.$title.'", thumbnail = "'.$thumbnail.'", noidung = "'.$content.'", ngaydang = "'.$created_at.'", giatien = "'.$price.'", trangthai = "'.$status.'", tienich = "'.$tienich.'", dientich = "'.$dientich.'", SDT = "'.$SDT.'", mota = "'.$mota.'", diachi = "'.$diachi.'", id_user = "'.$id_user.'" where id = '.$id;
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
		$thumbnail   = $post['thumbnail'];
		$status 	 = $post['trangthai'];
		$content     = $post['noidung'];
		$dientich    = $post['dientich'];
		$SDT         = $post['SDT'];
		$mota        = $post['mota'];
		$diachi 	 = $post['diachi'];
		$tienich     = $post['tienich'];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm/Sửa Bài Đăng</title>
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
	    <a class="nav-link" href="index.php">Quản Lý Bài Đăng</a>
	  </li>
	</ul>

	

				<h2 class="text-center">Thêm/Sửa Bài Đăng</h2>


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



            <h2>Diện tích</h2>
            <div class="row">
              <span class="col-4"></span>
              <input style="width: 200px;" type="number" id="dientich" name="dientich"value="<?=$dientich?>">
              m²
            </div>
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

          <div id="tienich">
            <hr>
            <h2>Tiện ích</h2>
            <div class="row">
            	    <?php
					$a='Khép kín';
					if(strpos($tienich,$a)){
						echo"<input type='checkbox' name='tienich[]' value=' Khép kín' id='closed' checked='true'>";
					}
					else{
						
						echo"<input type='checkbox' name='tienich[]' value=' Khép kín' id='closed'>";
					}
            	?>
              <label for="Khép kín">Khép kín</label>
            </div>

            <div class="row">
            	    <?php
					$a='Chỗ để xe';
					if(strpos($tienich,$a)){
						echo"<input type='checkbox' name='tienich[]' value=' Chỗ để xe' id='parking' checked='true'>";
					}
					else{
						
						echo"<input type='checkbox' name='tienich[]' value=' Chỗ để xe' id='parking'>";
					}
            	?>	
              <label for="Chỗ để xe">Chỗ để xe</label>
            </div>

            <div class="row">
            	     <?php
					$a='Cửa sổ';
					if(strpos($tienich,$a)){
						echo"<input type='checkbox' name='tienich[]' value=' Cửa sổ' id='window' checked='true'>";
					}
					else{
						
						echo"<input type='checkbox' name='tienich[]' value=' Cửa sổ' id='window'>";
					}
            	?>	
              <label for="window">Cửa sổ</label>
            </div>

            <div class="row">
            	    <?php
					$a='Ban công';
					if(strpos($tienich,$a)){
						echo"<input type='checkbox' name='tienich[]' value=' Ban công' id='balcony' checked='true'>";
					}
					else{
						
						echo"<input type='checkbox' name='tienich[]' value=' Ban công' id='balcony'>";
					}
            	?>	
              <label for="balcony">Ban công</label>
            </div>

            <div class="row">
            	    <?php
					$a='Wifi';
					if(strpos($tienich,$a)){
						echo"<input type='checkbox' name='tienich[]' value=' Wifi' id='wifi' checked='true'>";
					}
					else{
						
						echo"<input type='checkbox' name='tienich[]' value=' Wifi' id='wifi'>";
					}
            	?>	
              <label for="wifi">Wifi</label>
            </div>


            <div class="row">
            	    <?php
					$a='Giờ tự do';
					if(strpos($tienich,$a)){
						echo"<input type='checkbox' name='tienich[]' value=' Giờ tự do' id='free' checked='true'>";
					}
					else{
						
						echo"<input type='checkbox' name='tienich[]' value=' Giờ tự do' id='free'>";
					}
            	?>	
              <label for="free">Giờ tự do</label>
            </div>

            <div class="row">
            	    <?php
					$a='Nhà bếp';
					if(strpos($tienich,$a)){
						echo"<input type='checkbox' name='tienich[]' value=' Nhà bếp' id='chicken' checked='true'>";
					}
					else{
						
						echo"<input type='checkbox' name='tienich[]' value=' Nhà bếp' id='chicken'>";
					}
            	?>	
              <label for="chicken">Nhà bếp</label>
            </div>


            <div class="row">
            	    <?php
					$a='Máy giặt';
					if(strpos($tienich,$a)){
						echo"<input type='checkbox' name='tienich[]' value=' Máy giặt' id='washing_machine' checked='true'>";
					}
					else{
						
						echo"<input type='checkbox' name='tienich[]' value=' Máy giặt' id='washing_machine'>";
					}
            	?>	
              <label for="washing_machine">Máy giặt</label>
            </div>

            <div class="row">
            	    <?php
					$a='Điều hoà';
					if(strpos($tienich,$a)){
						echo"<input type='checkbox' name='tienich[]' value=' Điều hoà' id='freezer' checked='true'>";
					}
					else{
						
						echo"<input type='checkbox' name='tienich[]' value=' Điều hoà' id='freezer'>";
					}
            	?>	
              <label for="freezer">Điều hoà</label>
            </div>

            <div class="row">
            	    <?php
					$a='Ti vi';
					if(strpos($tienich,$a)){
						echo"<input type='checkbox' name='tienich[]' value=' Ti vi' id='television' checked='true'>";
					}
					else{
						
						echo"<input type='checkbox' name='tienich[]' value=' Ti vi' id='television'>";
					}
            	?>	
              <label for="television">Ti vi</label>
            </div>

            <div class="row">
            	    <?php
					$a='Giường';
					if(strpos($tienich,$a)){
						echo"<input type='checkbox' name='tienich[]' value=' Giường' id='bed' checked='true'>";
					}
					else{
						
						echo"<input type='checkbox' name='tienich[]' value=' Giường' id='bed'>";
					}
            	?>	
              <label for="bed">Giường</label>
            </div>

            <div class="row">
				<?php
					$a='Tủ quần áo';
					if(strpos($tienich,$a)){
						echo"<input type='checkbox' name='tienich[]' value=' Tủ quần áo' id='wardrobe' checked='true'>";
					}
					else{
						
						echo"<input type='checkbox' name='tienich[]' value=' Tủ quần áo' id='wardrobe'>";
					}
            	?>	

              <label for="wardrobe">Tủ quần áo</label>
            </div>

    
            <hr>
          </div>
        </div>

        <!-- address -->
        <div id="address">
          <h2>Địa chỉ</h2>


          <div id="div_district"></div>
          <div id="div_sub_district"></div>

          <div>
            <label for="address_r">Số nhà, tên đường, huyện, tỉnh..</label>
            <input type="text" name="diachi" id="diachi" maxlength="1000"value="<?=$diachi?>">
          </div>
        </div>

        
          
         <div class="form-group">
					  <label for="thumbnail">Thumbnail:</label>
					  
					  <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?=$thumbnail?>" onchange="updateThumbnail()">
					  <img src="<?=$thumbnail?>" style="max-width: 200px" id="img_thumbnail">

           <hr>
            <div class="form-group">
          				  <label for="noidung" style="color: #a52a2a;">Nội Dung:</label>
           				 <textarea class="form-control" style="background-color:  white;" rows="6" name="noidung" id="noidung"?><?=$content?></textarea>
          	</div>
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