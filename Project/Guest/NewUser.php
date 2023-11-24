<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Header.php");
if(isset($_POST['btn_submit']))
{
	$photo=$_FILES['file_photo']['name'];
	$temp=$_FILES['file_photo']['tmp_name'];
	$name=$_POST['txt_name'];
	$contact=$_POST['txt_contact'];
	$email=$_POST['txt_email'];
	$address=$_POST['txt_address'];
	$district=$_POST['sel_district'];
	$place=$_POST['sel_place'];
	
	$password=$_POST['txt_password'];
	$confirmpassword=$_POST['txt_cpassword'];
	move_uploaded_file($temp, '../Assets/Files/User/'.$photo);
	
	if($password==$confirmpassword)
	{$ins_query="insert into tbl_newuser(user_name,user_contact,user_email,user_address,place_id,user_photo,user_password,user_doj)values('$name','$contact','$email','$address','$place','$photo','$password',curdate())";
	//echo $ins_query;
	if($conn->query($ins_query))
	{
		?>
        <script>
		alert("inserted sucessfully")
		</script>
        <?php
	}
	}
	
}
?>
<br><br><br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NewUser</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
 <table border="1" align="center" cellpadding="10" style="border-collapse:collapse">
 <tr>
      <td>District</td>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district" onChange="getPlace(this.value)" required>
          <option value="">Select District</option>
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
          <option value="">---Select---</option>
        </select></td>
    </tr>
 
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
        <input type="text" name="txt_name" id="txt_name" autocomplete="off" required /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
        <input type="text" name="txt_contact" id="txt_contact" autocomplete="off" required /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
        <input type="text" name="txt_email" id="txt_email" autocomplete="off" required /></td>
    </tr>
     <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
        <input type="password" name="txt_password" id="txt_password" autocomplete="off" required /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_cpassword"></label>
        <input type="password" name="txt_cpassword" id="txt_cpassword" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
        <textarea name="txt_address" id="txt_address" cols="45" rows="5" required></textarea></td>
    </tr>
   
    <tr>
      <td><p>Photo</p></td>
      <td><label for="file_photo"></label>
        <input type="file" name="file_photo" id="file_photo" required/></td>
    </tr>
   
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="submit" name="btn_reset" id="btn_reset" value="cancel" /></td>
    </tr>
  </table>
  <label for="rad_female"></label>
  <label for="txt_email"></label>
</form>
</body>
</html>
<?php
ob_flush();
include("Footer.php");
?>
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