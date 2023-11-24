<?php 
ob_start();
include("../Assets/Connection/Connection.php");
include("Header.php");
session_start();
$sel="select * from tbl_doctor where doctor_id=".$_SESSION["did"];
$res=$conn->query($sel);
$row=$res->fetch_assoc();
$name=$row["doctor_name"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Page</title>
</head>

<body>
<h3>Welcome <?php echo  $_SESSION['dname']; ?></h3>
<a href="Myprofile.php">My Profile</a>
<a href="Availability.php">AvailAbility</a>
<a href="Logout.php">Logout</a>
<a href="ViewAppointment.php">View Appointment</a>
<a href="PayedAppointment.php">Payed Appointment</a>
<a href="PostComplaint.php">Complaint</a>
</body>
</html>
<?php
include("Footer.php");
ob_flush();
?>