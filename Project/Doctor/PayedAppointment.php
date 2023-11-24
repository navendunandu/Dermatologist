<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Header.php");
session_start();
?>
<br><br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payed Appointment</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<?php

if(isset($_GET['did']))
{
$reject="update tbl_appointment set appointment_status=2 where appointment_id='".$_GET['did']."'";
$conn->query($reject);
header("location:D
doctoraccept.php");	
}

?>
<table border="1" align="center" cellpadding="10">
  <tr>
    <td>SL No</td>
    <td>User Name</td>
    <td>Contact</td>
    <td>Slot Number</td>
    <td>Date</td>
    <td>Action</td>
  </tr>
<?php
$i=0;
$selQuery="select * from tbl_appointment a inner join tbl_slots s on s.slot_id=a.slot_id inner join tbl_doctoravailable da on da.available_id=s.available_id inner join tbl_newuser u on u.user_id=a.user_id where da.doctor_id='".$_SESSION["did"]."' and a.appointment_status=3";
$result=$conn->query($selQuery);
if($result->num_rows>0)
{
	
  while($data=$result->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr> 
     <td><?php echo $i ?></td>
    <td><?php echo $data['user_name']?></td>
    <td><?php echo $data['user_contact']?></td>
    <td><?php echo $data['slot_id']?></td>
    <td><?php echo $data['available_date']?></td>
    <td><a href="Prescription.php?aid=<?php echo $data['appointment_id']?>" style="color:black">Add Prescription</a></td> 
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
include("Footer.php");
?>

