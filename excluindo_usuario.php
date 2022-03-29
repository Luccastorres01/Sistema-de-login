<?php 
	include("BANCO/conexao.php");
	//Iniciando uma sessão
	session_start();

	$id_usuario = intval($_GET['id_usuario']);

	$exclusao = mysqli_query($conexao, "DELETE FROM usuarios WHERE id = '$id_usuario' ");

	if (isset($exclusao)) {
		$_SESSION['msg_sucesso_exclusao_usuario'] = "<p>Usuário excluído com sucesso!</p>";
		header("Location: usuarios.php");
	}
	else {
		$_SESSION['msg_erro_exclusao_usuario'] = "<p>Usuário não excluído...</p>";
		header("Location: usuarios.php");
	}

?>