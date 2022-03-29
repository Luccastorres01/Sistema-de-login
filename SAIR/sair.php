<?php
	
	//Iniciando uma sessão 
	session_start();

	//Finalizando as sessões dos usuários
	unset($_SESSION['nome_do_usuario'],
		$_SESSION['login_do_usuario'],
		$_SESSION['senha_do_usuario']
	);
	
	//Redirecionar o usuario para a página de login
	header("Location: ../index.php");
?>
