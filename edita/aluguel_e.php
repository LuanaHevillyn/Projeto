<?php 

	include_once '../form_edita/aluguel_fe.php';
	include_once '../conexoes/conexao.php';

	$id = $_GET['id'];
	$nomeLivro  = isset($_POST['nomeLivro'])?$_POST['nomeLivro']:"";	
	$nomeUsu   = isset($_POST['nomeUsu'])?$_POST['nomeUsu']:"";    
	$tempoDevolucao = isset($_POST['tempoDevolucao'])?$_POST['tempoDevolucao']:"";


	$alterar = $conn->query("update aluguel set nomeLivro = '$nomeLivro',  nomeUsu = '$nomeUsu', tempoDevolucao = '$tempoDevolucao' where id='$id'");


	if(mysqli_affected_rows($conn) > 0){
		header("location: ../mostrar/aluguel_m.php");
	}
	