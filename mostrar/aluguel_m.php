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
	<link rel="stylesheet" href="../css/Registros.css" media="only screen">
</head>
<body> 

<nav class="navbar">
    <div class="container-fluid">
        <img src="../imgs/Logo.png" class="Logo">

        <ul class="nav nav-underline">
            <li class="nav-item">
                <a class="nav-link" href="../mostrar/editora_m.php">Editora</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" media="only screen" style="color: white; font-family: 'Montserrat'; font-weight: 900;" aria-current="page" href="#">Aluguel</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="../mostrar/livro_m.php">Livro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../mostrar/usuario_m.php">Usuário</a>
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
                    <a class="nav-link" href="../cadastros/editora.php">Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Relatórios</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="../principal/dashboard.php">Dashboard</a>
                </li>
               
            </ul>
        </div>
    </div>
</nav>
<div class="container-xl">

    <form class="d-flex" action="" role="search" autocomplete="off">
      <input class="form-control me-2" type="search" name="confere" placeholder="Buscar..." aria-label="Search">
      <button class="btn btn-sm btn-outline-secondary" type="submit">Buscar</button>
    </form>

      

        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">ID do Livro</th>
                <th scope="col">ID do Usuário</th>
                <th scope="col">Aluguel</th>
                <th scope="col">Previsão da Devolução</th>
                <th scope="col">Devolução</th>
                <th scope="col">Estado</th>
                <th scope="col"></th>
                </tr>
            </thead>


                <tbody>
                                
                    <?php include_once  '../consultar/aluguel_c.php' ?>


                </tbody>

        </table>	

	</div>
</body>