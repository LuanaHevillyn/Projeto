<?php 
 
include_once '../conexoes/conexao.php';

		@$nomeLivro = $_POST['nomeLivro'];

		@$livro_tabela = "SELECT * FROM livro WHERE id = '$nomeLivro' ";

		@$sql_query = $conn->query($livro_tabela);

		@$dados_livro = $sql_query->fetch_assoc();
		@$livro_qtd = $dados_livro['estoque'];


		@$nomeUsu = $_POST['nomeUsu'];

		@$usuario_tabela = "SELECT * FROM livro WHERE id = '$nomeUsu' ";

		@$sql_query = $conn->query($usuario_tabela);

		@$dados_usuario = $sql_query->fetch_assoc();
	

		$dAluguel = isset($_POST['dAluguel']) == true ?$_POST['dAluguel']:"";

		if( @$livro_qtd > 0 ){

			$sql =  "INSERT INTO aluguel (nomeLivro, nomeUsu, dAluguel) VALUES ('$nomeLivro', '$nomeUsu', '$dAluguel')";

			$update_query = "update livro set disponiveis = estoque, disponiveis = estoque - 1, alugados = alugados + 1, estado = 'alugado' where id = '$nomeLivro' ";
			mysqli_query($conn, $update_query);

			$update_mysqli = "update usuarioaluga set estado = 'alugando', alugueis = alugueis + 1 where id = '$nomeUsu' ";
			mysqli_query($conn, $update_mysqli);

		if ($conn->query($sql) == TRUE) {

			header('Location: ../mostrar/usuario_m.php');

		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();		    
	}
		else{
			echo "<script>alert('tem 0 no estoque');</script>";
			exit;
		}
?>
