<!DOCTYPE html>
<html lang="pt-br">
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
		<h1>USUÁRIOS</h1>
		<?php 
			//Mensagem de sucesso na atualização dos dados de usuário
	       if(isset($_SESSION['msg_sucesso_atualizaçao_usuario'])){
	            echo $_SESSION['msg_sucesso_atualizaçao_usuario'];
	            //Parando sessão
	            unset($_SESSION['msg_sucesso_atualizaçao_usuario']);
	        }

	        //Mensagem de erro na atualização dos dados de usuário
	        if(isset($_SESSION['msg_erro_atualizaçao_usuario'])){
	            echo $_SESSION['msg_erro_atualizaçao_usuario'];
	            //Parando sessão
	            unset($_SESSION['msg_erro_atualizaçao_usuario']);
	     	}

	     	//Mensagem de sucesso na exclusão de usuário
	        if(isset($_SESSION['msg_sucesso_exclusao_usuario'])){
	            echo $_SESSION['msg_sucesso_exclusao_usuario'];
	            //Parando sessão
	            unset($_SESSION['msg_sucesso_exclusao_usuario']);
	     	}

	     	//Mensagem de erro na exclusão de usuário
	        if(isset($_SESSION['msg_erro_exclusao_usuario'])){
	            echo $_SESSION['msg_erro_exclusao_usuario'];
	            //Parando sessão
	            unset($_SESSION['msg_erro_exclusao_usuario']);
	     	}
		?>
		<table border="1">
			<tr>
				<th>Nome</th>
				<th>Login</th>
				<th>Alterar Senha</th>
				<th>Excluir usuário</th>
			</tr>
			<?php 
				include("BANCO/conexao.php");
				// Selecionando solicitação do banco de dados e criando tabela 
                $selecionando_usuarios = mysqli_query($conexao, "SELECT * FROM usuarios ORDER BY nome ASC");
                 while($busca=mysqli_fetch_array($selecionando_usuarios)){
                 	$id_usuario = $busca['id'];
			?>

			<tr>
				<td><?php echo $busca['nome']; ?></td>
				<td><?php echo $busca['login']; ?></td>
				<td>
					<a href="alterando_dados_de_usuario.php?id_usuario=<?php echo $id_usuario; ?>">Alterar</a>
				</td>
				<td>
					<a href="confirmaçao_exclusao_de_usuario.php?id_usuario=<?php echo $id_usuario; ?>">Excluir</a>
				</td>
			</tr>
			<?php } ?>
		</table>
	</main>
<?php 
	include("INCLUDES/footer.php");
?>
</body>
</html>