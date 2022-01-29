<?php
 // Conectando ao banco de dados:
// include_once("../controler/conectar.php");
 
  include_once("../controler/local.php");
 
 // Recebendo os dados a pesquisar
 print @$email = $_POST['email'];
 print @$senha = $_POST['senha'];

 $senha = base64_encode($senha);
 $senha = sha1($senha);
?>

 <?php

  $sql = "SELECT codigo, email, login FROM tb_user where email = '".$email."' and senha = '".$senha."' ;";
  $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");
  
  if (!$resultado) {
	  
	  header("Location: ../login.php?msg=senha ou email incorretas");
	  }else if(mysqli_num_rows($resultado) < 0){
	 
	  header("Location: ../login.php?msg=senha ou email incorretas");  
	  }else if (empty($resultado)){
	  
	  header("Location: ../login.php?msg=senha ou email incorretas");
	}else if (mysqli_num_rows($resultado) > 0){ 
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {
   $id = $registro['codigo'];
   $email = $registro['email'];
   $login = $registro['login'];
   
session_start();
date_default_timezone_set('America/Fortaleza');
@$_SESSION['vendas'] = base64_encode("$email");
@$_SESSION['carinho'] = base64_encode("$id");
@$_SESSION['cript'] =  base64_encode("$login");
@$_SESSION['valor'] = 0;
@$_SESSION['Qtd'] = 0;
@$_SESSION['login'] = $login;
@$_SESSION['hora'] = time();
@$DIA = date('H:i:s', $_SESSION['hora']);

header("Location: ../index.php");
   exit;
 }
  
 } else {
 header("Location: ../login.php?msg=senha ou email incorretas");	 
	 }
 mysqli_close($strcon);
?>
