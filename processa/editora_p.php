<?php 
 
include_once '../conexoes/conexao.php';


	$nome 	= isset($_POST['nome']) == true ?$_POST['nome']:"";
	$email	= isset($_POST['email']) == true ?$_POST['email']:"";
	$telefone  = isset($_POST['telefone']) == true ?$_POST['telefone']:"";
	$sitee = isset($_POST['sitee']) == true ?$_POST['sitee']:"";

	//inserir dados no banco de dados.

	$sql = "INSERT INTO editora (nome, email, telefone, sitee) VALUES ('$nome', '$email', '$telefone', '$sitee')";

		if ($conn->query($sql) == TRUE) {

			header('Location: ../mostrar/editora_m.php');

		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

?>