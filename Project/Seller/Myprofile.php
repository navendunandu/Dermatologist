<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Header.php");
session_start();
$sel="select * from tbl_seller where seller_id=".$_SESSION["sid"];
$res=$conn->query($sel);
$row=$res->fetch_assoc();
$name=$row["seller_name"];
$contact=$row["seller_contact"];
$email=$row["seller_email"];
$address=$row["seller_address"];
?>
<br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MyProfile</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table  border="1" cellpadding="10">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
     <?php echo $name;?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <?php echo $contact;?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <?php echo $email;?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <?php echo $address;?></td>
    </tr>
    <tr>
      <td colspan="2"><a href="Editprofile.php">Edit Profile</a>&nbsp;<a href="Changepassword.php">Change Password</a>
      </td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
ob_flush();
include("Footer.php");
?>
