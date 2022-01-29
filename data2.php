<?php
 // Conectando ao banco de dados:
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
	   $idImpressao = ",".$registro430['Impressao_idImpressao'];
	 }
 }
 
 echo $idImpressao."<br>";
  
         echo   $sql1 = "SELECT i.idImpressao, i.Produto_idProduto, i.Etapa_idEtapa, i.Cliente_idCliente, i.Tipo_idTipo, i.qtd, i.Cor, i.tamanho, i.obs , t.css, c.nome, c.endereco, p.nome produto FROM impressao i, produto p, etapa e, tipo t, cliente c WHERE i.idImpressao in (".$idImpressao.") and i.Produto_idProduto = p.idProduto and i.Etapa_idEtapa = e.idEtapa and i.Tipo_idTipo = t.idTipo and i.Cliente_idCliente = c.idCliente;";

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
	$css = $registro1['css'];
	$nome = $registro1['nome'];
	$endereco = $registro1['endereco'];
	
	
	
				$sql43 = "SELECT l.nome, l.data FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 2 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado43 = mysqli_query($strcon,$sql43) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro43 = mysqli_fetch_array($resultado43))
 {	
	$ajuste = $registro43['nome'];
	$data = $registro43['data'];
 }
?>
	               
            <?Php if($Tipo_idTipo == 1){?>           
           
          <div id="box6" >
          <img class="img_f" src="img/fundo_600_410.jpg" width="600" height="411" alt=""/>
                <div id="<?Php echo $css; ?>" class="clearfix"> 
            </div>
                
                <div id="box8" class="clearfix">
                  
                </div>
                <div id="box9" class="clearfix">
                
                </div>
                <div id="box10" class="clearfix">
                
              </div>
                <div id="box11" class="clearfix">
               <?Php echo $data; ?>
                </div>
                <div id="box12" class="clearfix">
                <?php echo $nome; ?>
                </div>
                <div id="box13" class="clearfix">
                <?Php echo $ajuste; ?>
              </div>
                <div id="box14" class="clearfix">
                <?Php echo $endereco; ?>
              </div>
                <div id="box15" class="clearfix">
                <p>01</p>
                <?php 
				$sql13 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 1 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado13 = mysqli_query($strcon,$sql13) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro13 = mysqli_fetch_array($resultado13))
 {	
	$Links1 = $registro13['Links'];
 }
?>
			
                <img src="img/<?Php echo $Links1;?>" width="100%" alt=""/> 
                </div>
                <div id="box16" class="clearfix">
                <p>02</p>
                                <?php 
				$sql14 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 2 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado14 = mysqli_query($strcon,$sql14) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro14 = mysqli_fetch_array($resultado14))
 {	
	$Links2 = $registro14['Links'];
 }
?>
                <img src="img/<?Php echo $Links2;?>" width="100%" alt=""/>
                </div>
                <div id="box17" class="clearfix">
                <?Php echo $produto; ?>
                </div>
                <div id="box18" class="clearfix">
                <?Php echo $qtd;?>
                </div>
                <div id="box19" class="clearfix">
                <?Php echo $cor;?>
                </div>
                <div id="box20" class="clearfix">
                <?Php echo $tamanho;?>
                </div>
              <div id="box21" class="clearfix">
              <p>03</p>
                                <?php 
				$sql15 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 6 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado15 = mysqli_query($strcon,$sql15) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro15 = mysqli_fetch_array($resultado15))
 {	
    $bordar_nome = $registro15['bordar_nome'];
	$bordar_curso = $registro15['bordar_curso'];
 }
 echo $bordar_nome."<br>";
 echo $bordar_curso."<br>";
?> 
                </div>
            </div>
            <?Php } else if($Tipo_idTipo == 3){ ?>
            
            <div id="box6" >
             <img class="img_f" src="img/fundo_600_410.jpg" width="600" height="411" alt=""/>
                <div id="<?Php echo $css; ?>" class="clearfix"> 
                </div>
                
                <div id="box8" class="clearfix">
                  
                </div>
                <div id="box9" class="clearfix">
                
                </div>
                <div id="box10" class="clearfix">
                
              </div>
                <div id="box11" class="clearfix">
                <?Php echo $data; ?>
                </div>
                <div id="box12" class="clearfix">
                 <?php echo $nome; ?>
                </div>
                <div id="box13" class="clearfix">
                <?Php echo $ajuste; ?>
              </div>
                <div id="box14" class="clearfix">
                <?Php echo $endereco; ?>
              </div>
                <div id="box210" class="clearfix">
                <p>02</p>
                <?php 
				$sql103 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 2 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado103 = mysqli_query($strcon,$sql103) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro103 = mysqli_fetch_array($resultado103))
 {	
	 $Links103 = $registro103['Links'];
	 echo "<img src='img/".$Links103."' width='100%' alt=''/>";
 }
?>
			
                
                </div>
               
                <div id="box17" class="clearfix">
                <?Php echo $produto; ?>
                </div>
                <div id="box18" class="clearfix">
                <?Php echo $qtd;?>
                </div>
                <div id="box19" class="clearfix">
                <?Php echo $cor;?>
                </div>
                <div id="box20" class="clearfix">
                <?Php echo $tamanho;?>
                </div>
              <div id="box21" class="clearfix">
              <p>01</p>
                <?php 
				
				$sql105 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 6 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado105 = mysqli_query($strcon,$sql105) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro105 = mysqli_fetch_array($resultado105))
 {	
    $bordar_nome = $registro105['bordar_nome'];
	$bordar_curso = $registro105['bordar_curso'];
 }
 echo $bordar_nome."<br>";
 echo $bordar_curso."<br>";
?> 
               </div>
            </div> 
            
            <?Php } else { ?>
            
            
             <div id="box6" >
             <img class="img_f" src="img/fundo_600_410.jpg" width="600" height="411" alt=""/>
                <div id="<?Php echo $css; ?>" class="clearfix"> 
                </div>
                
                <div id="box8" class="clearfix">
                  
                </div>
                <div id="box9" class="clearfix">
                
                </div>
                <div id="box10" class="clearfix">
                
              </div>
                <div id="box11" class="clearfix">
                <?Php echo $data; ?>
                </div>
                <div id="box12" class="clearfix">
                 <?php echo $nome; ?>
                </div>
                <div id="box13" class="clearfix">
                <?Php echo $ajuste; ?>
              </div>
                <div id="box14" class="clearfix">
                <?Php echo $endereco; ?>
              </div>
                <div id="box15" class="clearfix">
                <p>02</p>
                <?php 
				$sql103 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 2 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado103 = mysqli_query($strcon,$sql103) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro103 = mysqli_fetch_array($resultado103))
 {	
	 $Links103 = $registro103['Links'];
	 echo "<img src='img/".$Links103."' width='100%' alt=''/>";
 }
?>
			
                
                </div>
                <div id="box16" class="clearfix">
                <p>03</p>
                <?php 
				$sql104 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 3 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado104 = mysqli_query($strcon,$sql104) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro104 = mysqli_fetch_array($resultado104))
 {	
	$Links104 = $registro104['Links'];
	echo "<img src='img/".$Links104."' width='100%' alt=''/>";
 }
?>
			
                </div>
                <div id="box17" class="clearfix">
                <?Php echo $produto; ?>
                </div>
                <div id="box18" class="clearfix">
                <?Php echo $qtd;?>
                </div>
                <div id="box19" class="clearfix">
                <?Php echo $cor;?>
                </div>
                <div id="box20" class="clearfix">
                <?Php echo $tamanho;?>
                </div>
              <div id="box21" class="clearfix">
              <p>01</p>
                <?php 
				
				$sql105 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 6 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado105 = mysqli_query($strcon,$sql105) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro105 = mysqli_fetch_array($resultado105))
 {	
    $bordar_nome = $registro105['bordar_nome'];
	$bordar_curso = $registro105['bordar_curso'];
 }
 echo $bordar_nome."<br>";
 echo $bordar_curso."<br>";
?> 
               </div>
            </div> 
			
			<?Php } }?>

      </div>
    </div>
    </body>
</html>

 <!-- Preenchendo a tabela com os dados do banco: -->
 <?Php

 mysqli_close($strcon);

?>