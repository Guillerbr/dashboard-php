<?php


require_once 'classes/usuarios.php';
$u = new Usuario; //herda da classe acima transforma em variavel

session_start();

//$id_master = $_SESSION['id_master'];


//on ou off public cadastro
if (!isset($_SESSION['id_master'])) {  //se não está definido o id do usuario na sessao,redireciona para o login
	header("location:index.php");
}
/*
else{
	header("location:cadastrar.php");
}

*/
?>



<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/estilo.css">
	<title>Cadastro</title>
</head>

<body>
	
			<a href="index.php">Já é inscrito? <strong>Faça o Login</strong></a>
	
</body>

</html>