<?php
 // Conectando ao banco de dados:
 @include_once("controler/local.php");

 @$c = $_POST['Cliente'];
 
 $sql91 = "SELECT css FROM `designer`  WHERE`ativo` = '1';";
	 
  $resultado91 = mysqli_query($strcon,$sql91) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro91 = mysqli_fetch_array($resultado91))
 {	 

	  @$colection = $registro91['css'];
	  @$designer = $designer." ".$colection;
 
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
    <?Php echo $designer; ?>  
    </style>
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
	

	
	
	/*$sql43 = "SELECT l.nome, l.data FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." or l.position = 2 or l.position = 1 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado43 = mysqli_query($strcon,$sql43) or die("Erro ao retornar dados");
 $ajuste = " ";
 // Obtendo os dados por meio de um loop while
 while (@$registro43 = mysqli_fetch_array($resultado43))
 {	
	$ajuste = $registro43['nome'];
	$data = $registro43['data'];
 } */
 
 $sql43 = "SELECT l.nome, l.data, l.valor, l.position, l.bordar_nome, l.bordar_curso, i.idImagens FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.Imagens_idImagens = i.idImagens;";
	 
 $resultado43 = mysqli_query($strcon,$sql43) or die("Erro ao retornar dados 2");
 $vetor = array('ajuste1' => " ", 'ajuste2' => " ", 'ajuste3' => " ",'ajuste4' => " ",'ajuste5' => " ",'ajuste6' => " ");
 // Obtendo os dados por meio de um loop while
 while (@$registro43 = mysqli_fetch_array($resultado43))
 {	
	
	$ajuste = $registro43['nome'];
	$data = $registro43['data'];
	$position = $registro43['position'];
	//$idImagens = $registro43['idImagens'];
	//$bordar_nome = $registro43['bordar_nome'];
	//$bordar_curso = $registro43['bordar_curso'];
	//$valor = $registro43['valor'];
	
	if($position == 1){
		$vetor['ajuste1'] = $ajuste;
		$position1 = 1;
		break;
		}else if($position == 2){
			$vetor['ajuste2'] = $ajuste;
			$position2 = 2;
			break;
			}
		else if($position == 3){ 
				$vetor['ajuste3'] = $ajuste;
				$position3 = 3;
				break;
			}
		else if($position == 4){
			$vetor['ajuste4'] = $ajuste;
			$position4 = 4;
			break;
			}
		else if($position == 5){
				$vetor['ajuste5'] = $ajuste;
				$position5 = 5;
				break;
				}
		else if($position == 6){
				$vetor['ajuste6'] = $ajuste;
				$position6 = 6;
				break;
				}else{
			echo $position;
				}
		
 }
 $ajustes = $vetor['ajuste1'].$vetor['ajuste2'].$vetor['ajuste3'].$vetor['ajuste4'].$vetor['ajuste5'].$vetor['ajuste6'];
 //$listas = array($mods);
// $mods = " ";
 //var_dump($listas);
?>
	               
            <?Php if($Tipo_idTipo == 1){
				$Links1 = " ";
				$Links2 = " ";
				$Links103 = " ";
				$Links104 = " ";
				$Links108 = " ";
				$bordar_nome = " ";
                $bordar_curso = " ";
				?>           
           
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
                <?Php echo $tamanho;
				
				echo "</br></br> Impressao: $idImpressao";
				
				?>
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
            <?Php } else if($Tipo_idTipo == 3){ 
			    $Links1 = " ";
				$Links2 = " ";
				$Links103 = " ";
				$Links104 = " ";
				$Links108 = " ";
				$bordar_nome = " ";
                $bordar_curso = " ";
				?>       
            
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
                <?Php echo $tamanho;
				echo "</br></br> Impressao: $idImpressao";
				?>
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
                <?Php echo $tamanho;
				echo "</br></br> Impressao: $idImpressao";
				?>
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
 
 <?Php } else if($Tipo_idTipo == 4){ 
 				$Links1 = " ";
				$Links2 = " ";
				$Links103 = " ";
				$Links104 = " ";
				$Links108 = " ";
				$bordar_nome = " ";
                $bordar_curso = " ";
				?>       
            
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
                <?Php echo $tamanho;
				echo "</br></br> Impressao: $idImpressao";
				?>
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
<?Php } else if($Tipo_idTipo == 2){ 
				$Links1 = " ";
				$Links2 = " ";
				$Links103 = " ";
				$Links104 = " ";
				$Links108 = " ";
				$bordar_nome = " ";
                $bordar_curso = " ";
				?>       
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
                <?Php echo $tamanho;
				echo "</br></br> Impressao: $idImpressao";
				?>
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
  <?Php } else if($Tipo_idTipo == 8){ 
  				$Links1 = " ";
				$Links2 = " ";
				$Links103 = " ";
				$Links104 = " ";
				$Links108 = " ";
				$bordar_nome = " ";
                $bordar_curso = " ";
				?>       
            
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
                <?Php echo $tamanho;
				echo "</br></br> Impressao: $idImpressao";
				?>
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
 <?Php } else if($Tipo_idTipo == 10){ 
 
 				$Links1 = " ";
				$Links2 = " ";
				$Links103 = " ";
				$Links104 = " ";
				$Links108 = " ";
				$bordar_nome = " ";
                $bordar_curso = " ";
				?>       
            
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
                <?Php echo $tamanho;
				echo "</br></br> Impressao: $idImpressao";
				?>
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
 <?Php } else if($Tipo_idTipo == 9){ 
 
 $Links1 = " ";
				$Links2 = " ";
				$Links103 = " ";
				$Links104 = " ";
				$Links108 = " ";
				$bordar_nome = " ";
                $bordar_curso = " ";
				?>       
            
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
                <?Php echo $tamanho;
				echo "</br></br> Impressao: $idImpressao";
				?>
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
 <?Php } else if($Tipo_idTipo == 6){ $Links1 = " ";
				$Links2 = " ";
				$Links103 = " ";
				$Links104 = " ";
				$Links108 = " ";
				$bordar_nome = " ";
                $bordar_curso = " ";
				?>       
            
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
                <?Php echo $tamanho;
				echo "</br></br> Impressao: $idImpressao";
				?>
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
 <?Php } else if($Tipo_idTipo == 7){ $Links1 = " ";
				$Links2 = " ";
				$Links103 = " ";
				$Links104 = " ";
				$Links108 = " ";
				$bordar_nome = " ";
                $bordar_curso = " ";
				?>       
            
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
                <?Php echo $tamanho;
				
				echo "</br></br> Impressao: $idImpressao";
				?>
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
 <?Php } else if($Tipo_idTipo == 5){ $Links1 = " ";
				$Links2 = " ";
				$Links103 = " ";
				$Links104 = " ";
				$Links108 = " ";
				$bordar_nome = " ";
                $bordar_curso = " ";
				?>        
 
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
                <?Php echo $tamanho;
				echo "</br></br> Impressao: $idImpressao";
				?>
                </div>
              <div id="box21" class="clearfix">
             
               </div>
            </div>
                     
 <?Php } else if($Tipo_idTipo == 15){ 
 
  $bordar_nome = " ";
  $bordar_curso = " ";
  $Links1035 = " ";
  $Links1045 = " ";
  ?>          
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
				$sql1035 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 2 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado1035 = mysqli_query($strcon,$sql1035) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro1035 = mysqli_fetch_array($resultado1035))
 {	
	 $Links1035 = $registro1035['Links'];
	 echo "<img src='img/".$Links1035."' width='100%' alt=''/>";
 }
?>
			
                
                </div>
                <div id="box16" class="clearfix">
                <p>05</p>
                <?php 
				$sql1045 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 5 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado1045 = mysqli_query($strcon,$sql1045) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro1045 = mysqli_fetch_array($resultado1045))
 {	
	$Links1045 = $registro1045['Links'];
	echo "<img src='img/".$Links1045."' width='100%' alt=''/>";
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
                <?Php echo $tamanho;
				echo "</br></br> Impressao: $idImpressao";
				?>
                </div>
              <div id="box21" class="clearfix">
              <table width="100%" border="0">
  <tbody>
    <tr>
      <th scope="col"><p>01</p>
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
             </th>
      <th scope="col"><p>04</p>
                <?php 
				
				$sql105 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 7 and l.Imagens_idImagens = i.idImagens;";
	 
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
             </th>
    </tr>
  </tbody>
</table>

              
               </div>
            </div> 
			<!-- Fim -->
 <?Php } else if($Tipo_idTipo == 16){ 
 
  $bordar_nome = " ";
  $bordar_curso = " ";
  $Links1035 = " ";
  $Links1045 = " ";
  ?>  
            
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
				$sql1035 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 2 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado1035 = mysqli_query($strcon,$sql1035) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro1035 = mysqli_fetch_array($resultado1035))
 {	
	 $Links1035 = $registro1035['Links'];
	 echo "<img src='img/".$Links1035."' width='100%' alt=''/>";
 }
?>
			
                
                </div>
                <div id="box16" class="clearfix">
                <p>05</p>
                <?php 
				
				$sql105 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 7 and l.Imagens_idImagens = i.idImagens;";
	 
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
                <?Php echo $tamanho;
				echo "</br></br> Impressao: $idImpressao";
				?>
                </div>
              <div id="box21" class="clearfix">
              <table width="100%" border="0">
  <tbody>
    <tr>
      <th scope="col"><p>01</p>
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
             </th>
      <th scope="col">
                
             </th>
    </tr>
  </tbody>
</table>

              
               </div>
            </div> 
			<!-- Fim -->
 <?Php } else if($Tipo_idTipo == 17){
	 
  $bordar_nome = " ";
  $bordar_curso = " ";
  $Links1035 = " ";
  $Links1045 = " ";
  ?>  
            
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
				$sql1035 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 2 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado1035 = mysqli_query($strcon,$sql1035) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro1035 = mysqli_fetch_array($resultado1035))
 {	
	 $Links1035 = $registro1035['Links'];
	 echo "<img src='img/".$Links1035."' width='100%' alt=''/>";
 }
?>
			
                
                </div>
                <div id="box16" class="clearfix">
                <p>05</p>
                <?php 
				
				$sql105 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = 7 and l.Imagens_idImagens = i.idImagens;";
	 
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
                <?Php echo $tamanho;
				echo "</br></br> Impressao: $idImpressao";
				?>
                </div>
              <div id="box21" class="clearfix">
              <table width="100%" border="0">
  <tbody>
    <tr>
      <th scope="col"><p>01</p>
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
             </th>
      <th scope="col">
                
             </th>
    </tr>
  </tbody>
</table>

              
               </div>
            </div> 
			<!-- Fim -->
            
<?Php } else { ?>
            
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
                <p>03</p>
                <?php 
				$sql103 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = $position3 and l.Imagens_idImagens = i.idImagens;";
	 
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
                <p>02</p>
                <?php 
				$sql104 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = $position2 and l.Imagens_idImagens = i.idImagens;";
	 
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
                <?Php echo $tamanho;
				echo "</br></br> Impressao: $idImpressao";
				?>
                </div>
              <div id="box21" class="clearfix">
              
              <?php 
			  echo "<p>01</p>";
				if($position6 = 6){
				$sql105 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = $position6 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado105 = mysqli_query($strcon,$sql105) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro105 = mysqli_fetch_array($resultado105))
 {	
    $bordar_nome = $registro105['bordar_nome'];
	$bordar_curso = $registro105['bordar_curso'];
 }
 echo $bordar_nome."<br>";
 echo $bordar_curso."<br>";
				}else if(($position1 = 1)){
					
					echo "<p>01</p>";
 
				$sql107 = "SELECT l.bordar_nome, l.bordar_curso, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.position = $position1 and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado107 = mysqli_query($strcon,$sql107) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro107 = mysqli_fetch_array($resultado107))
 {	
	 $Links107 = $registro107['Links'];
	 echo "<img src='img/".$Links107."' width='100%' alt=''/>";
 }
					
					}
?> 
             
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