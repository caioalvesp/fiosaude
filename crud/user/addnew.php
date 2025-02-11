<?php
include('../conn.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$salary = (int)$_POST['salary'];
die($_POST['department']);

$stmt = $conn->prepare("INSERT INTO user (firstname, lastname, address, salary) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $firstname, $lastname, $address, $salary);

if ($stmt->execute()) {
	echo "Registro inserido com sucesso!";
} else {
	echo "Erro ao inserir registro: " . $stmt->error;
}


header('location:index.php');
