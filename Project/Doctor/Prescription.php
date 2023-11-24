<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Header.php");
if(isset($_POST["btn_submit"]))
{
	$medicinename=$_POST["txt_medicinename"];
	$coursedetails=$_POST["txt_course"];
	$insQry="insert into tbl_prescription(medicine_name,medicine_course,appointment_id)values('".$medicinename."','".$coursedetails."','".$_GET["aid"]."')";
	if($conn->query($insQry))
	{
		?>
		<script>
		alert("inserted");
		</script>
		<?php
	}
} 
?>             
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prescription</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <br>
  <br>
  <br>
  <br>
  <table border="1" cellpadding="10">
    <tr>
      <td>Medicine Name</td>
      <td><label for="txt_medicinename"></label>
      <textarea name="txt_medicinename" id="txt_medicinename" cols="45" rows="5" required="required"></textarea></td>
    </tr>
    <tr>
      <td>Course Details</td>
      <td><label for="txt_course"></label>
      <textarea name="txt_course" id="txt_course" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Save" />
      <input type="submit" name="btn_submit2" id="btn_submit2" value="Cancel" /></td>
    </tr>
  </table>
  <a style='color:black' href='PayedAppointment.php'>Go Back</a>
</form>
</body>
</html>
<?php
ob_flush();
include("Footer.php");
?>