<?php 
	//Incluindo a conexão com o banco de dados
	include("BANCO/conexao.php");
	//Iniciando a sessão
	session_start();

	//Verificando se o usuário preencheu todos os campos
	if (isset($_POST['nome']) && isset($_POST['login']) && isset($_POST['senha']) && isset($_POST['confirmaçao_de_senha'])) {

		//Armazenando o login do usuário
		$login = addslashes($_POST['login']); //Escapando de caracteres especiais com addslaches()

		//Verificando se o mesmo nome de login já não está em uso
		$verificando_login = mysqli_query($conexao, "SELECT * FROM usuarios WHERE login = '$login' ");
		$login_verificado = mysqli_num_rows($verificando_login);

		if ($login_verificado == "0") {
			$senha = addslashes(md5(md5($_POST['senha']))); //Escapando de caracteres especiais e armazenando a senha do usuário
			$confirmaçao_de_senha = addslashes(md5(md5($_POST['confirmaçao_de_senha']))); //Escapando de caracteres especiais e armazenando a confirmação de senha do usuário
			
			//Verificando se senha e confirmação de senha estão iguais
			if ($senha == $confirmaçao_de_senha) {
				$senha_final = $confirmaçao_de_senha;
				//Armazenando os dados inseridos pelo usuário
				$nome = addslashes($_POST['nome']); //Escapando de caracteres especiais com addslaches()

				//Inserindo o novo usuário no banco de dados
				$cadastrando_usuario = mysqli_query($conexao, "INSERT INTO usuarios (nome, login, senha) VALUES ('$nome', '$login', '$senha_final')");

				//Verificando se o usuário foi cadastrando
				if (isset($cadastrando_usuario)) {
					//Mensagem de sucesso
					$_SESSION['mensagem_usuario_cadastrado_com_sucesso'] = "<p>Usuário cadastrado com sucesso!</p>";
	   				header("Location: cadastrando_novo_usuario.php");
				}
				else {
					//Mensagem de erro
		   			$_SESSION['mensagem_usuario_nao_cadastrado'] = "<p>Usuário não cadastrado</p>";
		   			header("Location: cadastrando_novo_usuario.php");
				}
			}
			else {
				//Mensagem de senhas incorretas
	   			$_SESSION['mensagem_usuario_senhas_nao_conferem'] = "<p>As senhas não conferem...</p>";
	   			header("Location: cadastrando_novo_usuario.php");
			}
		}
		else {
			//Mensagem de login já em uso
	   		$_SESSION['mensagem_login_ja_existente'] = "<p>Login já existente, insire um login diferente.</p>";
	   		header("Location: cadastrando_novo_usuario.php");
		}

	}
?>