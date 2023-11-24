<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Header.php");
?>
<br><br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Seller</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>District</td>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district"  onchange="getPlace(this.value)" required>
        <option value="">Select</option>
         <?php
	  $selQry="Select * from tbl_district";
	  $result=$conn->query($selQry);
	  while($row=$result->fetch_assoc())
	  {
		  ?>
          <option value="<?php echo $row['district_id']?>"><?php echo $row['district_name']?></option>
          <?php
	  }
	  ?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="sel_place"></label>
        <select name="sel_place" id="sel_place">
        <option value="">Select</option>
      </select></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
</form>
<?php
if(isset($_POST["btn_submit"]))
{
	$id=$_POST["sel_place"];
	$i=0;
	$selQuery="select * from tbl_seller s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where s.place_id=".$id;
	$result=$conn->query($selQuery);
if($result->num_rows>0)
 {
	?>
<table border="1" align="center" cellpadding="10">
  <tr>
  	<td>SL NO</td>
    <td>Seller Name</td>
    <td>Seller Email</td>
    <td>Seller Contact</td>
    <td>Action</td>
  </tr>
   <?php
   while($data=$result->fetch_assoc())
  {
	  $i++;
	  ?>
 <tr>
    <td><?php echo $i ?></td>	
     <td><?php echo $data['seller_name']?></td>
     <td><?php echo $data['seller_email']?></td>
     <td><?php echo $data['seller_contact']?></td>
     <td><a href="ViewProducts.php?sid=<?php echo $data["seller_id"] ?>" style="color:black">View Products</a></td>
     </tr>
     <?php
     }
     ?>
</table>
<?php
 }
}
?>
</body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
		success: function(html){
			$("#sel_place").html(html);
		}
	});
}
</script>
<?php
ob_flush();
include("Footer.php");
?>