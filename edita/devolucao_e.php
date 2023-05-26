<?php 

	include_once '../form_edita/devolucao_fe.php';
	include_once '../conexoes/conexao.php';


	$id = $_GET['id'];
	@$nomeLivro = $_POST['nomeLivro'];
	@$query_atrasado = "SELECT * FROM livro WHERE id = '$nomeLivro' ";
	@$sql_query = $conn->query($query_atrasado);
	@$dados_livros = $sql_query->fetch_assoc();
	@$livros_alugueis = $dados_livros['alugados'];
	@$livros_estoque = $dados_livros['estoque'];

	@$nomeUsu = $_POST['nomeUsu'];
	@$query_alugueis = "SELECT * FROM usuarioaluga WHERE id = '$nomeUsu' ";
	@$sql_query = $conn->query($query_alugueis);
	@$dados_editora = $sql_query->fetch_assoc();
	@$dados_alugueis = $dados_editora['alugueis'];

	$prevDevolucao   = isset($_POST['prevDevolucao'])?$_POST['prevDevolucao']:"";    
	$dDevolucao = isset($_POST['dDevolucao'])?$_POST['dDevolucao']:"";

	if ($livros_estoque > 0) {
		$modificar = $conn->query("UPDATE aluguel SET dDevolucao = '$dDevolucao'  WHERE id='$id'");

		$alterar = $conn->query("UPDATE livro SET disponiveis = estoque + 1, alugados = alugados - 1 WHERE id='$nomeLivro'");

		$mudar = $conn->query("UPDATE usuarioaluga SET alugueis = alugueis - 1 WHERE id = '$nomeUsu' ");
		header("location: ../mostrar/aluguel_m.php");
	}

	if ($livros_alugueis == 1) {

		$alterar = $conn->query("UPDATE livro SET estado = 'disponivel' WHERE id='$nomeLivro'");

	}

	if ($dados_alugueis == 1) {

		$alterar = $conn->query("UPDATE usuarioaluga SET estado = 'semAluguel' WHERE id='$nomeUsu'");

	}
	if($prevDevolucao < $dDevolucao){

		$modificar = $conn->query("UPDATE aluguel SET estado = 'foraPrazo'  WHERE id='$id'");

		

	}else{

		$modificar = $conn->query("UPDATE aluguel SET estado = 'noPrazo'  WHERE id='$id'");
	}
	

	if(mysqli_affected_rows($conn) > 0){
		header("location: ../mostrar/aluguel_m.php");
	}
	
	


?>