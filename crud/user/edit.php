<?php
	include('../conn.php');
	
	$id=$_GET['id'];
	
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$address=$_POST['address'];
	$salary=(int)$_POST['salary'];

	mysqli_query($conn,"update user set firstname='$firstname', lastname='$lastname', address='$address', salary=$salary where userid='$id'");
	header('location:index.php');

?>