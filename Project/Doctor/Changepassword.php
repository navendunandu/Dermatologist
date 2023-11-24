<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Header.php");
session_start();
if(isset($_POST["btn_update"]))
{
	$sel="select * from tbl_doctor where doctor_id=".$_SESSION['did'];
	$res=$conn->query($sel);
	$row=$res->fetch_assoc();
	$pass=$row["doctor_password"];
	$cuspass=$_POST["txt_currentpassword"];
	$neepass=$_POST["txt_newpassword"];
	$confpass=$_POST["txt_confirmpassword"];
	
	if($pass == $cuspass)
	{
		if($neepass == $confpass)
		{
			$up="update tbl_doctor set doctor_password='".$confpass."' where doctor_id=".$_SESSION["did"];
			if($conn->query($up))
			{
				?>
				<script>
                alert("Password Updated..")
                window.location='Homepage.php'</script>
                <?php
			}
		}
		else
		{
			?>
			<script>
            alert("Error in Confirm Password...")</script>
            <?php	
		}
	}
	else
	{
		?>
		<script>
        alert("Error in Current Password...")</script>
		<?php
	}
}
?>

<br><br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>Current Password</td>
      <td><label for="txt_currentpassword"></label>
      <input type="text" name="txt_currentpassword" id="txt_currentpassword" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_newpassword"></label>
      <input type="text" name="txt_newpassword" id="txt_newpassword" autocomplete="off" required /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_confirmpassword"></label>
      <input type="text" name="txt_confirmpassword" id="txt_confirmpassword" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td colspan="2"align="center"><input type="submit" name="btn_update" id="btn_update" value="Update" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
ob_flush();
include("Footer.php");
?>