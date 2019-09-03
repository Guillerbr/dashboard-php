<?php
require_once 'classes/usuarios_buscar.php';
$u = new Usuario_Busca;

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/estilo.css">
	<title>Login</title>
</head>

<body>
	<div id="corpo-form">
		<h1>Entrar</h1>
		<form method="POST">
			<input type="email" placeholder="Usuario" name='email'>
			<input type="password" placeholder="Senha" name='senha'>
			<input type="submit" value="ACESSAR" class="entrar">
			<a href="cadastrar.php">Ainda não é inscrito? <strong>Cadastre-se!</strong></a>
		</form>
		<!-- Este é um comentário -->
	</div>
	<?php
	if (isset($_POST['email'])) {
		$email = htmlentities(addslashes($_POST['email']));
		$senha = htmlentities(addslashes($_POST['senha']));
		//verificando se todos os campos nao estao vazios
		if (!empty($email) && !empty($senha)) {
		//	$u->conectar("sistem_login", "localhost", "root", ""); //conectando ao banco
			if ($u->msgErro == "") // caso a mensagem esteja vazia, login ok
				{
					if ($u->entrar($email, $senha)) {               //chama a funcao da classe
						header("location:checker.php");             //encaminhado para proxima areavip apos verificar usuario e senha
					} else {
						?>
					<div class="msg_erro">
						Email e/ou senha estão incorretos!
					</div>
				<?php
			}
		} else {
		?>
				<div class="msg_erro">
					<?php echo "Erro: " . $u->msgErro; ?>
				</div>
			<?php
		}
	} else {
		?>
			<div class="msg_erro">
				Preencha todos os campos!
			</div>
		<?php
	}
}
?>
</body>

</html>