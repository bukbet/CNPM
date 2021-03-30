<?php
	require_once ('db/dbhelper.php');
	session_start();

	if (isset($_POST['submit']) && $_POST["taikhoan"] != '' && $_POST["matkhau"] != '') 
	{
			$id_user    = $_POST["id"];
			$usrnm      = $_POST["taikhoan"];
			$password   = $_POST["matkhau"];
			$sql		= "select * from login where taikhoan ='$usrnm' and matkhau='$password' " ;
			$user = mysqli_query($con, $sql);
			// $data = mysqli_fetch_assoc($user); 

			if(mysqli_num_rows($user)>0){
				if($_POST["taikhoan"]=="admin" && $_POST["matkhau"] == "admin" ){	

					header("Location: admin/Account/index.php");
					$_SESSION["username"] = "admin";

					

				}
				else{
				$_SESSION["username"] = "admin";
				header("Location:nhanvien/khachhang/index.php");
				
				}
			}
			else{
				echo "Nhập sai tên Tài Khoản hoặc Mật Khẩu";
				header("Location: index.php");
			}

	}
	else
	{
		header("location:login.php");
	}

?>