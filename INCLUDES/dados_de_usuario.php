
<?php  
   //Iniciando a sessão
   session_start();
   
   //Verificando se há um  usuário iniciado
   if (isset($_SESSION['nome_do_usuario'])) {
   	
   }
   //Caso não tenha um usuário iniciado, quem está tentando acessar é enviado para página de login
   else {
      header("Location: login.php");
   }

   //Verificando se há um  usuário iniciado
   if (isset($_SESSION['login_do_usuario'])) {
      
   }
   //Caso não tenha um login iniciado, quem está tentando acessar é enviado para página de login
   else {
      header("Location: login.php");
   }

   //Verificando se há uma senha iniciada
   if (isset($_SESSION['senha_do_usuario'])) {
     
   }
   //Caso não tenha uma senha iniciada, quem está tentando acessar é enviado para página de login
   else {
   	header("Location: login.php");
   }
   
   // Armazenando em variáveis os dados básicos do usuário
   $nome_do_usuario = $_SESSION['nome_do_usuario'];
   $login_do_usuario = $_SESSION['login_do_usuario'];
   $senha_do_usuario = $_SESSION['senha_do_usuario'];
?>