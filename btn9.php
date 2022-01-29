<?php
 // Conectando ao banco de dados:
 @include_once("controler/local.php");
 
 @$c = $_POST['Cliente'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bordado</title>
</head>

<body>
<form action="nota4.php" method="post" name="form1" target="_parent" id="form1">
  <label for="Cliente">Cliente:</label>
  <input type="text" name="Cliente" id="Cliente">
  <input type="submit" name="submit" id="submit" value="Imprimir">
</form>

<?Php  $sql1 = "SELECT i.idImpressao, i.Produto_idProduto, i.Etapa_idEtapa, i.Cliente_idCliente, i.Tipo_idTipo, i.qtd, i.Cor, i.tamanho, i.obs , t.css, c.nome, c.endereco, p.nome produto, i.pago FROM impressao i, produto p, etapa e, tipo t, cliente c WHERE i.Produto_idProduto = p.idProduto and i.Etapa_idEtapa = e.idEtapa and i.Tipo_idTipo = t.idTipo and i.Cliente_idCliente = c.idCliente;";
	 
  $resultado1 = mysqli_query($strcon,$sql1) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro1 = mysqli_fetch_array($resultado1))
 {	
 	echo " ----------------------------------------------------------- <br>";

	
    $Tipo_idTipo = $registro1['Tipo_idTipo'];
    echo $idImpressao = "idImpressao: ".$registro1['idImpressao']."<br>";
	$Etapa_idEtapa = $registro1['Etapa_idEtapa'];
	echo $Cliente_idCliente = "idCliente: ".$registro1['Cliente_idCliente']."<br>";
	$qtd = $registro1['qtd'];
	$cor = $registro1['Cor'];
	echo $produto = "produto: ".$registro1['produto']."<br>";
	echo $tamanho = $registro1['tamanho'];
	echo $obs = $registro1['obs'];
	echo $pago = $registro1['pago'];
	$Produto_idProduto = $registro1['Produto_idProduto'];
	$css = $registro1['css'];
	echo $nome = "nome: ".$registro1['nome']."<br>";
	$endereco = $registro1['endereco'];
	
	echo " ----------------------------------------------------------- <br>";

	
				/* $sql43 = "SELECT l.nome, l.data FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 1 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado43 = mysqli_query($strcon,$sql43) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro43 = mysqli_fetch_array($resultado43))
 {	
	echo $ajuste = $registro43['nome']."<br>";
	echo $data = $registro43['data']."<br>";
 } */
 }
?>
</body>
</html>