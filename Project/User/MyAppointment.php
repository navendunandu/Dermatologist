<?php
ob_start();

include("../Assets/Connection/Connection.php");
include("Header.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Appointment</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
<?php
if(isset($_GET['aid']))
{
	$delQry="delete from tbl_appointment where appointment_id=".$_GET['aid'];
	if($conn->query($delQry))
	{
		header('location:MyAppointment.php');
	}
}
?>
<br>
<br>
<br>
<br>
  <table border="1" cellpadding="10">
    <tr>
      <td>SL NO</td>
      <td>Slot Number</td>
      <td>Doctor Name</td>
      <td>Availability</td>
      <td>From Time</td>
      <td>To Time</td>
      <td>Action</td>
    </tr>
    <tr>
    <?php
$i=0;
$selQuery="select * from tbl_appointment a inner join tbl_slots s on s.slot_id=a.slot_id inner join tbl_doctoravailable da on da.available_id=s.available_id inner join tbl_doctor d on d.doctor_id=da.doctor_id where a.user_id='".$_SESSION["uid"]."'";
$result=$conn->query($selQuery);
if($result->num_rows>0)
{
	
  while($data=$result->fetch_assoc())
  {
	  $i++;
	  ?>
      <td><?php echo $i ?></td>
      <td><?php echo $data['slot_number']?></td>
      <td><?php echo $data['doctor_name']?></td>
      <td><?php echo $data['available_id']?></td>
      <td><?php echo $data['available_fromtime']?></td>			
      <td><?php echo $data['available_totime']?></td>
      <td><?php
	  if($data["appointment_status"]==1)
	  {
		  echo "appointment accepted";?>| <a style='color:black' href="MyAppointment.php?aid=<?php echo $data["appointment_id"]?>">Cancel</a>
          <a style='color:black' href="Appointmentpayment.php?bid=<?php echo $data["appointment_id"]?>">Pay Now</a> <?php
	  }
	  else if($data["appointment_status"]==2)
	  {
		  echo "appointment rejected"; 
         
	  }
	  else
	  {
		  echo "appointment Payment..";?>
          <a style='color:black' href="ViewPrescription.php?aid=<?php echo $data["appointment_id"]?>">View Prescription</a>
          <?php
	  }
	  ?></td>
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