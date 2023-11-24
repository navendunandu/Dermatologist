<?php
include("../Connection/Connection.php");
?>
 <option value="">Select Place</option>
      <?php
	  $selQry="select * from tbl_place where district_id='".$_GET["did"]."'";
	  $result=$conn->query($selQry);
	  while($row=$result->fetch_assoc())
	  {
		  ?>
          <option value="<?php echo $row['place_id']?>"><?php echo $row['place_name']?></option>
          <?php
	  }
	  ?>