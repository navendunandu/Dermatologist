<?php
session_start();
ob_start();
include("../Assets/Connection/Connection.php");
include("Header.php");
if(isset($_POST["btn_send"]))
{
	$title=$_POST["txt_title"];
	$content=$_POST["txt_content"];
	$insQry="insert into tbl_complaint(complaint_title,complaint_content,doctor_id,complaint_date)values('".$title."','".$content."','".$_SESSION["did"]."',curdate())";
	if($conn->query($insQry))
	{
		?>
		<script>
		alert("inserted");
		</script>
		<?php
	}
}   
if(isset($_GET["did"]))
{
	$del="delete from tbl_complaint where complaint_id='".$_GET["did"]."'";
	$conn->query($del);
	header("location:PostComplaint.php");
}
?>

<br><br><br><br><br>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Post Complaint</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table  border="1" cellpadding="10">
    <tr>
      <td>Title</td>
      <td><label for="txt_title"></label>
      <input type="text" name="txt_title" id="txt_title" autocomplete="off" required/></td>
    </tr>
    <tr>
      <td>Content</td>
      <td><label for="txt_content"></label>
      <textarea name="txt_content" id="txt_content" cols="45" rows="5" required></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_send" id="btn_send" value="Send" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  <table  border="1" cellpadding="10">
    <tr>
      <td>Sl.No</td>
      <td>Content</td>
      <td>Title</td>
      <td>Reply</td>
      <td>Action</td>
    </tr>
    <?php
	$sel="select * from tbl_complaint where doctor_id='".$_SESSION["did"]."'";
	$datas=$conn->query($sel);
	$i=0;
	while($row=$datas->fetch_assoc())
	{
		$i++; 
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $row["complaint_content"]?></td>
      <td><?php echo $row["complaint_title"]?></td>
      <td><?php echo $row["complaint_reply"]?></td>
      <td><a href="PostComplaint.php?did=<?php echo $row["complaint_id"]?>">Delete</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>
<?php
ob_flush();
include("Footer.php");
?>