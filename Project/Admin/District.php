<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_sel"]))
{
	$district =$_POST["txt_dis"];
	$insQry="insert into tbl_district(district_name)values('".$district."')";
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
	$delQry="delete from tbl_district where district_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		header('location:District.php');
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>

<body>   
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>Distric</td>
      <td><label for="txt_dis"></label>
      <input type="text" name="txt_dis" id="txt_dis" autocomplete="off" required="required" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sel" id="btn_sel" value="Submit" /></td>
    </tr>
  </table>
 
</form>
<?php
$i=0;
$selQuery="select * from tbl_district";
$result=$conn->query($selQuery);
if($result->num_rows>0)
{
	?>
<table border="1" align="center" cellpadding="10">
  <tr>
    <td>SL No</td>
    <td>Name</td>
    <td>Action</td>
  </tr>
  <?php
  while($data=$result->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $data['district_name']?></td>
    <td><a href="District.php?did=<?php echo $data['district_id']?>">Delete</a></td>
  </tr>
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
include("Foot.php");
?>