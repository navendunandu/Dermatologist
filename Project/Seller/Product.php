<?php

		include("../Assets/Connection/connection.php");
    
		session_start();
    ob_start();
    include('Header.php');
		
		if(isset($_POST["btnsave"]))
		{
			$photo=$_FILES['file_photo']['name'];
			$temp=$_FILES['file_photo']['tmp_name'];
			move_uploaded_file($temp, '../Assets/Files/Product/'.$photo);
			
			
			$Product_Name=$_POST["txtname"];
			
			$Subcategory=$_POST["txt_subcategory"];
			$Product_Detail=$_POST["txtproductdetails"];
			$Price=$_POST["txtprice"];
			
			$insQry="insert into tbl_product(product_name,subcategory_id,product_detail,product_price,product_photo,seller_id)values('".$Product_Name."','".$Subcategory."','".$Product_Detail."','".$Price."','".$photo."','".$_SESSION["sid"]."')";
			$conn->query($insQry);
			
		}
		if(isset($_GET["delID"]))
		{
				$delQry="delete from tbl_product where product_id='".$_GET["delID"]."'";
				$conn->query($delQry);
				header("location:Product.php");
		}
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
  <br>
  <br>
  <br>
  <br>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="422" height="229" border="1">
    <tr>
      <td>Product Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td>Category</td>
      <td><label for="selcategory"></label>
        <select name="selcategory" id="selcategory" onChange="getsubcategory(this.value)">
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
      <td><label for="selsubcategory"></label>
        <select name="txt_subcategory" id="txt_subcategory">
         <option value="">---Select---</option>
        </select>
        </td>  
    </tr>
    <tr>
      <td>Product Detail</td>
      <td><label for="txtproductdetail"></label>
      <input type="text" name="txtproductdetails" id="txtproductdetails" /></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><label for="txtprice"></label>
      <input type="text" name="txtprice" id="txtprice" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" /></td>
    </tr>
     <tr>
      <td colspan="2"align="center"><input type="submit" name="btnsave" id="btnSave" value="Add" /></td>
    </tr>
  </table>
</form>
<a href="HomePage.php">Home</a>
<table width="200" border="1">
       <tr>
        <td>Sl No</td>
        <td>product_name</td>
        <td>category_id</td>
        <td>subcategory_id</td>
        <td>product_detail</td>
        <td>product_price</td>
        <td>product_photo</td>
        <td>Action</td>
       </tr>
       <?php
	   $i=0;
	   $selQry="select * from tbl_product s inner join tbl_subcategory p on s.subcategory_id=p.subcategory_id inner join tbl_category d on p.category_id=d.category_id";
	   
	   $result=$conn->query($selQry);
	   while($row=$result->fetch_assoc())
	   {
		   $i++;
		?>
        
        <tr>
        	<td><?php echo $i ?></td>
            <td><?php echo $row['product_name'];?></td>
            <td><?php echo $row['category_name'];?></td>
            <td><?php echo $row['subcategory_name'];?></td>
            <td><?php echo $row['product_detail'];?></td>
            <td><?php echo $row['product_price'];?></td>
            <td><a href="../Assets/Files/Product/<?php echo $row['product_photo'];?>" target="_blank">View Photo</td></td>
            <td><a href="product.php?delID=<?php echo $row["product_id"]?>">Delete</a></td>
             <td><a href="Stock.php?ID=<?php echo $row["product_id"]?>">Stock</a></td>
            </tr>
            <?php
	   }
	   ?>
        
        
 </table>       
</body>
<?php
include('Footer.php');
ob_flush();
?>
</html>
		








<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getsubcategory(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxSub.php?cid="+did,
		success: function(html){
			$("#txt_subcategory").html(html);
		}
	});
}
</script>