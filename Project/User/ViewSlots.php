<?php
ob_start();

include("../Assets/Connection/Connection.php");
include("Header.php");
$sel="select * from tbl_slots where available_id='".$_GET["avid"]."' and slot_status=0";
$datas=$conn->query($sel);
$row=$datas->fetch_assoc();
?>
<br><br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Slots</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<table align="center" cellpadding="10">
<tr>
<td>
<a href="ConfirmSlots.php?slot=<?php echo $row["slot_id"]?>" style="text-decoration:none">
<p style="text-align:center;border:1px solid #999;margin:22px;padding:10px">
<?php echo $row["slot_number"];?>
</p>  </a>
</td>
</tr>
</table>
</form>
</body>
</html>
<?php
ob_flush();
include("Footer.php");
?>