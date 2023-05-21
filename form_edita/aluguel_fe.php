<?php 
	include_once '../conexoes/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Painel Editora</title>
	<meta charset="utf-8">
</head>
<body>
	<?php 

		include_once '../conexoes/conexao.php';

		$id = $_GET['id'];
	
		$consultar = $conn->query("SELECT * FROM aluguel WHERE id='$id'");

		while($dados = $consultar->fetch_assoc()){
            $nomeLivro  = $dados['nomeLivro'];            
            $tempoDevolucao = $dados['tempoDevolucao'];
            $nomeUsu   = $dados['nomeUsu'];

		}
	?>

ALTERAR DADOS

    				<form action="../edita/aluguel_e.php?id=<?php echo $id;?>" method="post" accept-charset="utf-8" >

    					<label for="nomeLivro">Nome do Livro:</label>
    					<input type="text" name="nomeLivro" value="<?php echo $nomeLivro;?>">
    						
    					<label for="nomeUsu">Nome do Usuário:</label>
    					<input type="text" name="nomeUsu" value="<?php echo $nomeUsu;?>">

    					<label for="tempoDevolucao">Tempo de devolução:</label>
    					<input type="text" name="tempoDevolucao" value="<?php echo $tempoDevolucao;?>">

    					<br>
    					<input type="submit" name="btn" value="ALTERAR">
    					<a href="../mostrar/aluguel_m.php">Cancelar</a>

    				</form>
</body>
</html>