<?php
 // Conectando ao banco de dados:
 //include_once("../controler/conectar.php");
 
  include_once("../controler/local.php");
 
 // Recebendo os dados a pesquisar
 @$pesquisa = $_POST['Sexo'];
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
 $sql = "SELECT * FROM tb_user";
 $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");
 
 // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
   $login = $registro['login'];
   $senha = $registro['senha'];
   $email = $registro['email'];
   echo "<tr>";
   echo "<td>".$login."</td>";
   echo "<td>".$senha."</td>";
   echo "<td>".$email."</td>";
   echo "</tr>";
   echo "------------------------------------------------------------";
 }
   echo "</table>";
 
 mysqli_close($strcon);

?>
</body>
</html>