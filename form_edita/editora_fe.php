<?php 
	include_once '../conexoes/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Painel Editora</title>
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
	
		$consultar = $conn->query("SELECT * FROM editora WHERE id='$id'");

		while($dados = $consultar->fetch_assoc()){
			$nome   = $dados['nome'];
			$email	= $dados['email'];
			$telefone = $dados['telefone'];
			$sitee  = $dados['sitee'];
		}
	?>


<br><br><br>

<center>
    				<form action="../edita/editora_e.php?id=<?php echo $id;?>" method="post" accept-charset="utf-8" >

    					<label for="nome">Nome:</label>
    					<input type="text" name="nome" value="<?php echo $nome;?>">
    						
    					<label for="email">E-mail:</label>
    					<input type="text" name="email" value="<?php echo $email;?>">

    					<label for="telefone">telefone:</label>
    					<input type="text" name="telefone" value="<?php echo $telefone;?>">

						<label for="sitee">Site:</label>
    					<input type="text" name="sitee" value="<?php echo $sitee;?>">

    					<br>
    					<input type="submit" name="btn" value="ALTERAR">
						<a href="../mostrar/editora_m.php">Cancelar</a>


    				</form>
</center>
</body>
</html>