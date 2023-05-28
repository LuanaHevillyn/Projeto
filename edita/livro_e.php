<?php 
	
	include_once '../form_edita/livro_fe.php';
	include_once '../conexoes/conexao.php';

	//pega o nome da Editora de acordo com o id
	$id = $_GET['id'];
	@$nomeEditora = $_POST['nomeEditora'];
	@$editora_tabela = "SELECT * FROM livro WHERE id = '$nomeEditora' ";
	@$sql_query = $conn->query($editora_tabela);
	@$dados_editora = $sql_query->fetch_assoc();
	@$dados_nome = $dados_editora['nome'];

	//seleciona a coluna alugados e verifica quais são maiores que 0 
	@$editora_tabela = "SELECT alugados FROM livro WHERE alugados > 0";
	@$sql_query = $conn->query($editora_tabela);
	@$dados_editora = $sql_query->fetch_assoc();
	@$alugados_nome = $dados_editora['alugados'];


	//verifica a existência de uma variável de acordo com o preenchido no input
	$nome = isset($_POST['nome'])?$_POST['nome']:"";		
	$autor = isset($_POST['autor'])?$_POST['autor']:"";
	$dLancamento = isset($_POST['dLancamento'])?$_POST['dLancamento']:"";
	$estoque = isset($_POST['estoque'])?$_POST['estoque']:"";

	//se o estoque for maior que os livros alugados ou maior que 0 ele executa
	if ($estoque < $alugados_nome or $estoque == 0) {
		echo "
		<script>alert('Coloque mais no estoque!')</script>;";
		

	}else {
		$alterar = $conn->query("update livro set nome = '$nome', autor = '$autor', editora = '$nomeEditora', dLancamento = '$dLancamento', estoque ='$estoque' where id='$id'");

		header("location: ../mostrar/livro_m.php");
	}
?>