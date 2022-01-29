<?php
 // Conectando ao banco de dados:
include ("../controler/conexao.php");
 
 // Recebendo os dados a pesquisar
 @$pesquisa = $_POST['email'];
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
 $sql = "SELECT * FROM tb_user WHERE email = $pesquisa";
 //$resultado = mysqli_query($conexao,$sql) or die("Erro ao retornar dados");
$result = $conexao->query($sql);

/* numeric array */
$row = $result->fetch_array(MYSQLI_NUM);
printf ("%s (%s)\n", $row[0], $row[1]);  

/* associative array */
$row = $result->fetch_array(MYSQLI_ASSOC);
printf ("%s (%s)\n", $row["login"], $row["senha"]);  

/* associative and numeric array */
$row = $result->fetch_array(MYSQLI_BOTH);
printf ("%s (%s)\n", $row[0], $row["senha"]);  
 
 // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($result))
 {
   $login = $registro['login'];
   $senha = $registro['senha'];
   $email = $registro['email'];
   echo "<tr>";
   echo "<td>".$login."</td>";
   echo "<td>".$senha."</td>";
   echo "<td>".$email."</td>";
   echo "</tr>";
 }
 
 echo "</table>";
 
 $sql = "SELECT * FROM tb_user WHERE email = $pesquisa";

    if ($result = $conexao->query($sql)) {
        while($obj = $result->fetch_object()){
          print  $line.=$obj->login;
          print  $line.=$obj->senha;
          print  $line.=$obj->email;
        }
    }
    $result->close();
    unset($obj);
    unset($sql);
    unset($query);
	
$result = $conexao->query("SELECT * FROM tb_user WHERE email = $pesquisa");

if($result){
     // Cycle through results
    while ($row = $result->fetch_object()){
       print $user_arr[] = $row;
    }
    // Free result set
    $result->close();
    $db->next_result();
}
	
	mysqli_close($conexao);
?>
</body>
</html>