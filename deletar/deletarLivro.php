<?php 
	include_once '../conexoes/conexao.php';

	$id = $_GET['id'];

	$consulta = "SELECT * FROM livro WHERE id = '$id'";
	$resultado_consulta = mysqli_query($conn, $consulta);   
	$row = mysqli_fetch_assoc($resultado_consulta);
	$livros_estoque = $row['estado'];


	if ("$livros_estoque" == 'disponivel') {

		$deletar = $conn->query("DELETE FROM livro WHERE id='$id'");
		
		echo "<script>alert('Livro deletado!');</script>";

		header("Refresh: 1; url= ../mostrar/livro_m.php");

	}else{

		echo "<script>alert('Alguém está alugando o livro!');</script>";
		header("Refresh: 1; url= ../mostrar/livro_m.php");

	}

?>