<?php
 // Conectando ao banco de dados:
 @include_once("controler/local.php");
 
 @$c = $_POST['Cliente'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form action="nota3.php" method="get" name="form1" target="_parent" id="form1">
  <label for="Nome">Cliente:</label>
  <input type="text" name="Cliente" id="Cliente">
  <input type="submit" name="submit" id="submit" value="Imprimir">
</form>

<?Php  $sql1 = "SELECT c.idCliente, c.nome, c.telefone, c.turma, c.endereco FROM cliente c";
	 
  $resultado1 = mysqli_query($strcon,$sql1) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro1 = mysqli_fetch_array($resultado1))
 {	
 	echo " ----------------------------------------------------------- <br>";

	echo $Cliente_idCliente = "idCliente: ".$registro1['idCliente']."<br>";
	echo $nome = "nome: ".$registro1['nome']."<br>";
	echo $telefone = "telefone: ".$registro1['telefone']."<br>";
	echo $turma = "turma: ".$registro1['turma']."<br>";
	echo $endereco = "endereco: ".$registro1['endereco']."<br>";
	
	echo " ----------------------------------------------------------- <br>";

	
 }
?>
</body>
</html>