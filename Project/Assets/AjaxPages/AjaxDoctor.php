<?php

include("../Connection/Connection.php");

?>
<table align="center" cellpadding="10" cellspacing="60" id="result">
<tr>
<?php
$sel="select *  from tbl_doctor d inner join tbl_place p on p.place_id=d.place_id inner join tbl_district dt on dt.district_id=p.district_id where d.doctor_status=1";

if($_GET["pid"]!="")
{
	$sel.=" and d.place_id='".$_GET["pid"]."'";
}
if($_GET["did"]!="")
{
	$sel.=" and p.district_id='".$_GET["did"]."'";
}
$datas=$conn->query($sel);
$i=0;
while($rows=$datas->fetch_assoc())
{
	$i++;
	
?>
<td>
<p style="text-align:center;border:1px solid #999;margin:22px;padding:10px">
<img src="../Assets/Files/Doctor/<?php echo $rows["doctor_photo"]?>"  width="150" height="150" style="border-radius:75px"/><br />
<?php echo $rows["doctor_name"]?><br />
<?php echo $rows["doctor_contact"]?><br />
<?php echo $rows["doctor_email"]?><br />
<a href="ViewAvailable.php?did=<?php echo $rows["doctor_id"]?>">View Availability</a>
</p>
</td>
<?php
if($i%4==0)
{
	echo "</tr><tr>";
}
}
?>
</table>