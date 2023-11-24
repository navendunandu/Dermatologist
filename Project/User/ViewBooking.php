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
  <table border="1" cellpadding="10">
    <tr>
      <td>SL.NO</td>
      <td>Pet Image</td>
      <td>Bread</td>
      <td>Rate</td>
      <td>Seller Name</td>
      <td>Status</td>
    </tr>
    <?php 
	$sel="select  * from tbl_booking b inner join tbl_pet p on p.pet_id=b.pet_id inner join tbl_seller s on s.seller_id=p.seller_id inner join tbl_bread bs on bs.bread_id=p.bread_id where b.user_id='".$_SESSION["uid"]."'";
	$data=$conn->query($sel);
	$i=0;
	while($row=$data->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><img src="../Assets/Files/Petphoto/<?php echo $row['pet_photo']?>" width="150" height="150"/></td>
      <td><?php echo $row['bread_name'] ?></td>
      <td><?php echo $row['pet_rate'] ?></td>
      <td><?php echo $row['seller_name'] ?></td>
      <td><?php
	  if($row["booking_status"]==1 and $row["payment_status"]==1)
	  {
		  echo "Delivered";?> | <a href="SellerRating.php?bid=<?php echo $row["seller_id"]?>">RateNow</a> <?php
	  }
	  else if($row["payment_status"]==1)
	  {
		  echo "Booking and Payment Completed"; 
         
	  }
	  else
	  {
		  echo "Pending Payment..";
	  }
	  ?></td>
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