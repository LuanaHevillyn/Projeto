<?php 
 //$conn = mysqli_connect("localhost", "id20734387_luana", "gmaWjfk#aduO1rE^", "id20734387_locadorasite");
	$conn = mysqli_connect("localhost", "root", "", "locadorasite"); //or die ("Erro de Conexão.");
	//$conn->set_charset('utf8'); //Configurar acentuação dentro do banco de dados.

	if(!$conn){
			die("Falha na conexao: " . mysqli_connect_error());
		}else{
		
		//echo "Conexão realizada com sucesso...";
	}

?>