<?php 

	$nome 	= isset($_POST['nome']) == true ?$_POST['nome']:"";
	$senha  = isset($_POST['senha']) == true ?$_POST['senha']:"";

if ($nome == "WDAUsuario" && $senha == "1234") {
    header('Location: ../principal/locadora.html');

}else {
    echo "<script>alert('Usuário e/ou senha incorreta, tente novamente');</script>";
    header("Refresh: 1; url= ../index.html");
}
?>