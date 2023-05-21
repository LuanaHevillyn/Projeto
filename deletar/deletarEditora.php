<?php 

	include_once '../conexoes/conexao.php';

	$id = $_GET['id'];
	$deletar = $conn->query("DELETE FROM editora WHERE id='$id'");

			
	echo "<script>alert('Editora deletada!');</script>";

	header("Refresh: 1; url= ../mostrar/editora_m.php");


?>