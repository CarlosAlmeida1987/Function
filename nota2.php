<?php
 // Conectando ao banco de dados:
 date_default_timezone_set('America/Fortaleza');
 @include_once("controler/local.php");

 @$c = $_POST['Cliente'];
?>

<!DOCTYPE html>
<html>

    <head>
	<link rel="stylesheet" href="css/boilerplate.css">
	<link rel="stylesheet" href="css/page 1.css">
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">
    </head>
    <body>

    <div id="primaryContainer" class="primaryContainer clearfix">
              <div class="relatorio" >
          
          <table width="100%" border="1">
  <tbody>
    <tr>
      <th scope="col">Item</th>
      <th scope="col">Código</th>
      <th scope="col">Impressão</th>
      <th scope="col">Cliente</th>
      <th scope="col">Produto</th>
      <th scope="col">QTD</th>
      <th scope="col">Cor</th>
      <th scope="col">Tamanho</th>
      <th scope="col">Valor</th>
      <th scope="col">Modelo</th>
      <th scope="col">Data</th>
    </tr>
       <!-- i.Cliente_idCliente in (".$c.") -->
            <!-- i.Cliente_idCliente in (".$c.") -->
   <?Php $sql430 = "SELECT DISTINCT l.Impressao_idImpressao FROM lista_bordados l, imagens i WHERE l.data = '".$c."' and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado430 = mysqli_query($strcon,$sql430) or die("Erro ao retornar dados");
  $idImpressao = 0;
 // Obtendo os dados por meio de um loop while
 while (@$registro430 = mysqli_fetch_array($resultado430))
 {	 
	
	 if($idImpressao == 0){
	  $idImpressao = $registro430['Impressao_idImpressao'];
  } else{
	   $idImpressao = $idImpressao.",".$registro430['Impressao_idImpressao'];
	 }
 }
 
  $sql1 = "SELECT i.idImpressao, i.Produto_idProduto, i.Etapa_idEtapa, i.Cliente_idCliente, i.Tipo_idTipo, i.qtd, i.Cor, i.tamanho, i.obs , t.modelo, c.nome, c.endereco, p.nome produto , i.pago FROM impressao i, produto p, etapa e, tipo t, cliente c WHERE i.idImpressao in (".$idImpressao.") and i.Produto_idProduto = p.idProduto and i.Etapa_idEtapa = e.idEtapa and i.Tipo_idTipo = t.idTipo and i.Cliente_idCliente = c.idCliente;";
	 
  $resultado1 = mysqli_query($strcon,$sql1) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro1 = mysqli_fetch_array($resultado1))
 {	
    $Tipo_idTipo = $registro1['Tipo_idTipo'];
    $idImpressao = $registro1['idImpressao'];
	$Etapa_idEtapa = $registro1['Etapa_idEtapa'];
	$Cliente_idCliente = $registro1['Cliente_idCliente'];
	$qtd = $registro1['qtd'];
	$cor = $registro1['Cor'];
	$produto = $registro1['produto'];
	$tamanho = $registro1['tamanho'];
	$obs = $registro1['obs'];
	$pago = $registro1['pago'];
	$Produto_idProduto = $registro1['Produto_idProduto'];
	$modelo = $registro1['modelo'];
	$nome = $registro1['nome'];
	$endereco = $registro1['endereco'];
	

	
				$sql43 = "SELECT l.nome, l.data, l.valor FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 2 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado43 = mysqli_query($strcon,$sql43) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro43 = mysqli_fetch_array($resultado43))
 {	
	$ajuste = $registro43['nome'];
	$data = $registro43['data'];
	//$valor = $registro43['valor'];
 }
 @$i = $i + 1;
?>
	               

    <tr>
      <th scope="col"><?php echo $i; ?></th>
      <th scope="col"><?php echo $Cliente_idCliente; ?></th>
      <th scope="col"><?php echo $idImpressao; ?></th>
      <th scope="col"><?php echo $nome; ?></th>
      <th scope="col"><?Php echo $produto; ?></th>
      <th scope="col"><?Php echo $qtd;?></th>
      <th scope="col"><?Php echo $cor;?></th>
      <th scope="col"><?Php echo $tamanho;?></th>
      <th scope="col"><?Php echo $pago;?></th>
      <th scope="col"><?Php echo $modelo; ?></th>
      <th scope="col"><?Php echo $data; ?></th>
    </tr>
		<?Php  
			@$Total = $Total + $pago;	
		?>
        
			<?Php }?>
               <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">Total</th>
      <th scope="col"><?Php echo $Total; ?></th>
      <th scope="col"></th>
      <th scope="col"><?php echo date("d-m-Y H:i:s"); ?></th>
    </tr>
  </tbody>
</table>
      </div>
    </div>
    </body>
</html>

 <!-- Preenchendo a tabela com os dados do banco: -->
 <?Php

 mysqli_close($strcon);

?>