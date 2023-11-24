<?php

		include("../Assets/Connection/connection.php");
        ob_start();

        include("Head.php");
		if(isset($_POST["btnSave"]))
		{
			$Category=$_POST["txtcategory"];
			$Subcategory=$_POST["txtsubcategory"];
			$insQry="insert into tbl_subcategory(category_id,subcategory_name)values('".$Category."','".$Subcategory."')";
			$conn->query($insQry);
		}
		if(isset($_GET["delID"]))
		{
				$delQry="delete from tbl_Subcategory where subcategory_id='".$_GET["delID"]."'";
				$conn->query($delQry);
				header("location:Subcategory.php");
		}
		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Category</td>
      <td><label for="txtcategory"></label>
        <select name="txtcategory" id="txtcategory">
        <option>---Select---</option>
         <?php
		$selQry="select * from tbl_category";
		$result=$conn->query($selQry);
		while($row=$result->fetch_assoc())
		{
		?>
        <option value="<?php echo $row['category_id']?>"><?php echo $row['category_name']?></option>
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Subcategory</td>
      <td><label for="txtsubcategory"></label>
      <input type="text" name="txtsubcategory" id="txtsubcategory" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnSave" id="btnSave" value="Submit" />
      </div></td>
    </tr>
  </table>
  </form>
  <table width="200" border="1">
    <tr>
      <td>Sl No</td>
      <td>Category </td>
      <td>Subcategory</td>
      <td>Action</td>
    </tr>
    <?php
	 $i=0;
 	 $selQry="select * from tbl_subcategory p inner join tbl_category d on p.Category_id=d.Category_id";
 	 $result=$conn->query($selQry);
  	while($row=$result->fetch_assoc())
	{
		$i++;
 ?>
 <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['category_name'];?></td>
      <td><?php echo $row['subcategory_name'];?></td>
      <td><a href="Place.php?delID=<?php echo $row["category_id"]?>">Delete</a></td>
    </tr> 
    <?php
	}
	?>
    </table>
 </body>
 </html>