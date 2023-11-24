<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User List</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<?php
$i=0;
$selQuery="select * from tbl_newuser n inner join tbl_place p on n.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id";
$result=$conn->query($selQuery);
if($result->num_rows>0)
	?>
    <table border="1" align="center" cellpadding="10">
  <tr>
    <td>SL No</td>
    <td>Name</td>
    <td>Email</td>
    <td>Contact</td>
    <td>Address</td>
    <td>Photo</td>
    <td>District</td>
    <td>Place</td>
    <td>Date of Join</td>
  </tr>
  <?php
  while($data=$result->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data['user_name']?></td>
    <td><?php echo $data['user_email']?></td>
    <td><?php echo $data['user_contact']?></td>
    <td><?php echo $data['user_address']?></td>
    <td><img src="../Assets/Files/Seller/<?php echo $data['user_photo']?>" width="150" height="150"/></td>
    <td><?php echo $data['district_name']?></td>
    <td><?php echo $data['place_name']?></td>
    <td><?php echo $data['user_doj']?></td>
    <td><a href="UserList.php?did=<?php echo $data['user_id']?>"></a></td>
  </tr>
  <?php
  }
 ?>
</table>
</form>
</body>
</html>
<?php
ob_flush();
include("Foot.php");
?>