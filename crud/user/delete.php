<?php
	include('../conn.php');


	$userid=$_GET['id'];
	
	$stmt = $conn->prepare("DELETE from user WHERE userid = ?");
	$stmt->bind_param("s", $userid);

	if ($stmt->execute()) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Erro ao inserir registro: " . $stmt->error;
}


	header('location:index.php');

?>