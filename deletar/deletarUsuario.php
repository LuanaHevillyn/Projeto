<?php 
	include_once '../conexoes/conexao.php';

	$id = $_GET['id'];

	$consulta = "SELECT * FROM usuarioaluga WHERE id = '$id'";
	$resultado_consulta = mysqli_query($conn, $consulta);   
	$row = mysqli_fetch_assoc($resultado_consulta);
	$livros_estoque = $row['estado'];
	
	if ("$livros_estoque" == 'semAluguel') {
		
		$deletar = $conn->query("DELETE FROM usuarioaluga WHERE id='$id'");
		
		echo "<script>alert('Usuário deletado!');</script>";

		header("Refresh: 1; url= ../mostrar/usuario_m.php");


	}else{

		echo "<script>alert('O usuário está alugando!');</script>";
		header("Refresh: 1; url= ../mostrar/usuario_m.php");

	}

		

?>