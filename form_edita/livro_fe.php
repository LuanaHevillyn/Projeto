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
	
		$consultar = $conn->query("SELECT * FROM livro WHERE id='$id'");

		while($dados = $consultar->fetch_assoc()){
			$nome   = $dados['nome'];
			$autor	= $dados['autor'];
			$dLancamento = $dados['dLancamento'];
			$estoque   = $dados['estoque'];
		}
	?>

<br><br><br>
<center>
		<form action="../edita/livro_e.php?id=<?php echo $id;?>" method="post" accept-charset="utf-8" >

    		<label for="nome">Nome:</label>
    		<input type="text" name="nome" id="nome" value="<?php echo $nome;?>">
    						
    		<label for="autor">autor:</label>
    		<input type="text" name="autor" id="autor" value="<?php echo $autor;?>">

			<label for="autor">Editora:</label>
			<select name="nomeEditora" class="inputE" required>
				<option disable>Selecione Editora</option>

				<?php

				include_once '../conexoes/conexao.php';

				$sql_s = "SELECT * FROM editora";

				$result = $conn -> query($sql_s);
				
				while ($row_nome = $result->fetch_assoc()){ ?>

				<option value="<?php echo $row_nome['id']; ?>">
								
					<?php echo $row_nome['nome'] ?>

				</option>

					<?php
				}	
					?>
				</select>



    			<label for="dLancamento">celular:</label>
    			<input type="text" name="dLancamento" id="dLancamento" value="<?php echo $dLancamento;?>">

    			<label for="estoque">estoque:</label>
    			<input type="text" name="estoque" id="estoque" value="<?php echo $estoque;?>">


    			<br>
    			<input type="submit" name="btn" value="ALTERAR">
    			<a href="../mostrar/livro_m.php">Cancelar</a>

    	</form>
</center>
</body>
</html>