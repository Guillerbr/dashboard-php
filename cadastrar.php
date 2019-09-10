<?php
require_once 'classes/usuarios.php';
$u = new Usuario; //herda da classe acima transforma em variavel

session_start();

//$id_master = $_SESSION['id_master'];


//on ou off public cadastro
if (!isset($_SESSION['id_usuario'])) {  //se não está definido o id do usuario na sessao,redireciona para o login
	header("location:index.php");
}




?>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/estilo.css">
	<title>Cadastro</title>
</head>

<body>
	<div id="corpo-form-cad">
		<h1>Cadastre-se</h1>
		<form method="POST">
			<input type="text" name="nome" placeholder="Nome Completo" maxlength="45">

			<input type="email" name="email" placeholder="Usuario" maxlength="40">
			<input type="text" name="id_status" placeholder="Tipo de Usuário" maxlength="40">
			<input type="password" name="senha" placeholder="Senha" maxlength="20">
			<input type="password" name="confSenha" placeholder="Confirmar senha">
			<input type="submit" value="Cadastrar" class="entrar">
			<a href="index.php">Já é inscrito? <strong>Faça o Login</strong></a>
		</form>
		<?php
		
		
		//verificar se clicou no botao
		if (isset($_POST['nome'])) {
			$nome = htmlentities(addslashes($_POST['nome'])); //addslashes e htmlentitiies evitam codigos maliciosos.
			//$telefone =htmlentities(addslashes($_POST['telefone']));
			$id_status = htmlentities(addslashes($_POST['id_status']));
			$email = htmlentities(addslashes($_POST['email']));
			$senha = htmlentities(addslashes($_POST['senha']));
			$confirmarSenha = htmlentities(addslashes($_POST['confSenha']));
			
			
			


			//verificando se todos os campos nao estao vazios
			if (!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha))   {
				
				$u->conectar("sistem_login", "localhost", "root", "");
				if ($u->msgErro == "") //conectado normalmente;
					{
						if ($senha == $confirmarSenha) {                               //confirma a senha
						//$id_status == 4;
							if ($u->cadastrar_user($id_status,$nome, $email, $senha)) {          //funcao que cadastra
								echo '<br>';
								echo "Cadastro realizado com sucesso!";
							} else {
								echo '<br>';
								echo "Email já cadastrado, retorne e faça login.";
							}
						} else {
							echo '<br>';
							echo "Senhas não conferem!";
						}
					} else {
					echo "Erro: " . $u->msgErro;
				}
			} else {
				echo "Preencha todos os campos!";
			}
		}
		?>
	</div>
</body>

</html>