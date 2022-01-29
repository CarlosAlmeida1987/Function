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
 
 $sql2 = "INSERT INTO tb_user
  (codigo, email, login, senha)
VALUES
  ('9', 'adriellevr@gmail.com', 'Adrielle', 'grifo1987');";

if ($strcon->query($sql2) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql2 . "<br>" . $strcon->error;
}

 mysqli_close($strcon);

?>
</body>
</html>