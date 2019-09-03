<?php

date_default_timezone_set('America/Sao_Paulo');

require_once 'classes/usuarios_buscar.php'; //requer o arquivo que contem a classe das funçoes

session_start();

if (!isset($_SESSION['id_usuario'])) {  //se não está definido o id do usuario na sessao,redireciona para o login
	header("location:index.php");
}
//funcao importante que liga a sessao usuario
if (isset($_SESSION['id_usuario'])) {
	$u = new Usuario_Busca("sistem_login", "localhost", "root", "");
	$informa = $u->buscarDadosUserPrint($_SESSION['id_usuario']);
} elseif (isset($_SESSION['id_master'])) {

	$u = new Usuario_Busca("sistem_login", "localhost", "root", "");
	$informa = $u->buscarDadosUserPrint($_SESSION['id_master']);
}

//verifica se existe a sessão do usuario se sim,busca no banco pela funcao mostrarSaldo na classe Usuario_Busca e retorna
if (isset($_SESSION['id_usuario'])) {
	$u = new Usuario_Busca("sistem_login", "localhost", "root", "");
	$informada = $u->mostrarSaldo($_SESSION['id_usuario']);
}

?>

<html>

<head>

	<link rel="stylesheet" href="CSS/estilo1.css" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">

</head>

<body>
	<h1>GCHECKER</h1>
	<nav>

		<ul>

			<?php
			

       // $admin = $_SESSION['id_usuario'];

			if (isset($_SESSION['id_master'])) { ?>
				<li><a href="cadastrar.php">Cadastrar</a></li>

			<?php    }

		?>

			<li><a href="">Serviço1</a></li>
			<li><a href="">Contato</a></li>
			<li><a href="sair.php">Adicionar saldo</a></li>
			<li><a href="checker.php">Adicionar diária</a></li>
			<li><a href="alterasenha.php">Alterar Senha</a></li>
			<li><a href="sair.php">Sair</a></li>

		</ul>
	</nav>


	<?php

	if (isset($_SESSION['id_master']) || isset($_SESSION['id_usuario'])) { ?>

	<?php }


?>

	<div class="container-fluid">
		<h2 class="display-4 m-7">Olá,<?php echo $informa['nome']; ?></h2>
	</div>


	<div class="inforide">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">
				<img src="">
			</div>
			<div class="col-lg-4 col-md-3 col-sm-8 col-8 fontsty">
				<h4>Seu Saldo:</h4>
				<h2><?php echo $informada['valor_saldo'];   ?></h2>
			</div>
		</div>
	</div>
	</div>
	<br>
	<div class="inforide">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">
				<img src="">
			</div>
			<div class="col-lg-7 col-md-3 col-sm-8 col-8 fontsty">
				<h4>Seu saldo de diárias:</h4>
				<h2><?php echo $informada['dias_saldo'];   ?></h2>
			</div>
		</div>
	</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.js"></script>

</body>


</html>