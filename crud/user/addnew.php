<?php
	include('../conn.php');
	
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$address=$_POST['address'];
	
	$stmt = $conn->prepare("INSERT INTO user (firstname, lastname, address) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $firstname, $lastname, $address);

	if ($stmt->execute()) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Erro ao inserir registro: " . $stmt->error;
}


	header('location:index.php');

?>