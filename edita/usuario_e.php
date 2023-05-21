<?php 
	
	include_once '../form_edita/usuario_fe.php';
	include_once '../conexoes/conexao.php';

	$id = $_GET['id'];
	$nome  = isset($_POST['nome'])?$_POST['nome']:"";
	$email   = isset($_POST['email'])?$_POST['email']:"";
	$celular = isset($_POST['celular'])?$_POST['celular']:"";
    $endereco  = isset($_POST['endereco'])?$_POST['endereco']:"";
	$cpf   = isset($_POST['cpf'])?$_POST['cpf']:"";

	$alterar = $conn->query("update usuarioaluga set nome = '$nome', email = '$email', celular = '$celular', endereco = '$endereco', cpf = '$cpf' where id='$id'");
	
	if(mysqli_affected_rows($conn) > 0){
		header("location: ../mostrar/usuario_m.php");
	}
	