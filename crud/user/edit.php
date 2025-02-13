<?php
include('../conn.php');

$id = $_GET['id'];

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$salary = (int)$_POST['salary'];
$department_id = $_POST['department_id'];

mysqli_query($conn, "UPDATE user SET firstname='$firstname', lastname='$lastname', address='$address', salary=$salary WHERE userid='$id'");

$checkDept = mysqli_query($conn, "SELECT * FROM `department-user` WHERE userid='$id'");

if (mysqli_num_rows($checkDept) > 0) {
	mysqli_query($conn, "UPDATE `department-user` SET departmentid='$department_id' WHERE userid='$id'");
} else {
	mysqli_query($conn, "INSERT INTO `department-user` (userid, departmentid) VALUES ('$id', '$department_id')");
}

header('location:index.php');
