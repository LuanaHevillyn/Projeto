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
	<link rel="stylesheet" href="../css/dashboard.css" media="only screen">
</head>
<body style="background-color: #1b1b1b"> 

<nav class="navbar">
    <div class="container-fluid">
        <img src="../imgs/Logo.png" class="Logo">

        <ul class="nav nav-underline">
            <li class="nav-item">
                <a class="nav-link active" media="only screen" style="color: white; font-family: 'Montserrat'; font-weight: 900;" aria-current="page" href="#">Dashboard</a>
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
                    <a class="nav-link" href="../mostrar/editora_m.php">Relatórios</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                </li>
               
            </ul>
        </div>
    </div>
</nav>
<div class="container">
<div class="dados">
      <div class="bloco1">
        <center><h5>O total de livros alugados: </h5></center> 
            <?php
            $query_alugados = "SELECT SUM(alugados) AS alugados FROM livro";
            $resultado_alugados = mysqli_query($conn, $query_alugados);
            $livros_alugados = mysqli_fetch_assoc($resultado_alugados)['alugados'];
            ?>   
        <center><h4 style="color: rgb(231, 193, 25);"><?php echo $livros_alugados?></h4>
      </div>


      <div class="bloco2">
        <center><h5>O total de livros atrasados: </h5>    
            <?php
            $sql = "SELECT COUNT(*) AS estado_aluguel FROM aluguel WHERE estado = 'foraPrazo'";
            $busca = mysqli_query($conn, $sql);
            $livros_atrasados = mysqli_fetch_assoc($busca)['estado_aluguel'];
            ?>
        <h4 style="color: rgb(231, 193, 25);"><?php echo $livros_atrasados?></center></h4>
      </div>


      <div class="bloco3">
        <center><h5>O livro mais vendido: </h5>    
            <?php
            $sql = "SELECT nome AS popular FROM livro WHERE alugados = (SELECT MAX(alugados) FROM livro)";
            $busca = mysqli_query($conn, $sql);
            $livro_popular = mysqli_fetch_assoc($busca)['popular'];
            ?>
        <h4 style="color: rgb(231, 193, 25);"><?php echo $livro_popular?></h4></center>
      </div>

      <div class="bloco4">
        <center><h5>A quant. de usuários: </h5>    
            <?php
            $sql = "SELECT COUNT(*) AS usu FROM usuarioaluga";
            $busca = mysqli_query($conn, $sql);
            $usuarios = mysqli_fetch_assoc($busca)['usu'];
            ?>
        <h4 style="color: rgb(231, 193, 25);"><?php echo $usuarios?></h4></center>
      </div>
</div>



    <div class="row py-2">
        <div class="col-md-4 py-1">
            <div class="card">
            <div class="card-header">Alugueis de todos os livros: </div>
                <div class="card-body">
                  <div id="donutchart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4 py-1">
            <div class="card">
            <div class="card-header">Livros cadastrados por editora: </div>
                <div class="card-body">
                 <div id="piechart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4 py-1">
            <div class="card">
            <div class="card-header">Estado dos livros entregues: </div>
                <div class="card-body">
                 <div id="donut"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-2">
        <div class="col-md-20 py-1">
            <div class="card">
            <div class="card-header">Aluguéis de cada usuário: </div>
                <div class="card-body">
                <div id="chart_div"></div>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Alugueis', 'Usuário'],
          <?php
            $sql = "SELECT * FROM usuarioaluga";
            $busca = mysqli_query($conn, $sql);

            while ($dados = mysqli_fetch_array($busca)) {
              $nome = $dados['nome'];
              $alugados	= $dados['alugueis'];
            
            ?>

            ["<?php echo $nome ?>", <?php echo $alugados ?> ],

            <?php } ?>
        ]);

        var options = {
          colors: ['black'],

          hAxis: {title: 'Usuários', minValue: 0, maxValue: 15},
          vAxis: {title: 'Aluguéis', minValue: 0, maxValue: 15},
          
          animation: { 
            startup: true, 
            duration: 1000, 
            easing: 'inAndOut',
          }

        };

        var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
            
            <?php
            $sql = "SELECT * FROM livro";
            $busca = mysqli_query($conn, $sql);

            while ($dados = mysqli_fetch_array($busca)) {
              $nome = $dados['nome'];
              $alugados	= $dados['alugados'];
            
            ?>

            ["<?php echo $nome ?>", <?php echo $alugados ?> ],

            <?php } ?>
      ]);
	  var options = {
      
      colors: ['#000000', '#222222', '#444444', '#666666', '#888888']
        };
        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);

      }
    </script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
      <div id="piechart" style="width: 900px; height: 500px;"></div> 
      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([

          ['Nome', 'Hours per Day'],
          <?php
            $sql = "SELECT * FROM editora";
            $busca = mysqli_query($conn, $sql);

            while ($dados = mysqli_fetch_array($busca)) {
              $nome = $dados['nome'];
              $alugados	= $dados['livros'];
            
            ?>

            ["<?php echo $nome ?>", <?php echo $alugados ?> ],

            <?php } ?>
      ]);

        var options = {
          colors: ['#000000', '#222222', '#444444', '#666666', '#888888']

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }

      </script>  
    </script>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
      <script type="text/javascript">

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Estado', 'Estado'],
          <?php
          include_once '../conexoes/conexao.php';
          $sql = "SELECT COUNT(*) AS estado_aluguel FROM aluguel WHERE estado = 'foraPrazo'";
          $busca = mysqli_query($conn, $sql);
          @$livros_atrasados = mysqli_fetch_assoc($busca)['estado_aluguel'];

          $mysql = "SELECT COUNT(*) AS estado_alug FROM aluguel WHERE estado = 'noPrazo'";
          $buscar = mysqli_query($conn, $mysql);
          $livros_prazo = mysqli_fetch_assoc($buscar)['estado_alug'];

        ?>
        ['Fora Prazo:', <?php echo $livros_atrasados ?>],
        ['No Prazo:', <?php echo $livros_prazo ?>],
         
        ]);

        var options = {
          colors: ['black'],
          legend: 'Estado dos livros entregues:',
        };

        var chart = new google.visualization.Histogram(document.getElementById('donut'));
        chart.draw(data, options);
      }
    </script>
  </script>

</script>
</body>
</html>
