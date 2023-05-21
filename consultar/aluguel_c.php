<?php 

include_once '../conexoes/conexao.php';

	// CONSULTA DO INPUT DE NOME CONFERE
	@$confere = $conn->real_escape_string($_GET['confere']);
	$sql_code = "SELECT * 
		FROM aluguel
		WHERE id LIKE '%$confere%' 
		OR nomeLivro LIKE '%$confere%'
		OR nomeUsu LIKE '%$confere%'
		OR dAluguel LIKE '%$confere%'";


	$sql_query = $conn->query($sql_code) or die("ERRO ao consultar! " . $conn->error); // Se der erro 
	
	if ($sql_query->num_rows == 0) {// Se a pesquisa não encontrar nada
		?>

	<tr>
		<td colspan="3">Nenhum resultado encontrado...</td>
	</tr>

	<?php
	} else {
		// Se o usuário não pesquisar nada
	while ($dados = $sql_query->fetch_assoc()) {

		$id 	= $dados['id'];
		$nomeLivro	= $dados['nomeLivro'];
		$nomeUsu 	= $dados['nomeUsu'];
		$dAluguel	= $dados['dAluguel'];
		$dDevolucao	= $dados['dDevolucao'];
		$estado	= $dados['estado'];

		echo "<tr>";
			echo "<th scope='row'>$id <td>$nomeLivro <td>$nomeUsu <td>$dAluguel <td>$dDevolucao<td>$estado";
			echo "<th scope='row'><a href='../form_edita/devolucao_fe.php?id=$id' class='btn'>Devolver</a>";
			echo "<th scope='row'><a href='../deletar/deletarLivro.php?id=$id' class='btn'>Excluir</a>";
		echo "<tr>";
	}
}

?>
