<?php
$Servername="localhost";
$Username="root";
$password="";
$DB="db_dermatologist";
$conn=mysqli_connect($Servername,$Username,$password,$DB);
if(!$conn)
{
	echo"Not Connect";
}
?>