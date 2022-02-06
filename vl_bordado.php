<?php
 // Conectando ao banco de dados:
 date_default_timezone_set('America/Fortaleza');
 @include_once("controler/local.php");

 @$c = $_POST['Cliente'];
 
 //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';
	
    include "qrlib.php"; 
	
	
	//processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'Q'; 
	$matrixPointSize = 2;
?>

<!DOCTYPE html>
<html>

    <head>
	<link rel="stylesheet" href="css/boilerplate.css">
	<link rel="stylesheet" href="css/page 1.css">
    <?php include ("view/links.php"); ?>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">
    </head>
    <body>
	<?php include ("view/script.php");?>
    <?php include ("view/menu.php");?>
    <div id="primaryContainer" class="primaryContainer clearfix">
              <div class="relatorio" >
          
          <table width="100%" border="1">
  <tbody>
    <tr>
      <th scope="col">Item</th>
      <th scope="col">QR</th>
      <th scope="col">Código</th>
      <th scope="col">Impressão</th>
      <th scope="col">Cliente</th>
      <th scope="col">Produto</th>
      <th scope="col">QTD</th>
      <th scope="col">Cor</th>
      <th scope="col">Tamanho</th>
      <th scope="col">VL Bordado</th>
      <th scope="col">Modelo</th>
      <th scope="col">Data</th>
      <th scope="col">Telefone</th>
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
 $vl = 0;
  $sql1 = "SELECT i.idImpressao, i.Produto_idProduto, i.Etapa_idEtapa, i.Cliente_idCliente, i.Tipo_idTipo, i.qtd, i.Cor, i.tamanho, i.obs , t.modelo, c.nome, c.endereco, c.telefone, p.nome produto, p.nu_valor, i.pago FROM impressao i, produto p, etapa e, tipo t, cliente c WHERE i.idImpressao in (".$idImpressao.") and i.Produto_idProduto = p.idProduto and i.Etapa_idEtapa = e.idEtapa and i.Tipo_idTipo = t.idTipo and i.Cliente_idCliente = c.idCliente ORDER BY t.modelo ASC ;";
	 
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
	echo $produto = $registro1['produto'];
	$tamanho = $registro1['tamanho'];
	$obs = $registro1['obs'];
	$pago = $registro1['pago'];
	$nu_valor = $registro1['nu_valor'];
	$Produto_idProduto = $registro1['Produto_idProduto'];
	$modelo = $registro1['modelo'];
	$nome = $registro1['nome'];
	$endereco = $registro1['endereco'];
	$telefone = $registro1['telefone'];
	
	$vl_custo = 0;
	if($produto == "Blusa"){
	 $vl_custo = 6;
	}else if($produto == "Jaleco"){
		$vl_custo = 25;
	}else if($produto == "Pijama Hospitalar"){
	   $vl_custo = 10;
	}else if($produto == "Jaleco Ziper"){
		$vl_custo = 31;
	}else if($produto == "Blusa Gola Careca"){
		$vl_custo = 7; 
	}else if($produto == "Boné"){
		$vl_custo = 5; 
	}else{
		echo "Erro";
	}
	 
	 
    $pagar = 0;
	$valor = 0;
	
				$sql43 = "SELECT l.nome, l.data, l.valor FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado43 = mysqli_query($strcon,$sql43) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro43 = mysqli_fetch_array($resultado43))
 {	
	$ajuste = $registro43['nome'];
	$data = $registro43['data'];
    $valor = $registro43['valor'];
  @$pagar = $pagar + $valor; 
 }
 @$i = $i + 1;
 
 $img_qr = $idImpressao."_".$Cliente_idCliente."_".$produto."_".$data;
 $filename = $PNG_TEMP_DIR."$img_qr.png";
?>
	               

    <tr>
      <th scope="col"><?php echo $i; ?></th>
      <th scope="col"><?php 
QRcode::png("http://www.trimetria.com.br/NotadeMesa/aut_img.php?Cliente=$idImpressao", $filename, $errorCorrectionLevel, $matrixPointSize, 2);
echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';
?></th>
      <th scope="col"><?php echo $Cliente_idCliente; ?></th>
      <th scope="col"><?php echo "<a href='aut_img.php?Cliente=$idImpressao' target='_blank' > $idImpressao </a>"; ?></th>
      <th scope="col"><?php echo $nome; ?></th>
      <th scope="col"><?Php echo $produto; ?></th>
      <th scope="col"><?Php echo $qtd;?></th>
      <th scope="col"><?Php echo $cor;?></th>
      <th scope="col"><?Php echo $tamanho;?></th>
      <th scope="col"><?Php echo $pagar;?></th>
      <th scope="col"><?Php echo $modelo; ?></th>
      <th scope="col"><?Php echo $data; ?></th>
      <th scope="col"><a target="_blank" href="https://api.whatsapp.com/send?phone=55<?Php echo $telefone;?>&text=NOVA DEMANDA : <?Php echo $idImpressao;?> Solicitado: <?Php echo $produto; ?> Tamanho: <?Php echo $tamanho;?> Assunto: <?Php echo $modelo; ?> Qual nome e sobrenome para Bordar? "> Whatsapp <?Php echo $telefone;?> Enviar</a></th>
    </tr>
		<?Php  
	 		@$Mercadoria = $Mercadoria + $nu_valor;
			@$Total =  $Total + $pagar;
	 		@$Custo =  $Custo + $vl_custo;	
		?>
        
			<?Php }?>
               <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">Custo</th>
      <th scope="col"><?Php echo $Custo; ?></th>
      <th scope="col">Mercadoria</th>
      <th scope="col"><?Php echo $Mercadoria; ?></th>
      <th scope="col"></th>
      <th scope="col">Total</th>
      <th scope="col"><?Php echo $Total; ?></th>
      <th scope="col"><?Php echo $Total+$Mercadoria+$Custo; ?></th>
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