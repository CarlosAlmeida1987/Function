<?php
 // Conectando ao banco de dados:
// include_once("../controler/conectar.php");
 
  include_once("../controler/local.php");
 
 // Recebendo os dados a pesquisar
 @$nome = $_POST['nome'];
 @$email = $_POST['email'];
 @$telefone = $_POST['telefone'];
 @$senha = $_POST['senha'];
 @$news = $_POST['newsletter'];
 
 $senha = base64_encode($senha);
 $senha = sha1($senha);
?>

 <?php
  $sql = "SELECT * FROM tb_user where email = '".$email."' or telefone = '".$telefone."' ;";
  $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");
 
 if (empty($resultado)){
	 $fl_status = 0;
	}else{
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {
   $login = $registro['login'];
   $email = $registro['email'];
   $telefone = $registro['telefone'];
   
   header("Location: ../login.php?email=$email&telefone=$telefone");
   exit;
 }
 
 }
?>
 
 <?php
 
 $sql2 = "INSERT INTO tb_user
  (codigo, email, login, senha, telefone, news)
VALUES
  (null, '$email', '$nome', '$senha', '$telefone', '$news');";

if ($strcon->query($sql2) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql2 . "<br>" . $strcon->error;
}

 mysqli_close($strcon);
 
 header("Location: ../index.php");

?>
</body>
</html>