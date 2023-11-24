<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MarkList</title>
</head>
<?php
$name="";
$department="";
$mark1="";
$mark2="";
$mark3="";
$totalmark="";
$averagemark="";
if(isset($_POST["btn_save"]));
{
$name=$_POST["txt_name"];
$department=$_POST["sel_dep"];
$mark1=$_POST["txt_mark1"];
$mark2=$_POST["txt_mark2"];
$mark3=$_POST["txt_mark3"];
$totalmark=$mark1+$mark2+$mark3;
$averagemark=$totalmark/3;
}
?>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name" ></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $name ?> "/></td>
    </tr>
    <tr>
      <td>department</td>
      <td><label for="sel_dep"></label>
      <select name="sel_dep" id="sel_dep" value="<?php echo $depatment ?>"/>
      <option value="BCA">BCA</option>
      <option value="BBA">BBA</option>
      <option value="BCOM">BCOM</option>
      <option value="BA">BA</option>
      </select></td>
    </tr>
    <tr>
      <td>mark1</td>
      <td><label for="txt_mark1"></label>
      <input type="text" name="txt_mark1" id="txt_mark1" /></td>
    </tr>
    <tr>
      <td>mark2</td>
      <td><label for="txt_mark2"></label>
      <input type="text" name="txt_mark2" id="txt_mark2" /></td>
    </tr>
    <tr>
      <td>mark3</td>
      <td><label for="txt_mark3"></label>
      <input type="text" name="txt_mark3" id="txt_mark3" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn_save" id="btn_save" value="save" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
    </tr>
  </table>
  <br>
  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><?php echo $name ?></td>
    </tr>
    <tr>
      <td>department</td>
      <td><?php echo $department ?></td>
    </tr>
    <tr>
      <td>mark1</td>
      <td><?php echo $mark1 ?></td>
    </tr>
    <tr>
      <td>mark2</td>
      <td><?php echo $mark2 ?></td>
    </tr>
    <tr>
      <td>mark3</td>
      <td><?php echo $mark3 ?></td>
    </tr>
    <tr>
      <td>total mark</td>
      <td><?php echo $totalmark ?></td>
    </tr>
    <tr>
      <td>average mark</td>
      <td><?php echo $averagemark ?></td>
    </tr>
  </table>
</form>
</body>
</html>