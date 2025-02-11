<?php
	include('../conn.php');
	
	$departmentid=$_GET['id'];
	$stmt = $conn->prepare("DELETE from department WHERE departmentid = ?");
	$stmt->bind_param("s", $departmentid);

	if ($stmt->execute()) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Erro ao inserir registro: " . $stmt->error;
}


	header('location:index.php');
?>