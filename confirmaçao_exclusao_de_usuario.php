<!DOCTYPE html>
<html lang="pt-br">
<?php 
	include("INCLUDES/dados_de_usuario.php");
	include("INCLUDES/head.php");

	$id_usuario = intval($_GET['id_usuario']);
?>
<body>
<?php 
	include("INCLUDES/header.php");
	include("SAIR/verificaçao_sair.php");
?>
	<main>
		<h1>Tem certeza que deseja excluir este usuário?</h1>
		<a href="usuarios.php">CANCELAR</a>
		<a href="excluindo_usuario.php?id_usuario=<?php echo $id_usuario; ?>">EXCLUIR</a>
	</main>
<?php 
	include("INCLUDES/footer.php");
?>
</body>
</html>