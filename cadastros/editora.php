<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Painel Editora</title>
	<meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous" defer></script>
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
                <a class="nav-link active" media="only screen" style="color: white; font-family: 'Montserrat'; font-weight: 900;" aria-current="page" href="#">Editora</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../cadastros/aluguel.php">Aluguel</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="../cadastros/livro.php">Livro</a>
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

    <form action="../processa/editora_p.php" method="post" accept-charset="utf-8" autocomplete="off" class="needs-validation" novalidate>
    					
                        <img src="../imgs/cadastroimg.png" class="cadastroimg" >

                            <br><label for="nome">Nome:</label>
                            <input type="text" class="form-control" name="nome" required>
							<div class="invalid-feedback">
								Digite seu nome!
							</div>

                            <label for="email">Email:</label>
    						<input type="email" class="form-control" name="email" required>
                            <div class="invalid-feedback">
								Digite seu e-mail!
							</div>
							
                            <label for="telefone">Telefone:</label>
    						<input type="text" class="form-control" name="telefone" id="telefone"  maxlength="15" required>
                            <div class="invalid-feedback">
								Digite seu telefone!
							</div>

                            <label for="sitee">Site:</label>
    						<input type="text" class="form-control" name="sitee">
                    
                            
    						<input type="submit" name="btn" value="Cadastrar" class="btn btn-light">
                        </form>
				</div>


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
}
</script>
</body>
</html>
