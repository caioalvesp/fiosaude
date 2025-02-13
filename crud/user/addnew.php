<?php
include('../conn.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$salary = (int)$_POST['salary'];
$departmentid = $_POST['departament_id'];
try {
	$stmt = $conn->prepare("INSERT INTO user (firstname, lastname, address, salary) VALUES (?, ?, ?, ?)");
	if (!$stmt) {
		throw new Exception("Erro na preparação da query: " . $conn->error);
	}

	$stmt->bind_param("sssi", $firstname, $lastname, $address, $salary);
	if (!$stmt->execute()) {
		throw new Exception("Erro ao inserir usuário: " . $stmt->error);
	}

	$userid = $conn->insert_id;

	$stmt = $conn->prepare("INSERT INTO `department-user` (departmentid, userid) VALUES (?, ?)");
	if (!$stmt) {
		throw new Exception("Erro na preparação da segunda query: " . $conn->error);
	}

	$stmt->bind_param("ii", $departmentid, $userid);
	if (!$stmt->execute()) {
		throw new Exception("Erro ao inserir relação departamento-usuário: " . $stmt->error);
	}

	echo "Registro inserido com sucesso!";
} catch (Exception $e) {
	echo "Erro: " . $e->getMessage();
	die();
}

header('location:index.php');
