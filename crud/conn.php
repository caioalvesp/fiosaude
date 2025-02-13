<?php

//MySQLi Procedural
$conn = mysqli_connect("localhost", "root", "php123", "fiosaude");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
