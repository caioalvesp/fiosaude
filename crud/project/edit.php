<?php
	include('../conn.php');
	
	$projectid=$_GET['id'];
	$name = $_POST['name'];

	$stmt = $conn->prepare("UPDATE project SET name = ? WHERE projectid = ?");
	$stmt->bind_param("ss", $name, $projectid);

	if ($stmt->execute()) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Erro ao inserir registro: " . $stmt->error;
}
	header('location:index.php');

?>