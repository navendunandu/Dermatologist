<br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Availability</title>
</head>

<body>
<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("header.php");
session_start();
if(isset($_POST["btn_submit"]))
{
	$ins="insert into tbl_doctoravailable(doctor_id,available_date,available_fromtime,available_totime)values('".$_SESSION["did"]."','".$_POST["txt_date"]."','".$_POST["txt_time"]."','".$_POST["txt_time2"]."')";	
	if($conn->query($ins))
	{
		$selavail="select max(available_id) as id from tbl_doctoravailable where doctor_id='".$_SESSION["did"]."'";
		$datas=$conn->query($selavail);
		$rows=$datas->fetch_assoc();
		$count=$_POST["txt_slotcount"];
		for($i=1;$i<=$count;$i++)
		{
			$insqry="insert into tbl_slots(slot_number,available_id)values('".$i."','".$rows["id"]."')";
			$conn->query($insqry);
			
		}
		header("location:Availability.php");
	}
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_doctoravailable where available_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		header('location:Availability.php');
	}
}
?>
<form id="form1" name="form1" method="post" action="">
  <table  border="1">
    <tr>
      <td>Available Date</td>
      <td><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date" /></td>
    </tr>
    <tr>
      <td>From Time</td>
      <td><label for="txt_time"></label>
      <input type="time" name="txt_time" id="txt_time" /></td>
    </tr>
    <tr>
      <td>To Time</td>
      <td><label for="txt_time"></label>
      <input type="time" name="txt_time2" id="txt_time" /></td>
    </tr>
    <tr>
      <td>Slot Count</td>
      <td><label for="txt_slotcount"></label>
      <input type="text" name="txt_slotcount" id="txt_slotcount" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Save" />
      <input type="submit" name="btn_submit2" id="btn_submit2" value="Cancel" /></td>
    </tr>
  </table>
  </form>
  <?php
$i=0;
$selQuery="select * from tbl_doctoravailable where doctor_id='".$_SESSION["did"]."'";
$result=$conn->query($selQuery);
if($result->num_rows>0)
{
	?>
  <table border="1" cellpadding="10">
  <tr>
  <td>SL NO</td>
  <td>Available Date</td>
  <td>From Time</td>
  <td>To Time</td>
  <td>Action</td>
  </tr>
  <?php
   while($data=$result->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
  <td><?php echo $i ?></td>
  <td><?php echo $data['available_date']?></td>
  <td><?php echo $data['available_fromtime']?></td>
  <td><?php echo $data['available_totime'] ?></td>
  <td><a href="Availability.php?did=<?php echo $data['available_id'] ?>">Delete</a></td>
  <?php
  }
  ?>
  </table>
  <?php
}
?>
</body>
</html>
<?php
ob_flush();
include("Footer.php");
?>