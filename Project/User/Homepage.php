<?php
session_start(); 
ob_start();

include("../Assets/Connection/Connection.php");
include("Header.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HomePage</title>
</head>

<body>
    <br> <br> <br> <br> <br> <br> <br>
<h3>Welcome <?php  echo $_SESSION["uname"]?></h3>

</body>
</html>
<?php
ob_flush();
include("Footer.php");
?>