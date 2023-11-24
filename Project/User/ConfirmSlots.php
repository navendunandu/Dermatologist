<?php
session_start();
ob_start();
include("../Assets/Connection/Connection.php");
include("Header.php");
if(isset($_POST["btnsave"]))
{
	$ins="insert into tbl_appointment(user_id,slot_id)values('".$_SESSION["uid"]."','".$_GET["slot"]."')";
	if($conn->query($ins))
	{
		$update="update tbl_slots set slot_status=1 where slot_id='".$_GET["slot"]."'";
		$conn->query($update);
		?>
        <script>
		alert("Your Booking SucessFull");
		window.location="HomePage.php";
        </script>
        <?php
	}
	else
	{
		echo $ins;		
	}
	
}
$sel="select * from tbl_slots s inner join tbl_doctoravailable da on s.available_id=da.available_id inner join tbl_doctor d on d.doctor_id=da.doctor_id where s.slot_id='".$_GET["slot"]."'";
$datas=$conn->query($sel);
$row=$datas->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm Slots</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="10">
    <tr>
      <th scope="row">Sot Number</th>
      <td><?php echo $row["slot_number"]?></td>
    </tr>
    <tr>
      <th scope="row">Doctor Name</th>
      <td><?php echo $row["doctor_name"]?></td>
    </tr>
    <tr>
      <th scope="row">Available Date</th>
      <td><?php echo $row["available_date"]?></td>
    </tr>
    <tr>
      <th scope="row">Available From Time</th>
      <td><?php echo $row["available_fromtime"]?></td>
    </tr>
    <tr>
      <th scope="row">Available To Time</th>
      <td><?php echo $row["available_totime"]?></td>
    </tr>
    <tr>
      <th colspan="2" scope="row"><input type="submit" name="btnsave" id="btnsave" value="Confirm" />
      <input type="submit" name="btnc" id="btnc" value="Cancel" /></th>
    </tr>
  </table>
</form>
</body>
</html>
<?php
ob_flush();
include("Footer.php");
?>