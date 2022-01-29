<?php
 // Conectando ao banco de dados:
 date_default_timezone_set('America/Fortaleza');
 @include_once("controler/local.php");

@$id = $_POST['idCliente'];
   @$idImpressao = $_POST['idImpressao'];
    @$Atualizar = $_POST['Status'];
	
 if($Atualizar == "OK"){
	  // Ativo Bordado Pronto
 $sql1 = "UPDATE `impressao` 
SET `fl_status` = ' '
WHERE Cliente_idCliente = ".$id." and idImpressao = '".$idImpressao."';";

if ($strcon->query($sql1) === TRUE) {
  echo "<br> Nova gravação criada com sucesso Impressão 1 <br>";
} else {
  echo "Error: " . $sql1 ." --- <br>" . $strcon->error;
}
  }

?>

<!DOCTYPE html>
<html>

    <head>
	<link rel="stylesheet" href="css/boilerplate.css">
	<link rel="stylesheet" href="css/page 1.css">
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">
    
<style>
     input{
    display: block;
    margin: 5px;
    font-size: 16pt;
    padding: 10px 20px;
} 
    </style>
   

    </head>
    <body>

    <div id="primaryContainer" class="primaryContainer clearfix">
              <div class="relatorio" >
          
          <table width="100%" border="1">
  <tbody>
    <tr> 
      <th scope="col">Cliente</th>
      <th scope="col">Impressão</th>
      <th scope="col">Produto</th>
      <th scope="col">QTD</th>
      <th scope="col">Cor</th>
      <th scope="col">Tamanho</th>
      <th scope="col">Zap</th>
      <th scope="col">Modelo</th>
      <th scope="col">Data</th>
      <th scope="col">&nbsp;</th>
    </tr>
       <!-- i.Cliente_idCliente in (".$c.") -->
           <?Php 
   $sql1 = "SELECT i.idImpressao, i.Produto_idProduto, i.Etapa_idEtapa, i.Cliente_idCliente, i.Tipo_idTipo, i.qtd, i.Cor, i.tamanho, i.obs , t.modelo, c.nome, c.endereco, p.nome produto, c.telefone FROM impressao i, produto p, etapa e, tipo t, cliente c WHERE i.fl_status = 'OK' and i.Produto_idProduto = p.idProduto and i.Etapa_idEtapa = e.idEtapa and i.Tipo_idTipo = t.idTipo and i.Cliente_idCliente = c.idCliente;";
	 
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
	$Produto_idProduto = $registro1['Produto_idProduto'];
	$modelo = $registro1['modelo'];
	$nome = $registro1['nome'];
	$endereco = $registro1['endereco'];
	$telefone = $registro1['telefone'];

	
				$sql43 = "SELECT l.nome, l.data, l.valor FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 2 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado43 = mysqli_query($strcon,$sql43) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro43 = mysqli_fetch_array($resultado43))
 {	
	$ajuste = $registro43['nome'];
	$data = $registro43['data'];
	$valor = $registro43['valor'];
 }
?>
	               

    <tr>
      <th scope="col"><?php echo $nome; ?></th>
      <th scope="col"><?php echo $idImpressao; ?></th>
      <th scope="col"><?Php echo $produto; ?></th>
      <th scope="col"><?Php echo $qtd;?></th>
      <th scope="col"><?Php echo $cor;?></th>
      <th scope="col"><?Php echo $tamanho;?></th>
      <th scope="col"><a target="_blank" href="https://api.whatsapp.com/send?phone=55<?Php echo $telefone;?>&text=NOVA DEMANDA : <?Php echo $idImpressao;?> Solicitado: <?Php echo $produto; ?> Tamanho: <?Php echo $tamanho;?> Assunto: <?Php echo $modelo; ?> Qual nome e sobrenome para Bordar? "> Whatsapp <?Php echo $telefone;?> Enviar</a></th>
      <th scope="col"><?Php echo $modelo; ?></th>
      <th scope="col"><?Php echo $data; ?></th>
      <th scope="col">
      <form action="ok.php" method="post" enctype="multipart/form-data" target="_parent" accept-charset="UTF-8">
          
          <input name="Status" type="hidden" id="Status" value="OK">
          <input name="idCliente" type="hidden" id="idCliente" value="<?Php echo $Cliente_idCliente; ?>">
          <input name="idImpressao" type="hidden" id="idImpressao" value="<?Php echo $idImpressao; ?>">
          
      <input name="Entrega" type="submit" id="input" value="OK"></input>
      
      </form>
      </th>
    </tr>
		<?Php  @$Total = $Total + $pago;?>
        
			<?Php }?>
               <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">Total</th>
      <th scope="col"><?Php echo $Total; ?></th>
      <th scope="col"></th>
      <th scope="col"><?php echo date("d-m-Y H:i:s"); ?></th>
      <th scope="col">&nbsp;</th>
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