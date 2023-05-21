<?php 
	
	include_once '../form_edita/editora_fe.php';
	include_once '../conexoes/conexao.php';

	$id = $_GET['id'];
	$nome  = isset($_POST['nome'])?$_POST['nome']:"";
	$email   = isset($_POST['email'])?$_POST['email']:"";
	$telefone = isset($_POST['telefone'])?$_POST['telefone']:"";
	$sitee   = isset($_POST['sitee'])?$_POST['sitee']:"";

	$alterar = $conn->query("update editora set nome = '$nome', email = '$email', telefone = '$telefone', sitee = '$sitee' where id='$id'");
	
	if(mysqli_affected_rows($conn) > 0){
		header("location: ../mostrar/editora_m.php");
	}
?>