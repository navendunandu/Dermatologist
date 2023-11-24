<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Header.php");
?>
<br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Serch Doctor</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<table border="1" align="center" cellpadding="10">
 <tr>
      <th  scope="row">District</th>
      <td><label for="user_district"></label>
        <select name="district_id" id="district_id" onchange="getPlace(this.value)" required>
        <option value="">---Select---</option>
        <?php  
		$sel="select * from tbl_district";
		$row=$conn->query($sel);
		while($data=$row->fetch_assoc())
		{
			?>
            <option value="<?php echo $data["district_id"]  ?>"><?php echo $data["district_name"] ?></option>
            <?php
		}
		
		?>
       </select>
    </td>
    
      <th scope="row">Place</th>
      <td><label for="tbl_user2"></label>
        <select name="place_id" id="place_id" onchange="getDoctor()">
        <option value="">---Select---</option>
        
        </select>
      <label for="place_id"></label></td>
    </tr>
</table>
<table align="center" cellpadding="10" cellspacing="60" id="result">
<tr>
<?php
$sel="select *  from tbl_doctor d inner join tbl_place p on p.place_id=d.place_id inner join tbl_district dt on dt.district_id=p.district_id where d.doctor_status=1";
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
<a href="ViewAvailable.php?did=<?php echo $rows["doctor_id"]?>"  style="color:black">View Availability</a>
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
</form>
</body>
</html>

<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
	  success: function(html){
		$("#place_id").html(html);
		getDoctor();
	  }
	});
}

function getDoctor()
{
	var did=document.getElementById("district_id").value;
	var pid=document.getElementById("place_id").value;

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxDoctor.php?did="+did+"&pid="+pid,
	  success: function(html){
		$("#result").html(html);
	  }
	});
}
</script>
<?php
ob_flush();
include("Footer.php");
?>