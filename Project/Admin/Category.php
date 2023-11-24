<?php

		include("../Assets/Connection/connection.php");
        ob_start();

        include("Head.php");
		
		if(isset($_POST["btnSave"]))
		{
				$categoryname=$_POST["txtcategory"];
				$insQry="insert into tbl_category(category_name)values('".$categoryname."')";
				$conn->query($insQry);
				
		}
		
		
		if(isset($_GET["delID"]))
		{
				$delQry="delete from tbl_category where category_id='".$_GET["delID"]."'";
				$conn->query($delQry);
				header("location:Category.php");
				
		}
		


?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category</title>
</head>

<body>
<a href="HomePage.php">Home</a>
<form id="form1" name="form1" method="post" action="">
  <table width="296" height="126" border="1" align="center">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Category Name</td>
      <td><label for="txtcategory"></label>
      <input type="text" name="txtcategory" id="txtcategory" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnSave" id="btnSave" value="Submit" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
<br />
		<table border="1" align="center">
        
        		<tr>
                		<th>SI No</th>
                        <th>CategoryName</th>
                        <th>Action</th>
                </tr>
                
                <?php
						$i=0;
						$selQry="select * from tbl_category";
						$row=$conn->query($selQry);
						while($data=mysqli_fetch_array($row))
						{
								$i++;
				?>
                <tr>
                		<td><?php echo $i?></td>
                        <td><?php echo $data["category_name"]?></td>
                        <td><a href="Category.php?delID=<?php echo $data["category_id"]?>">Delete</a></td>
                 </tr>
                 
                 <?php
						}
				?>
                
						
        </table>
        <?php
ob_flush();
include("Footer.php");
?>