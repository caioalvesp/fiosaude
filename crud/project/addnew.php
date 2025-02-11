<?php
	include('../conn.php');
	
	
	$name=$_POST['name'];
	
	$stmt = $conn->prepare("INSERT INTO project (name) VALUES (?)");
	$stmt->bind_param("s", $name);

	if ($stmt->execute()) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Erro ao inserir registro: " . $stmt->error;
}


	header('location:index.php');

?>