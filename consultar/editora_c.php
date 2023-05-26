<?php 

include_once '../conexoes/conexao.php';

	// CONSULTA DO INPUT DE NOME CONFERE
	@$confere = $conn->real_escape_string($_GET['confere']);
	$sql_code = "SELECT * 
		FROM editora
		WHERE id LIKE '%$confere%' 
		OR nome LIKE '%$confere%'";


	$sql_query = $conn->query($sql_code) or die("ERRO ao consultar! " . $conn->error);  // Se der erro 
	
	if ($sql_query->num_rows == 0) {// Se a pesquisa não encontrar nada
		?>

	<tr>
		<td colspan="3">Nenhum resultado encontrado...</td>
	</tr>

	<?php
		// Se o usuário não pesquisar nada
	} else {
		while($dados = $sql_query->fetch_assoc()) {

		$id 	= $dados['id'];
		$nome 	= $dados['nome'];
		$email	= $dados['email'];
		$telefone 	= $dados['telefone'];
		$sitee	= $dados['sitee'];


		
		echo "<tr>";
			echo "<th scope='row'>$id <td>$nome<td>$email<td>$telefone <td>$sitee";
			echo "<th scope='row'><a href='../form_edita/editora_fe.php?id=$id' class='btn'><img style='width: 100%;' src='../imgs/editar.png'></a>";
			echo "<th scope='row'><button class='btn' onclick='return funcao1();'><img class='delete' src='../imgs/delete.png'></button>
			
			<script>
			function funcao1(){

				if (confirm('A editora será excluída!') == true) {
					
					window.location.href = '../deletar/deletarEditora.php?id=$id';

				} else {

					window.location.href = '../mostrar/editora_m.php';
				}
			}
			</script>";
		echo "<tr>";
	}
}

?>
