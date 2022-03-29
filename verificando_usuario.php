<?php 
	//Incluindo a conexão com o banco de dados
	include("BANCO/conexao.php");
	//Iniciando a sessão
	session_start();

	//Verificando se o usuário preencheu todos os campos
	if (isset($_POST['login']) && isset($_POST['senha'])) {
		//Armazenando os dados inseridos pelo usuário
		$usuario = mysqli_real_escape_string($conexao, $_POST['login']);
		$senha = mysqli_real_escape_string($conexao, md5(md5($_POST['senha'])));

		//Buscando no banco de dados o usuário inserido e validando sua senha, também armazenando a busca em uma variável
		$busca_usuario = mysqli_query($conexao, "SELECT * FROM usuarios WHERE login = '$usuario' && senha = '$senha' ");
		//Armazenando a busca vinda do banco de dados
		$retono_usuario = mysqli_fetch_assoc($busca_usuario);

		//Armazenando em sessões os dados vindos do banco de dados relacionados do usuário
		if (isset($retono_usuario)) {
			$_SESSION['nome_do_usuario'] = $retono_usuario['nome'];
			$_SESSION['login_do_usuario'] = $retono_usuario['login'];
			$_SESSION['senha_do_usuario'] = $retono_usuario['senha'];

			//Redirecionando o usuário para dentro da aplicação
   			header("Location: home.php");
		}
		//Caso os dados inseridos pelo usuário estejam incorretos
		else {
			//Mensagem de usuário incorreto
         	$_SESSION['usuario_incorreto'] = "<p>Usuário ou senha incorreto...</p>";
         	//Redirecionando o usuário para a página de login (index.php)
         	header("Location: login.php");
		}
	}
?>