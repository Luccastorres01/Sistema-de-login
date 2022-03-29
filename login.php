<!DOCTYPE html>
<html lang="pt-br">
<?php 
	//Iniciando a sessão
	session_start();
?>
<body>
	<main>
		<form method="POST" action="verificando_usuario.php">
			<h1>Bem vindo</h1>
			<input type="text" name="login" placeholder="Login: " required>
			<input type="password" name="senha" placeholder="Senha: " required>
			<input type="submit" value="Entrar">
			<?php 
				//Mensagem de usuário incorreto
                if(isset($_SESSION['usuario_incorreto'])){
                    echo $_SESSION['usuario_incorreto'];
                    //Parando sessão
                    unset($_SESSION['usuario_incorreto']);
                }
                //Mensagem senha alterada com sucesso
	            if(isset($_SESSION['senha_alterada_com_sucesso'])){
	                echo $_SESSION['senha_alterada_com_sucesso'];
	                //Parando sessão
	                unset($_SESSION['senha_alterada_com_sucesso']);
	            }
			?>
		</form>
	</main>
</body>
</html>