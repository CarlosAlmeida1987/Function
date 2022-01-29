<?php
 // Conectando ao banco de dados:
 @include_once("controler/local.php");

 @$c = $_POST['Cliente'];
 
 if (!$c){
	 @$c = date("Y-m-d");
	 }
 
?>

<!DOCTYPE html>
<html>

    <head>
	<link rel="stylesheet" href="css/boilerplate.css">
	<link rel="stylesheet" href="css/page 1.css">
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">
    <title>Sistema de Pedidos</title>
    </head>
    <body>
    
    <table width="100%" border="1">
  <tbody>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><a href="organizar.php"></a></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="btn8.php">01 - Zap Data</a></td>
      <td>2021-01-01</td>
      <td><a href="organizar.php">01 - Organizar</a><a href="separar.php"></a></td>
      <td>Null</td>
      <td>&nbsp;</td>
      <td><a href="cad_img.php">01 - Cadastro Impreções</a></td>
      <td>Inicio</td>
      <td><a href="cad_tipo.php">01 - Cadastrar Tipo</a></td>
    </tr>
    <tr>
      <td><a href="btn3.php">02 - Zap Valor</a></td>
      <td>1</td>
      <td><a href="separar.php">02 - Fabricar e Separar</a><a href="fabricacao.php"></a></td>
      <td>Ativo</td>
      <td>&nbsp;</td>
      <td><a href="btn6.php">02 - Bordado</a></td>
      <td>Comanda</td>
      <td><a href="cad_produto.php">02 - Cadastrar Produto</a></td>
    </tr>
    <tr>
      <td><a href="btn4.php">03 - Data</a></td>
      <td>2021-01-01</td>
      <td><a href="fabricacao.php">03 - Enviado para Bordado</a><a href="entregar.php"></a></td>
      <td>Bordado</td>
      <td><a href="btn.php"></a></td>
      <td><a href="btn7.php">03 - Nota2</a></td>
      <td>Lista </td>
      <td><a href="cad_bordado.php">03 - Cadastrar Imagem</a></td>
    </tr>
    <tr>
      <td><a href="btn5.php">04 - Lista Valor</a></td>
      <td>1</td>
      <td><a href="entregar.php">04 - Entregar</a><a href="organizar.php"></a></td>
      <td>Pronto</td>
      <td>&nbsp;</td>
      <td><a href="aut_img.php?Cliente=1">04 - Atualização</a></td>
      <td>Correções</td>
      <td><a href="cad_etapa.php">04 - Cadastrar Etapa</a></td>
    </tr>
    <tr>
      <td><a href="btn2.php">05 - Nota1 Valor</a></td>
      <td>1</td>
      <td><a href="fab_imp.php">05 - Comanda Pedente</a></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><a href="zap_cliente.php?Cliente=1">05 - Zap Cliente</a></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="btn.php">06 - Imprimir Lista Valor</a></td>
      <td>1</td>
      <td><a href="ok.php">06 - Finalizados</a></td>
      <td>OK</td>
      <td>&nbsp;</td>
      <td><a href="nota3.php?Cliente=Carlos">06 - Busca Nome</a></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="separar.php"></a></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><a href="btn9.php">07 - Nota QR-Code</a></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="fabricacao.php"></a></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><a href="nota5.php?Cliente=Carlos">08 - Busca Turma</a></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><a href="entregar.php"></a></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>


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
	   $idImpressao = $idImpressao.",".$registro430['Impressao_idImpressao'];
	 }
 }
   
      $sql1 = "SELECT i.idImpressao, i.Produto_idProduto, i.Etapa_idEtapa, i.Cliente_idCliente, i.Tipo_idTipo, i.qtd, i.Cor, i.tamanho, i.obs , t.css, c.nome, c.endereco, p.nome produto FROM impressao i, produto p, etapa e, tipo t, cliente c WHERE i.idImpressao in (".$idImpressao.") and i.Produto_idProduto = p.idProduto and i.Etapa_idEtapa = e.idEtapa and i.Tipo_idTipo = t.idTipo and i.Cliente_idCliente = c.idCliente;";

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
                <?Php echo $ajustes; ?>
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
                <?Php echo $ajustes; ?>
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
            
            <?Php } else if($Tipo_idTipo == 10){ ?>
            
            <!-- Inicio -->
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
                <?Php echo $ajustes; ?>
              </div>
                <div id="box14" class="clearfix">
                <?Php echo $endereco; ?>
              </div>
                <div id="box15" class="clearfix">
               
			
                
                </div>
                <div id="box16" class="clearfix">
               
			
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
			<!-- Fim --> 
 
 <?Php } else if($Tipo_idTipo == 4){ ?>
            
            <!-- Inicio -->
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
                <?Php echo $ajustes; ?>
              </div>
                <div id="box14" class="clearfix">
                <?Php echo $endereco; ?>
              </div>
                <div id="box15" class="clearfix">
               
			
                
                </div>
                <div id="box16" class="clearfix">
               
			
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
			<!-- Fim -->
<?Php } else if($Tipo_idTipo == 2){ ?>
 <!-- Inicio -->
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
                <?Php echo $ajustes; ?>
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
				$sql108 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 1 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado108 = mysqli_query($strcon,$sql108) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro108 = mysqli_fetch_array($resultado108))
 {	
	$Links108 = $registro108['Links'];
	echo "<img src='img/".$Links108."' width='100%' alt=''/>";
 }
?>

               </div>
            </div> 
			<!-- Fim -->
  <?Php } else if($Tipo_idTipo == 8){ ?>
            
            <!-- Inicio -->
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
                <?Php echo $ajustes; ?>
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
			<!-- Fim -->
 <?Php } else if($Tipo_idTipo == 10){ ?>
            
            <!-- Inicio -->
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
                <?Php echo $ajustes; ?>
              </div>
                <div id="box14" class="clearfix">
                <?Php echo $endereco; ?>
              </div>
                <div id="box15" class="clearfix">
               
			
                
                </div>
                <div id="box16" class="clearfix">
               
			
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
			<!-- Fim -->
 <?Php } else if($Tipo_idTipo == 9){ ?>
            
            <!-- Inicio -->
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
                <?Php echo $ajustes; ?>
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
 <?Php } else if($Tipo_idTipo == 6){ ?>
            
            <!-- Inicio -->
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
                <?Php echo $ajustes; ?>
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
			
                </div>                <div id="box17" class="clearfix">
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
			<!-- Fim -->
 <?Php } else if($Tipo_idTipo == 7){ ?>
            
            <!-- Inicio -->
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
                <?Php echo $ajustes; ?>
              </div>
                <div id="box14" class="clearfix">
                <?Php echo $endereco; ?>
              </div>
                <div id="box15" class="clearfix">
               
			
                
                </div>
                <div id="box16" class="clearfix">
               
			
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
			<!-- Fim -->
            
 <?Php } else if($Tipo_idTipo == 5){ ?>
            
            <!-- Inicio -->
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
                <?Php echo $ajustes; ?>
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
                <p>01</p>
                <?php 
				$sql104 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 1 and l.Imagens_idImagens = i.idImagens;";
	 
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
             
               </div>
            </div> 
			<!-- Fim -->
			<?Php } }?>

      </div>
    </div>
    </body>
</html>

 <!-- Preenchendo a tabela com os dados do banco: -->
 <?Php

 mysqli_close($strcon);

?>