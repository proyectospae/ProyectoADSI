<?php
$mysqli = new mysqli("localhost","root","","modelo");
if(mysqli_connect_errno()){
	echo'Concexion Fallida : ', mysql_connect_error();
	exit();
}
?>