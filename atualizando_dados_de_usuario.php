<?php 
	//Iniciando uma sessão 
   	session_start();	
	include("BANCO/conexao.php");

	$id_usuario = $_POST['id'];
	$login = addslashes($_POST['login']);
	$nome = addslashes($_POST['nome']);

	$atualizaçao = mysqli_query($conexao, "UPDATE usuarios SET login='$login', nome='$nome' WHERE id='$id_usuario' ");

	if (isset($atualizaçao)) {
		$_SESSION['msg_sucesso_atualizaçao_usuario'] = "<p>Dados alterados com sucesso!</p>";
		header("Location: usuarios.php");
	}
	else {
		$_SESSION['msg_erro_atualizaçao_usuario'] = "<p>Dados alterados com sucesso!</p>";
		header("Location: usuarios.php");
	}
?>