<?php 
session_start();
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_login"]))
{
	$email=$_POST["txt_email"];
	$pass=$_POST["txt_password"];
	
	$sel1="select * from tbl_newuser where user_email ='".$email."' and user_password='".$pass."' ";
	$user=$conn->query($sel1);
	
	$sel2="select * from tbl_doctor where doctor_email ='".$email."' and doctor_password='".$pass."' ";
	$doctor=$conn->query($sel2);
	
	$sel3="select * from tbl_seller where seller_email ='".$email."' and seller_password='".$pass."'";
	$seller=$conn->query($sel3);
	
	$sel4="select * from tbl_admin where admin_email ='".$email."' and admin_password='".$pass."'";
	$admin=$conn->query($sel4);
	
	if($user->num_rows>0)
	{
		$rowuser=$user->fetch_assoc();
		$_SESSION['uid']=$rowuser["user_id"];
		$_SESSION['uname']=$rowuser["user_name"];
		header("location:../User/Homepage.php");
	}
	else if($doctor->num_rows>0)
	{
		$rowdr=$doctor->fetch_assoc();
		if($rowdr["doctor_status"] == 1)
		{
			$_SESSION['did']=$rowdr["doctor_id"];
			$_SESSION['dname']=$rowdr["doctor_name"];
			header("location:../Doctor/Homepage.php");
		}
		else if($row["doctor_status"] == 0)
		{
			?>
			<script>
			alert("Registration Pending..")
            window.location='Login.php'
            </script>
			<?php
		}
		else
		{
			?>
			<script>alert("Registration Rejected..")
            window.location='Login.php'
            </script>
			<?php
		}
	}	
	else if($seller->num_rows>0)
	{
		$rows=$seller->fetch_assoc();
		if($rows["seller_status"] == 1)
		{
			$_SESSION['sid']=$rows["seller_id"];
			$_SESSION['sname']=$rows["seller_name"];
			header("location:../Seller/Homepage.php");	
		}	
		else if($rows["seller_status"] == 0)
		{
			?>
			<script>
			alert("Registration Pending..")
            window.location='Login.php'
            </script>
			<?php
		}
		else
		{
			?>
			<script>alert("Registration Rejected..")
            window.location='Login.php'
            </script>
			<?php
		}
	}
	else if($admin->num_rows>0)
	{
		$row=$admin->fetch_assoc();
		$_SESSION['aid']=$row["admin_id"];
		$_SESSION['aname']=$row["admin_name"];
		header("location:../Admin/Homepage.php");		
	}
	else
	{
		?>
		<script>alert("Invalid Email or Password...")
        window.location='Login.php'
        </script>
		<?php
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../Assets/Templates/Login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../Assets/Templates/Login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>

				<form class="login100-form" method="post">
					<div class="wrap-input100  m-b-26">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="txt_email" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 m-b-18" >
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="txt_password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="btn_login">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="../Assets/Templates/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Templates/Login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Templates/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="../Assets/Templates/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Templates/Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Templates/Login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../Assets/Templates/Login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Templates/Login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Templates/Login/js/main.js"></script>

</body>
</html>