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
		<form method="POST" action="verificando_cadastro_de_usuario.php">
			<h1>Cadastrando usuário</h1>
			<input type="text" name="nome" placeholder="Nome: " required>
			<input type="text" name="login" placeholder="Login: " required>
			<input type="password" name="senha" placeholder="Senha: " required>
			<input type="password" name="confirmaçao_de_senha" placeholder="Confirmação de senha: " required>
			<input type="submit" value="Cadastrar">
			<?php 
                //Mensagem de usuário cadastrado com sucesso
                if(isset($_SESSION['mensagem_usuario_cadastrado_com_sucesso'])){
                    echo $_SESSION['mensagem_usuario_cadastrado_com_sucesso'];
                    //Parando sessão
                    unset($_SESSION['mensagem_usuario_cadastrado_com_sucesso']);
                }

                //Mensagem de usuário não cadastrado
                if(isset($_SESSION['mensagem_usuario_nao_cadastrado'])){
                    echo $_SESSION['mensagem_usuario_nao_cadastrado'];
                    //Parando sessão
                    unset($_SESSION['mensagem_usuario_nao_cadastrado']);
                }

                //Mensagem de erro em senha e confirmação de senha de novo usuário
                if(isset($_SESSION['mensagem_usuario_senhas_nao_conferem'])){
                    echo $_SESSION['mensagem_usuario_senhas_nao_conferem'];
                    //Parando sessão
                    unset($_SESSION['mensagem_usuario_senhas_nao_conferem']);
                }

                // //Mensagem de login de usuário já em uso
                if(isset($_SESSION['mensagem_login_ja_existente'])){
                    echo $_SESSION['mensagem_login_ja_existente'];
                    //Parando sessão
                    unset($_SESSION['mensagem_login_ja_existente']);
                }

            ?>
		</form>
	</main>
<?php 
	include("INCLUDES/footer.php");
?>
</body>
</html>