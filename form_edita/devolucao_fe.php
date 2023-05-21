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
	<center><h3 style="color: white;">DEVOLVA O LIVRO</h3> </center>
</header>

	<?php 

		include_once '../conexoes/conexao.php';

		@$id = $_GET['id'];
	
		$consultar = $conn->query("SELECT * FROM aluguel WHERE id='$id'");

		while($dados = $consultar->fetch_assoc()){
			$nomeLivro   = $dados['nomeLivro'];
			$nomeUsu	= $dados['nomeUsu'];
			$dAluguel = $dados['dAluguel'];
			@$dDevolucao	   = $dados['dDevolucao	'];
		}
	?>

<br><br><br>
<center>
		<form action="../edita/devolucao_e.php?id=<?php echo $id;?>" method="post" accept-charset="utf-8" >
				<label for="nomeLivro">Nome do livro:</label>

					<select name="nomeLivro" required>
					<option disable>Selecione Livro</option>

					<?php

					include_once '../conexoes/conexao.php';

					$sql_s = "SELECT * FROM livro";

					$result = $conn -> query($sql_s);

					while ($row_nome = $result->fetch_assoc()){ ?>

					<option value="<?php echo $row_nome['id']; ?>">
					
					<?php echo $row_nome['nome'] ?>

					</option>

					<?php
					}
					
					?>
					
				</select>
				
				<label for="nomeUsu">Seu nome:</label>

				<select class="inputN" name="nomeUsu" required>
					<option disable>Selecione Nome</option>

					<?php

					include_once '../conexoes/conexao.php';

					$sql_s = "SELECT * FROM usuarioaluga";

					$result = $conn -> query($sql_s);

					while ($row_nome = $result->fetch_assoc()){ ?>

					<option value="<?php echo $row_nome['id']; ?>">
					
					<?php echo $row_nome['nome'] ?>

					</option>

					<?php
					}
					
					?>
				</select>



				

				<label for="dAluguel">Data do Aluguel:</label>
				<input type="date" class="inputN"  name="dAluguel" required>
				
						

    			<label for="dDevolucao">dDevolucao:</label>
    			<input type="date" name="dDevolucao" id="dDevolucao" value="<?php echo $dDevolucao;?>">

				<script>
					const dDevolucaoinput = document.getElementById("dDevolucao");
					//Valor input Data

					const prazo = 30;
					//Valor do prazo 

					dDevolucaoinput.addEventListener('change', function(){
					//Registra uma espera de evento com um alvo

					const dDevolucao = new Date(this.value);
					//passa o valor da variável como argumento

					const dataLimite = new Date();
					//DATA VAZIA
					//inicializa um objeto

					const dataAtrasada = new Date();

					dataLimite.setDate(dataLimite.getDate() + prazo);
					//pega a data vazia e soma com o prazo

					dataAtrasada.setDate(dataAtrasada.getDate());

					if (dDevolucao > dataLimite) {
					//se a data de devolucao for maior que 30

					alert("o prazo limite é de 30 dias. selecione outro.");

					this.value = "";
					//Limpa o campo
					}

					if (dDevolucao < dataAtrasada) {
						alert("DEVOLUÇÃO ATRASADA");				
					}

					});
				</script>

				//ESTAO TROCADOS !!!!!!!!!!!!!!!!!!!

    			<br>
    			<input type="submit" name="btn" value="Devolver">
				<a href="../mostrar/aluguel_m.php">Cancelar</a>

    	</form>
</center>
</body>
</html>