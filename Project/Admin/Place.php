<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_sub"]))
{
	$placename =$_POST["txtplace"];
	$district =$_POST["seldistrict"];
	
	$insQry="insert into tbl_place(place_name,district_id)values('".$placename."','".$district."')";
	if($conn->query($insQry))
	{
		?>
		<script>
		alert("inserted");
		</script>
		<?php
	}
}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_place where place_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		header('location:Place.php');
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>District</td>
      <td><label for="dis"></label>
        <label for="dis2"></label>
      <select name="seldistrict" id="seldistrict" required>
      <option value="">select</option>
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
      <td><label for="place"></label>
      <input type="text" name="txtplace" id="txtplace"  autocomplete="off" required="required"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
$i=0;
$selQuery="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
$result=$conn->query($selQuery);
if($result->num_rows>0)
{
	?>
<table border="1" align="center" cellpadding="10">
  <tr>
    <td>SL No</td>
    <td>PlaceName</td>
    <td>DistrictName</td>
    <td>Action</td>
  </tr>
  <?php
  while($data=$result->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data['place_name']?></td>
    <td><?php echo $data['district_name']?></td>
    <td><a href="Place.php?did=<?php echo $data['place_id']?>">Delete</a></td>
  </tr>
  <?php
  }
 ?>
</table>
<?php
}
?>
<?php
ob_flush();
include("Foot.php");
?>