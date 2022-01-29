<?php
 // Conectando ao banco de dados:
 include_once("../controler/conectar.php");
 
//  include_once("../controler/local.php");
 
 // Recebendo os dados a pesquisar
 @$pesquisa = $_POST['senha'];
?>

 <html>
 <head>
 <link href="estilos.css" rel="stylesheet" type="text/css">
 <title>Resultado da pesquisa</title>
 </head>
 <body>
 
 <!-- Criando tabela e cabeçalho de dados: -->
 <table border="1" style='width:50%'>
 <tr>
 <th>Login</th>
 <th>Senha</th>
 <th>Email</th>
 </tr>
 
 <!-- Preenchendo a tabela com os dados do banco: -->
 <?php
  
  $sql = "DELETE FROM tb_user WHERE codigo=3";

if ($strcon->query($sql) === TRUE) {
  echo "Registro deletado com sucesso";
} else {
  echo "Error na deleção do Registro: " . $strcon->error;
}

 mysqli_close($strcon);

?>
</body>
</html>