<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_save"]))
{
	$name=$_POST["txt_name"];
	$contact=$_POST["txt_contact"];
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"]; 
	$conformpassword=$_POST["txt_conformpassword"];
	if($password==$conformpassword)
	{
	$insQry="insert into tbl_admin(admin_name,admin_contact,admin_email,admin_password)values('".$name."','".$contact."','".$email."','".$password."')";
	if($conn->query($insQry))
	{
		?>
		<script>
		alert("inserted");
		</script>
		<?php
	}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registeration</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" autocomplete="off" required /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact"  /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" autocomplete="off" required /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" autocomplete="off" required /></td>
    </tr>
    <tr>
      <td>Conform Password</td>
      <td><label for="txt_conformpassword"></label>
      <input type="text" name="txt_conformpassword" id="txt_conformpassword"  autocomplete="off" required/></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_save" id="btn_save" value="Save" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
ob_flush();
include("Foot.php");
?>