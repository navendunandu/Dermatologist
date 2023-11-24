<?php
ob_start();

include("../Assets/Connection/Connection.php");
include("Header.php");
?>
<br><br><br><br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Availability</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<table align="center" cellpadding="10" cellspacing="60">
<tr>
<?php
$sel="select *  from tbl_doctoravailable where available_date>=curdate() and doctor_id='".$_GET["did"]."'";
$datas=$conn->query($sel);
$i=0;
while($rows=$datas->fetch_assoc())
{
	$i++; 
?>
<td>
<p style="text-align:center;border:1px solid #999;margin:22px;padding:10px">
Date:<?php echo $rows["available_date"]?><br />
From Time:<?php echo $rows["available_fromtime"]?><br />
To Time:<?php echo $rows["available_totime"]?><br />
<a href="ViewSlots.php?avid=<?php echo $rows["available_id"]?>" style="color:black">View Slots</a>
</p>
</td>
<?php
if($i%4==0)
{
	echo "</tr><tr>";
}
}
?>
</tr>
</table>
</form>
</body>
</html>
<?php
ob_flush();
include("Footer.php");
?>