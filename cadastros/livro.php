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

<nav class="navbar">
    <div class="container-fluid">
        <img src="../imgs/Logo.png" class="Logo">

        <ul class="nav nav-underline">
            <li class="nav-item">
                <a class="nav-link"  href="../cadastros/editora.php">Editora</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../cadastros/aluguel.php">Aluguel</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link active" media="only screen" style="color: white; font-family: 'Montserrat'; font-weight: 900;" aria-current="page" href="#">Livro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../cadastros/usuario.php">Usuário</a>
            </li>
        </ul>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">MENU</h5>
         
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../mostrar/editora_m.php">Relatórios</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="../principal/dashboard.php">Dashboard</a>
                </li>
               
            </ul>
        </div>
    </div>
</nav>


<div class="container-fluid">

    <form action="../processa/livro_p.php" method="post" accept-charset="utf-8" autocomplete="off" class="needs-validation" novalidate>

                        <img src="../imgs/cadastroimg.png" class="cadastroimg" >

    						
                            <br><label for="nome">Nome:</label>
                            <input type="text"  class="form-control" name="nome" required>
                            <div class="invalid-feedback">
								Digite o nome do livro!
							</div>


                            <label for="autor">Autor:</label>
    						<input type="text"  class="form-control" name="autor" required>
                            <div class="invalid-feedback">
								Digite o autor do livro!
							</div>

		
                            <label for="editora">Editora:</label>
    						<select name="nomeEditora" class="form-select" required>
								<option disabled selected value="">Selecione Editora</option>

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
                            <div class="invalid-feedback">
								Selecione a editora!
							</div>

                            <label for="dLancamento">Data de Lançamento:</label>

    						<input type="text" class="form-control" name="dLancamento" id="calendario" required>
                            <div class="invalid-feedback">
								Escolha a data de lançamento!
							</div>
							<div id="datepicker-container" class="datepicker-container">
        
                            <label for="estoque">Estoque:</label>
    						<input type="text"  class="form-control" name="estoque" required>
                            <div class="invalid-feedback">
								Digite a quantidade do estoque!
							</div>

    						<br>

    						<input type="submit" class="btn btn-light">
							
                        </form>
				</div>


<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
<script>
(() => {
'use strict'

const forms = document.querySelectorAll('.needs-validation')

Array.from(forms).forEach(form => {
	form.addEventListener('submit', event => {
	if (!form.checkValidity()) {
		event.preventDefault()
		event.stopPropagation()
	}

	form.classList.add('was-validated')
	}, false)
})
})()
            
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
