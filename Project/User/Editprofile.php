<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Header.php");
session_start();
$sel="select * from tbl_newuser where user_id=".$_SESSION["uid"];
$res=$conn->query($sel);
$row=$res->fetch_assoc();
$name=$row["user_name"];
$contact=$row["user_contact"];
$email=$row["user_email"];
$address=$row["user_address"];
if(isset($_POST["btn_update"]))
 {
	$na=$_POST["txt_name"];
	$con=$_POST["txt_contact"];
	$em=$_POST["txt_email"];
	$add=$_POST["txt_address"];
	$up="update tbl_newuser set user_name='".$na."', user_contact='".$con."', user_email='".$em."', user_address='".$add."' where user_id=".$_SESSION['uid'];
	if($conn->query($up))
	{
		?>
		<script>
        alert("Update")
		window.location='Homepage.php'
        </script>
		<?php 
	}
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EditProfile</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
  <table  border="1" cellpadding="10">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
     <input type="text" name="txt_name" id="txt_name"value="<?php echo $name;?>" autocomplete="off" required="required"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $contact;?>"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
         <input type="text" name="txt_email" id="txt_email"value="<?php echo $email;?>" autocomplete="off" required="required"/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <input type="text" name="txt_address" id="txt_address"value="<?php echo $address;?>" autocomplete="off" required="required"/></td>
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