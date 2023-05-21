<?php 
 
include_once '../conexoes/conexao.php';


@$nomeEditora = $_POST['nomeEditora'];
@$editora_tabela = "SELECT * FROM livro WHERE id = '$nomeEditora' ";
@$sql_query = $conn->query($editora_tabela);
@$dados_editora = $sql_query->fetch_assoc();
@$dados_nome = $dados_editora['nome'];

$nome = isset($_POST['nome'])?$_POST['nome']:"";		
$autor = isset($_POST['autor'])?$_POST['autor']:"";
$dLancamento = isset($_POST['dLancamento'])?$_POST['dLancamento']:"";
$estoque = isset($_POST['estoque'])?$_POST['estoque']:"";

if (@$estoque == 0) {
	
	echo "<script>alert('Não é permitido colocar 0 no estoque!');</script>";

	header("Refresh: 1; url= ../cadastros/livro.php");

}else {
	$sql = "INSERT INTO livro (nome, autor, editora, dLancamento, estoque) VALUES ('$nome', '$autor', '$nomeEditora', '$dLancamento', '$estoque')";
	mysqli_query($conn, $sql);

	header("Refresh: 1; url= ../mostrar/livro_m.php");
}


