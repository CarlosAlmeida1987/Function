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

<?Php  $sql1 = "SELECT c.idreserva, c.nome, c.telefone, c.produto, c.tamanho, c.curso, c.obs, c.fl_status, c.data_cadastro FROM reserva c";
	 
  $resultado1 = mysqli_query($strcon,$sql1) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro1 = mysqli_fetch_array($resultado1))
 {	
 	echo " ----------------------------------------------------------- <br>";

	echo $Cliente_idreserva = "idCliente: ".$registro1['idreserva']."<br>";
	echo $nome = "nome: ".$registro1['nome']."<br>";
	echo $telefone = "telefone: ".$registro1['telefone']."<br>";
	echo $produto = "produto: ".$registro1['produto']."<br>";
	echo $tamanho = "tamanho: ".$registro1['tamanho']."<br>";
	echo $curso = "curso: ".$registro1['curso']."<br>";
	echo $obs = "obs: ".$registro1['obs']."<br>";
	echo $fl_status = "fl_status: ".$registro1['fl_status']."<br>";
	echo $data_cadastro = "data_cadastro: ".$registro1['data_cadastro']."<br>";
	 
	echo " ----------------------------------------------------------- <br>";

	
 }
?>
</body>
</html>