<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Header.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Booking</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<?php
if(isset($_GET['id']))
{
$update="update tbl_cart set cart_status=".$_GET['st']." where cart_id='".$_GET['id']."'";
$conn->query($update);
header("location:ViewBooking.php");	
}
?>
  <table border="1" cellpadding="10">
    <tr>
      <td>SL NO</td>
      <td>Image</td>
      <td>Product</td>
      <td>Category</td>
      <td>Sub Category</td>
      <td>Rate</td>
      <td>User Name</td>
      <td>Status</td>
      <td>Action</td>
    </tr>
   <?php 
	$sel="select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_product p on p.product_id=c.product_id inner join tbl_subcategory s on s.subcategory_id=p.subcategory_id inner join tbl_category ct on ct.category_id=s.category_id inner join tbl_newuser u on u.user_id=b.user_id where p.seller_id=".$_SESSION['sid'];
	$data=$conn->query($sel);
	$i=0;
	while($row=$data->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><img src="../Assets/Files/Product/<?php echo $row['product_photo']?>" width="150" height="150"/></td>
      <td><?php echo $row['product_name'] ?></td>
      <td><?php echo $row['category_name'] ?></td>
      <td><?php echo $row['subcategory_name'] ?></td>
      <td><?php echo $row['product_price'] ?></td>
      <td><?php echo $row['user_name'] ?></td>
      <td>
      <?php
	  if($row["booking_status"]==0 && $row["cart_status"]==1)
    {
      ?>
                  payment Pending 
                  <?php 
    }
    else if($row["booking_status"]==1 && $row["cart_status"]==1)
    {
      ?>
                Payment Completed
                
                  <?php 
    }
    else if($row["booking_status"]==1 && $row["cart_status"]==2)
    {
      ?>
                 Product Packed
                
                  <?php 
    }
    else if($row["booking_status"]==1 && $row["cart_status"]==3)
    {
      ?>
                Product Shipped
                  <?php 
    }
    else if($row["booking_status"]==1 && $row["cart_status"]==4)
    {
      ?>
                     Order Completed
                  <?php 
    }
    ?>
      </td>
      <td>
        <?php
      if($row["booking_status"]==1 && $row["cart_status"]==1)
    {
      ?>
                <a href="ViewBooking.php?id=<?php echo $row['cart_id'] ?>&st=2">Product Packed</a>
                
                  <?php 
    }
    else if($row["booking_status"]==1 && $row["cart_status"]==2)
    {
      ?>
                <a href="ViewBooking.php?id=<?php echo $row['cart_id'] ?>&st=3">Product Shipped</a>
                
                  <?php 
    }
    else if($row["booking_status"]==1 && $row["cart_status"]==3)
    {
      ?>
                <a href="ViewBooking.php?id=<?php echo $row['cart_id'] ?>&st=4">Delivered</a>
                
                  <?php 
    }
    ?>
      </td>
      
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