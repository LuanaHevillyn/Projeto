<?php 
	include_once '../conexoes/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Painel Usuário</title>
	<style>html, body {height: 100%; margin: 0; padding: 0;}</style>
	<meta charset="utf-8">
</head>
<body>

<header style="background-color: black; padding: 40px">
	<center><h3 style="color: white;">ALTERAR DADOS </h3> </center>
</header>

	<?php 

		include_once '../conexoes/conexao.php';

		$id = $_GET['id'];
	
		$consultar = $conn->query("SELECT * FROM usuarioaluga WHERE id='$id'");

		while($dados = $consultar->fetch_assoc()){
			$nome   = $dados['nome'];
			$email	= $dados['email'];
			$celular = $dados['celular'];
			$endereco  = $dados['endereco'];
			$cpf   = $dados['cpf'];
		}
	?>

<br><br><br>

<center>
    				<form action="../edita/usuario_e.php?id=<?php echo $id;?>" method="post" accept-charset="utf-8" >

    					<label for="nome">Nome:</label>
    					<input type="text" name="nome" id="nome" value="<?php echo $nome;?>">
    						
    					<label for="email">email:</label>
    					<input type="text" name="email" id="email" value="<?php echo $email;?>">

    					<label for="celular">celular:</label>
    					<input type="text" name="celular" id="celular" value="<?php echo $celular;?>">

						<label for="endereco">endereco:</label>
    					<input type="text" name="endereco" id="endereco" value="<?php echo $endereco;?>">

    					<label for="cpf">cpf:</label>
    					<input type="text" name="cpf" id="cpf" value="<?php echo $cpf;?>">

    					<br>
    					<input type="submit" name="btn" value="ALTERAR">
    					<a href="../mostrar/usuario_m.php">Cancelar</a>

    				</form>
</center>
</body>
</html>