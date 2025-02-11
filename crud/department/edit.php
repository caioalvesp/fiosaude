<?php
	include('../conn.php');
	
	$departmentid=$_GET['id'];
	$name = $_POST['name'];

	$stmt = $conn->prepare("UPDATE department SET name = ? WHERE departmentid = ?");
	$stmt->bind_param("ss", $name, $departmentid);

	if ($stmt->execute()) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Erro ao inserir registro: " . $stmt->error;
}
	header('location:index.php');

?>