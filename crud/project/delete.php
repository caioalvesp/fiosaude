<?php
	include('../conn.php');
	
	$projectid=$_GET['id'];
	$stmt = $conn->prepare("DELETE from project WHERE projectid = ?");
	$stmt->bind_param("s", $projectid);

	if ($stmt->execute()) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Erro ao inserir registro: " . $stmt->error;
}


	header('location:index.php');
?>