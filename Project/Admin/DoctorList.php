<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Doctor List</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<?php
if(isset($_GET['aid']))
{
$update="update tbl_doctor set doctor_status=1 where doctor_id='".$_GET['aid']."'";
$conn->query($update);
header("location:DoctorList.php");	
}
if(isset($_GET['rid']))
{
$reject="update tbl_doctor set doctor_status=2 where doctor_id='".$_GET['rid']."'";
$conn->query($reject);
header("location:DoctorList.php");	
}

?>
<table border="1" align="center" cellpadding="10">
  <tr>
    <td>SL No</td>
    <td>Name</td>
    <td>Email</td>
    <td>Contact</td>
    <td>Address</td>
    <td>Photo</td>
    <td>Place</td>
    <td>District</td>
    <td>Gender</td>
    <td>Date of Join</td>
    <td>Password</td>
    <td>Proof</td>
  </tr>
<?php
$i=0;
$selQuery="select * from tbl_doctor n inner join tbl_place p on n.place_id=p.place_id inner join tbl_district d on d.district_id=p.district_id where doctor_status=0 ";
$result=$conn->query($selQuery);
if($result->num_rows>0)
{
	
  while($data=$result->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data['doctor_name']?></td>
    <td><?php echo $data['doctor_email']?></td>
    <td><?php echo $data['doctor_contact']?></td>
    <td><?php echo $data['doctor_address']?></td>
    <td><img src="../Assets/Files/Seller/<?php echo $data['doctor_photo']?>" width="150" height="150"/></td>
    <td><?php echo $data['place_name']?></td>
    <td><?php echo $data['district_name']?></td>
    <td><?php echo $data['doctor_gender']?></td>
    <td><?php echo $data['doctor_doj']?></td>
    <td><?php echo $data['doctor_password']?></td>
    <td><a href="../Assets/Files/Doctor/<?php echo $data['doctor_proof']?>" download>Download</a></td>
    <td><a href="DoctorList.php?aid=<?php echo $data['doctor_id']?>">Accept</a></td>
    <td><a href="DoctorList.php?rid=<?php echo $data['doctor_id']?>">Reject</a></td> 
  </tr>
  <?php
  }
 ?>
 </table>
 <?php
  }
 ?>
</form>
</body>
</html>
<?php
ob_flush();
include("Foot.php");
?>
