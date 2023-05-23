<?php 

include_once '../conexoes/conexao.php';

	// CONSULTA DO INPUT DE NOME CONFERE
	@$confere = $conn->real_escape_string($_GET['confere']);
	$sql_code = "SELECT * 
		FROM usuarioaluga
		WHERE nome LIKE '%$confere%'";


	$sql_query = $conn->query($sql_code) or die("ERRO ao consultar! " . $conn->error);  // Se der erro 
	
	if ($sql_query->num_rows == 0) {// Se a pesquisa não encontrar nada
		?>
	<tr>
		<td colspan="3">Nenhum resultado encontrado...</td>
	</tr>
	<?php
	} else {
		// Se o usuário não pesquisar nada
		while($dados = $sql_query->fetch_assoc()) {
		

		$id 	= $dados['id'];
		$nome   = $dados['nome'];
		$email	= $dados['email'];
		$celular = $dados['celular'];
		$endereco  = $dados['endereco'];
		$cpf   = $dados['cpf'];
		$estado   = $dados['estado'];

		echo "<tr>";
			echo "<th scope='row'>$id <td>$nome <td>$email <td>$celular <td>$endereco <td>$cpf <td>$estado";
			echo "<th scope='row'><a href='../form_edita/usuario_fe.php?id=$id' class='btn'><img style='width: 100%;' src='../imgs/editar.png'></a>";
			echo "<th scope='row'><button class='btn' onclick='return funcao1();'><img style='width: 50%;' src='../imgs/delete.png'></button>
			
			<script>
			function funcao1(){

				if (confirm('O usuário será deletado!') == true) {
					
					window.location.href = '../deletar/deletarUsuario.php?id=$id';

				} else {

					window.location.href =  '../mostrar/usuario_m.php';
				}
			}
			</script>";
		echo "<tr>";
	
	}
}	

?>


				
