	<?php
	class Usuario
	{

		private $pdo;  /*criando variavel para usar nas funçoes*/
		public $msgErro = "";

		public function conectar($nome, $host, $usuario, $senha)
		{
			global $pdo;
			global $msgErro;
			try {
				$pdo = new PDO("mysql:dbname=" . $nome . ";host=" . $host, $usuario, $senha);
			} catch (PDOException $e) {
				$msgErro - $e->getMessage(); /*pega a mensagem de erro do php e joga na variavel msegErro e mostra pro usuario.*/
			}
		}
		public function cadastrar_user($nome, $email, $senha)
		{
			global $pdo;
			//global $msgErro;
			//verificando se existe usuario cadastrado.
			$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email=:e"); //pega o id do usuario buscando pelo emial preenchido no cadastro
			$sql->bindValue(":e", $email);  //substitui o :e pelo email preenchido no cadastro
			$sql->execute();
			if ($sql->rowCount() > 0) //verificando houve resposta na consulta
				{
					return false; // ja tem cadastro
				} else {
				//caso nao tenha
				$sql = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:n,:e,:s)");
				$sql->bindValue(":n", $nome);
				$sql->bindValue(":e", $email);
				$sql->bindValue(":s", md5($senha));
				$sql->execute();
				return true;
			}
		}
		public function logar($email, $senha)
		{
			global $pdo;
			//global $msgErro;
			/*verificar se o email e senha estao cadastrados, se sim*/
			$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email= :e AND senha =:s");
			$sql->bindValue(":e", $email);
			$sql->bindValue(":s", md5($senha));
			$sql->execute();
			if ($sql->rowCount() > 0) //verificando houve resposta na consulta
				{
					//entrar no sistema criando uma (sessao)
					$dado = $sql->fetch(); //transforma o retorno da query em array com os nomes das colunas
					session_start();       //iniciando a sessao

                   
					if ($_SESSION['id_usuario'] = $dado['id_usuario']) {

						
					} 
					if ($dado['id_usuario'] = 1 ) {
						
						$_SESSION['id_master'];
						$_SESSION['id_master'] = 1;
				
				}     
				return true;


			   
				 //verifica se usuario é id 1 se sim ele é id_master admin
				 /*
				if ($dado['id_usuario'] ==  1) {
					$_SESSION['id_master'] = 1;            //seta int admin
				} else {
					$_SESSION['id_usuario'] = $dado['id_usuario'];
				}
				return true;
			} else {
				return false;
			}
		
           */
		}
}

/*

     public function verifAdmin($id_usuario)
		{

			global $pdo;

			$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE id_usuario=:id_usuario");
			$sql->bindValue(":id_usuario", $id_usuario);
			$sql->execute();
			return $sql;
			
		}


*/



		public function trocarSenha($novasenhaup, $id_usuario)
		{

			global $pdo;

			$sql = $pdo->prepare("UPDATE usuarios SET senha=:novasenhaup WHERE id_usuario=:id_usuario");
			$sql->bindValue(":novasenhaup", md5($novasenhaup));
			$sql->bindValue(":id_usuario", $id_usuario);
			$sql->execute();
			return $sql;
		}
	}


	?>





