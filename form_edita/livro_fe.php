<?php 
	include_once '../conexoes/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Painel Editora</title>
	<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
	<style>html, body {height: 100%; margin: 0; padding: 0;}</style>
	<link rel="stylesheet" href="../css/cadastroCData.css" media="only screen">
</head>
<body> 
	<?php 

		include_once '../conexoes/conexao.php';

		$id = $_GET['id'];
	
		$consultar = $conn->query("SELECT * FROM livro WHERE id='$id'");

		while($dados = $consultar->fetch_assoc()){
			$nome   = $dados['nome'];
			$autor	= $dados['autor'];
			$editora = $dados['editora'];
			$dLancamento = $dados['dLancamento'];
			$estoque   = $dados['estoque'];
		}
	?>

<div class="container-fluid">
		<form action="../edita/livro_e.php?id=<?php echo $id;?>" method="post" accept-charset="utf-8" autocomplete="off">
		<img src="../imgs/cadastroimg.png" class="cadastroimg" >
		
		<br><label for="nome">Nome:</label>
    		<input type="text" name="nome" class="form-control" value="<?php echo $nome;?>">
    						
    		<label for="autor">Autor:</label>
    		<input type="text" name="autor" class="form-control" value="<?php echo $autor;?>">

			<label for="autor">Editora:</label>
			<select name="nomeEditora" class="form-select" required>
				<option value="<?php echo $editora;?>"><?php echo $editora;?></option>

				<?php

				include_once '../conexoes/conexao.php';

				$sql_s = "SELECT * FROM editora";

				$result = $conn -> query($sql_s);
				
				while ($row_nome = $result->fetch_assoc()){ ?>

				<option value="<?php echo $row_nome['id']; ?>">
								
					<?php echo $row_nome['id'] ?>

				</option>

					<?php
				}	
					?>
				</select>



    			<label for="dLancamento">Data do Lançamento:</label>
				<input type="text" class="form-control" name="dLancamento" value="<?php echo $dLancamento;?>" id="calendario">

    			<label for="estoque">Estoque:</label>
    			<input type="text" name="estoque" class="form-control" id="estoque" value="<?php echo $estoque;?>">


    			<br>
    			<input type="submit" name="btn" value="Alterar" class="btn btn-light">
				<button type="button" class="btn btn-light" onclick="window.location.href = '../mostrar/livro_m.php'">Cancelar</button>

    	</form>
</div>
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
<script>
            
$(function() {
	$( "#calendario" ).datepicker({dateFormat: 'dd-mm-yy',
	changeMonth: true,
	changeYear: true,
	dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
	dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
	dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
	monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
	monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
				
});
});
</script>
</body>
</html>