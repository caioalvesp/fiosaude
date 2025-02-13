<?php
include('../conn.php');

$userid = $_GET['id'];

try {
	$stmt = $conn->prepare("DELETE FROM `department-user` WHERE userid = ?");
	$stmt->bind_param("i", $userid);
	if (!$stmt->execute()) {
		throw new Exception("Erro ao remover relação departamento-usuário: " . $stmt->error);
	}

	$stmt = $conn->prepare("DELETE FROM `project-user` WHERE userid = ?");
	$stmt->bind_param("i", $userid);
	if (!$stmt->execute()) {
		throw new Exception("Erro ao remover relação projeto-usuário: " . $stmt->error);
	}

	$stmt = $conn->prepare("DELETE FROM `user` WHERE userid = ?");
	$stmt->bind_param("i", $userid);
	if ($stmt->execute()) {
		echo "Usuário excluído com sucesso!";
	} else {
		throw new Exception("Erro ao excluir usuário: " . $stmt->error);
	}
} catch (Exception $e) {
	echo "Erro: " . $e->getMessage();
}

header('location:index.php');
