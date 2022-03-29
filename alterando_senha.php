<?php 
	include("BANCO/conexao.php");
	session_start();

	$senha_atual_do_sitema = addslashes($_SESSION['senha_do_usuario']);
	$login_atual_do_sitema = addslashes($_SESSION['login_do_usuario']);

	if (isset($_POST['senha_atual']) && isset($_POST['nova_senha']) && isset($_POST['confirmaçao_de_nova_senha'])) {
		//Armazenando os dados inseridos pelo usuário
		$senha_atual = md5(md5($_POST['senha_atual']));
		$senha = $_POST['nova_senha'];
		$confirmaçao_de_nova_senha = $_POST['confirmaçao_de_nova_senha'];

		//Verificando se a senha atual está correta
		if ($senha_atual == $senha_atual_do_sitema) {
			//Verificando se a nova senha e a confirmação estão corretas
			if ($senha == $confirmaçao_de_nova_senha) {
				//Armazenando a nova senha
				$nova_senha = md5(md5($confirmaçao_de_nova_senha));

				$alterando_senha_de_usuario = mysqli_query($conexao, "UPDATE usuarios SET senha='$nova_senha' WHERE login = '$login_atual_do_sitema' ");

				//Caso a senha seja alterada com sucesso o usuário é direcionado a página junto da mensagem de alteração concluída
				if (isset($alterando_senha_de_usuario)) {
					$SESSION['senha_alterada_com_sucesso'] = "<p>Sua senha foi alterada com sucesso!! Efetue o login novamente para validar a atualização.</p>";
					header("Location: SAIR/sair.php");
				}
			}
			//Caso a nova senha e a confirmação de senhs estejam incompatíveis
			else {
				$SESSION['senha_e_conf_senha_incompativeis'] = "<p>Senha e confirmação de senha não compatíveis...</p>";
				header("Location: alterar_senha.php");
			}
		}
		//Caso a senha atual não esteja correta o usuário é direcionado a página e a senha não é atualizada
		else {
			$SESSION['senha_atual_incorreta'] = "<p>Senha atual incorreta...</p>";
			header("Location: alterar_senha.php");
		}
	}
?>