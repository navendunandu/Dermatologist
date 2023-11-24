<?php
ob_start();

include("../Assets/Connection/Connection.php");
include("Header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Prescription</title>
</head>

<body>
<br>
  <br>
  <br>
  <br>
<form id="form1" name="form1" method="post" action="">
  <table height="99" border="1" cellpadding="10">
    <tr>
      <td height="49">SL NO</td>
      <td>Medicine</td>
      <td>Duration</td>
    </tr>
  <?php
$i=0;
$selQuery="select * from tbl_prescription  where appointment_id='".$_GET["aid"]."'";
$result=$conn->query($selQuery);
if($result->num_rows>0)
{
	
  while($data=$result->fetch_assoc())
  {
	  $i++;
	  ?>
	   <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data['medicine_name']?></td>
    <td><?php echo $data['medicine_course']?></td>
   
  </tr>
  <?php
  }
 ?>
 </table>
 <a style='color:black;' href='ViewSeller.php'>Buy Medicine</a>
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

