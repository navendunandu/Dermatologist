<?php
include("../Connection/Connection.php");
?>
 <option value="">Select</option>
      <?php
	  $selQry="select * from tbl_subcategory where category_id='".$_GET["cid"]."'";
	  $result=$conn->query($selQry);
	  while($row=$result->fetch_assoc())
	  {
		  ?>
          <option value="<?php echo $row['subcategory_id']?>"><?php echo $row['subcategory_name']?></option>
          <?php
	  }
	  ?>