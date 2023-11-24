<?php

		include("../Assets/Connection/connection.php");
		
    ob_start();
    include('Header.php');
		if(isset($_POST["btnsave"]))
		{
			
			
			
			$Product=$_GET["ID"];
			$Stock_Quantity=$_POST["txt_qty"];
			$Stock_Manufacture_Date=$_POST["txt_mfd"];
			$Stock_Expiry_Date=$_POST["txt_exp"];
			
			
			
			$insQry="insert into tbl_stock(stock_qty,stock_mfd,stock_exp,product_id)values('".$Stock_Quantity."','".$Stock_Manufacture_Date."','".$Stock_Expiry_Date."','".$Product."')";
			$conn->query($insQry);
		}
		if(isset($_GET["delID"]))
		{
				$delQry="delete from tbl_stock where product_ID='".$_GET["delID"]."'";
				$conn->query($delQry);
				header("location:Stock.php");
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
  
<br>
  <br>
  <br>
  <br>
  <br>
  <table width="200" border="1">
  
  
    <tr>
      <td>Stock Quantity</td>
      <td><label for="txt_qty"></label>
      <input type="text" name="txt_qty" id="txt_qty" /></td>
    </tr>
    <tr>
      <td>Stock Manufacture Date</td>
      <td><label for="txt_mfd"></label>
      <input type="date" name="txt_mfd" id="txt_mfd" /></td>
    </tr>
    <tr>
      <td>Stock Expiry Date</td>
      <td><label for="txt_exp"></label>
      <input type="date" name="txt_exp" id="txt_exp" /></td>
    </tr>
   
   
     <tr>
      <td colspan="2"align="center"><input type="submit" name="btnsave" id="btnSave" value="Submit" /></td>
    </tr>
  </table>
</form>
	<a href="HomePage.php">Home</a>
<table width="200" border="1">
		
       <tr>
       
        <td>SL No</td>
        <td>Product</td>
        <td>Stock Quantity</td>
        <td>Stock Manufacture Date</td>
         <td>Stock Expire Date</td>
        <td>Action</td>
       </tr>
        <?php
	   $i=0;
$selQry="select * from tbl_stock s inner join tbl_product p on s.product_id=p.product_id where p.product_id='".$_GET["ID"]."'";
	   $result=$conn->query($selQry);
	   while($row=$result->fetch_assoc())
	   {
		   $i++;
		?>
        
        <tr>
        	<td><?php echo $i ?></td>
          
            <td><?php echo $row['stock_qty'];?></td>
            <td><?php echo $row['stock_mfd'];?></td>
            <td><?php echo $row['stock_exp'];?></td>
            <td><?php echo $row['product_id'];?></td>
            <td><a href="Stock.php?delID=<?php echo $row["product_id"]?>">Delete</a></td>
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