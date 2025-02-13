<?php
include('../conn.php');
$userid = $_GET['id'];

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$salary = $_POST['salary'];
$departmentid = $_POST['department_id'];
$projects = isset($_POST['projects']) ? $_POST['projects'] : [];


$conn->begin_transaction();

try {
	$stmt = $conn->prepare("UPDATE user SET firstname = ?, lastname = ?, address = ?, salary = ? WHERE userid = ?");
	$stmt->bind_param("sssii", $firstname, $lastname, $address, $salary, $userid);
	if (!$stmt->execute()) {
		throw new Exception("Erro ao atualizar usuário: " . $stmt->error);
	}

	$stmt = $conn->prepare("UPDATE `department-user` SET departmentid = ? WHERE userid = ?");
	$stmt->bind_param("ii", $departmentid, $userid);
	if (!$stmt->execute()) {
		throw new Exception("Erro ao atualizar relação de departamento: " . $stmt->error);
	}

	$stmt = $conn->prepare("DELETE FROM `project-user` WHERE userid = ?");
	$stmt->bind_param("i", $userid);
	if (!$stmt->execute()) {
		throw new Exception("Erro ao remover projetos antigos: " . $stmt->error);
	}

	if (!empty($projects)) {
		$stmt = $conn->prepare("INSERT INTO `project-user` (projectid, userid) VALUES (?, ?)");
		foreach ($projects as $projectid) {
			$stmt->bind_param("ii", $projectid, $userid);
			if (!$stmt->execute()) {
				throw new Exception("Erro ao adicionar novo projeto: " . $stmt->error);
			}
		}
	}

	$conn->commit();
	echo "Registro atualizado com sucesso!";
} catch (Exception $e) {
	$conn->rollback();
	echo "Erro: " . $e->getMessage();
}

header('location:index.php');
exit;
