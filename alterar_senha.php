<!DOCTYPE html>
<html>
<?php 
	include("INCLUDES/dados_de_usuario.php");
	include("INCLUDES/head.php");	
?>
<body>
<?php 
	include("INCLUDES/header.php");
	include("SAIR/verificaçao_sair.php");
?>
	<main>
		<form action="alterando_senha.php" method="POST">
				<h3>Alterar senha</h3>
				<input type="password" name="senha_atual" placeholder="Senha atual: " required>
				<input type="password" name="nova_senha" placeholder="Nova senha: " required>
				<input type="password" name="confirmaçao_de_nova_senha" placeholder="Confirmação de senha: " required>
				<input type="submit" value="Alterar"> 
				<?php
	               //Mensagem de senha atual incorreta
	                if(isset($_SESSION['senha_atual_incorreta'])){
	                    echo $_SESSION['senha_atual_incorreta'];
	                    //Parando sessão
	                    unset($_SESSION['senha_atual_incorreta']);
	                }
	                //Mensagem senhas incompatíveis 
		            if(isset($_SESSION['senha_e_conf_senha_incompativeis'])){
		                echo $_SESSION['senha_e_conf_senha_incompativeis'];
		                //Parando sessão
		                unset($_SESSION['senha_e_conf_senha_incompativeis']);
		            }
				?>
			</form>
	</main>
<?php 
	include("INCLUDES/footer.php");
?>
</body>
</html>