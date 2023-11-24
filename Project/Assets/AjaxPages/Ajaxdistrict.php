<?php
include("../Connection/Connection.php");
?>
 <option value="">select</option>
      <?php
	  $selQry="Select * from tbl_district where district_id='".$GET["pid"]."'";
	  $result=$conn->query($selQry);
	  while($row=$result->fetch_assoc())
	  {
		  ?>
          <option value="<?php $row['district_id']?>"><?php echo $row['district_name']?></option>
          <?php
	  }
	  ?>