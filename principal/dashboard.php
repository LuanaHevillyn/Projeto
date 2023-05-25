<?php 
	include_once '../conexoes/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Painel Editora</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
	<style>html, body {height: 100%; margin: 0; padding: 0;}</style>
	<link rel="stylesheet" href="./css/LoginEdi.css">
</head>
<body> 
<header>
    <img src="./imgs/Logo.png" style="height: 75%; width: 11%; margin-top: 1%; margin-left: 12%;" >
    <a href="./locadora.html" style="margin-left: 34%;">Página Principal</a>

</header>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript">

    google.charts.load("current", {packages:['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([

        ["Element", "Density", { role: "style" } ],

        <?php
        $sql = "SELECT * FROM usuarioaluga";
        $busca = mysqli_query($conn, $sql);

        while ($dados = mysqli_fetch_array($busca)) {
          $nome = $dados['nome'];
          $alugueis	= $dados['alugueis'];
        
        ?>

        ["<?php echo $nome ?>", <?php echo $alugueis ?> ,"color: black"],

        <?php } ?>
      
      ]);

      var view = new google.visualization.DataView(data);

      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);


      var options = {
        title: "Density of Precious Metals, in g/cm^3",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>
































 <?php
include_once '../conexoes/conexao.php';

///QUANTIDADE LIVROS ALUGADOS
$query_alugados = "SELECT SUM(alugados) AS alugados FROM livro";
$resultado_alugados = mysqli_query($conn, $query_alugados);
$livros_alugados = mysqli_fetch_assoc($resultado_alugados)['alugados'];
echo '<br><br>O total de livros alugados é:  ', $livros_alugados, '<hr>';

//QUANTIDADE LIVROS ATRASADOS
@$query_atrasado = "SELECT COUNT(*) AS estado_aluguel FROM aluguel WHERE estado = 'atrasado'";
@$resultado_query_atrasado = mysqli_query($conn, $query_atrasado);
@$livros_atrasados = mysqli_fetch_assoc($resultado_query_atrasado)['estado_aluguel'];

echo '<br><br>O total de livros atrasados é : ',  $livros_atrasados, '<hr>';

//CADA USÁRIO E SEU ALUGUEL
echo '<br><br>Alugueis de acordo com usuários: <br>';
$busca = $conn->query("SELECT * FROM usuarioaluga");
while ($dados = $busca->fetch_assoc()) {


	$nome   = $dados['nome'];
	$alugueis	= $dados['alugueis'];

	echo "<tr><br>";
		echo "<td>$nome<td>      ||   $alugueis<br>";
	echo "<tr>";
}echo '<hr>';

@$query_noprazo = "SELECT COUNT(*) AS estado_aluguel FROM aluguel WHERE estado = ' '";
@$resultado_query_noprazo = mysqli_query($conn, $query_noprazo);
@$livros_dentroPrazo = mysqli_fetch_assoc($resultado_query_noprazo)['estado_aluguel'];

//LIVROS DEVOLVIDOS ANTES E DEPOIS DO PRAZO
echo '<br>O total de livros devolvidos no prazo é:  ', $livros_dentroPrazo, ', e o de livros atrasados é: ', $livros_atrasados, '<hr>';


//O ALUGUEL DE TODOS OS USUÁRIOS 
$query_alugadosUsu = "SELECT SUM(alugueis) AS alugueis FROM usuarioaluga";
$resultado_alugadosUsu = mysqli_query($conn, $query_alugadosUsu);
$livros_alugadosUsu = mysqli_fetch_assoc($resultado_alugadosUsu)['alugueis'];
echo '<br><br>O total de livros alugados pelos usuários é:  ', $livros_alugadosUsu, '<hr>';



//LIVRO MAIS ALUGADO
$query_alugados = "SELECT MAX(alugados) AS alugados
FROM livro
WHERE alugados > 0";
$resultado_alugados = mysqli_query($conn, $query_alugados);
$livros_alugados = mysqli_fetch_assoc($resultado_alugados)['alugados'];
echo '<br><br>O livro mais alugado é:  ';

$busca = $conn->query("SELECT nome, alugados FROM livro WHERE alugados = '$livros_alugados'");
while ($dados = $busca->fetch_assoc()) {

	$nome   = $dados['nome'];
	$alugueis	= $dados['alugados'];

	echo "<tr><br>";
		echo "<td>$nome  <td>||  $alugueis<br>";
	echo "<tr>";
	}
echo "<hr>";
?>
</body>
