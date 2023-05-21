<?php 

	$conn = mysqli_connect("localhost", "root", "", "locadorasite"); //or die ("Erro de Conexão.")
	$conn->set_charset('utf8'); 

	if(!$conn){
			die("Falha na conexao: " . mysqli_connect_error());
		}else{
		echo "Conexao realizada com sucesso";
	}
?>