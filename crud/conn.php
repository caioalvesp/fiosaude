<?php
 
//MySQLi Procedural
$conn = mysqli_connect("localhost","root","password","fiosaude");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>