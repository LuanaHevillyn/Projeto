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
	<link rel="stylesheet" href="../css/CadastroCData.css" media="only screen">
</head>
<body> 
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

<div class="container-fluid">
    				<form action="../edita/usuario_e.php?id=<?php echo $id;?>" method="post" accept-charset="utf-8" autocomplete="off">
					<img src="../imgs/cadastroimg.png" class="cadastroimg" >

					<br><label for="nome">Nome:</label>
    					<input type="text" name="nome" class="form-control" value="<?php echo $nome;?>">
    						
    					<label for="email">E-mail:</label>
    					<input type="text" name="email" class="form-control" value="<?php echo $email;?>">

    					<label for="celular">Celular:</label>
    					<input type="text" name="celular" id="telefone"  maxlength="15" class="form-control" value="<?php echo $celular;?>">

						<label for="endereco">Endereco:</label>
    					<input type="text" name="endereco" class="form-control" value="<?php echo $endereco;?>">

    					<label for="cpf">CPF:</label>
    					<input type="text" name="cpf" class="form-control" value="<?php echo $cpf;?>">

    					<br>
						<input type="submit" name="btn" value="Alterar" class="btn btn-light">
						<button type="button" class="btn btn-light" onclick="window.location.href = '../mostrar/usuario_m.php'">Cancelar</button>

    				</form>
</div>
<script>	
	function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id( el ){
	return document.getElementById( el );
}
window.onload = function(){
	id('telefone').onkeyup = function(){
		mascara( this, mtel );
	}
}</script>
</body>
</html>