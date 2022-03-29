<!DOCTYPE html>
<html lang="pt-br">
<?php 
	include("INCLUDES/dados_de_usuario.php");
	include("INCLUDES/head.php");
	include("BANCO/conexao.php");

	$id_usuario = intval($_GET['id_usuario']);

	$selecionando_usuario = mysqli_query($conexao, "SELECT * FROM usuarios WHERE id = '$id_usuario' ");
    while($busca=mysqli_fetch_array($selecionando_usuario)){
?>
<body>
<?php 
	include("INCLUDES/header.php");
	include("SAIR/verificaçao_sair.php");
?>
	<main>
		<form method="POST" action="atualizando_dados_de_usuario.php">
			<input type="hidden" name="id" value="<?php echo $busca['id']; ?>">
			<label>Nome: </label>
			<input type="text" name="nome" value="<?php echo $busca['nome']; ?>" required>
			<label>Login: </label>
			<input type="text" name="login" value="<?php echo $busca['login']; ?>" required>
			<input type="submit" value="Alterar">
		</form>
	</main>
<?php 
	}
	include("INCLUDES/footer.php");
?>
</body>
</html>