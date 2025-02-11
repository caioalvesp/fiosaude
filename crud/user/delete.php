<?php
	include('../conn.php');
	$id=$_GET['id'];
	mysqli_query($conn,"delete from user");
	header('location:index.php');

?>