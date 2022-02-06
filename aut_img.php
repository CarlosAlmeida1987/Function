<?php
 // Conectando ao banco de dados:
 @include_once("controler/local.php");
 @$id = $_GET['Cliente'];
 @$Atualizar = $_POST['Status'];
//  include_once("../controler/local.php");
 
 // Recebendo os dados a pesquisar
 date_default_timezone_set('America/Fortaleza');
  
 @$cliente30 = $_POST['cliente'];
 @$local30 = $_POST['local'];
 @$ajuste30 = $_POST['ajuste'];
 @$telefone30 = $_POST['telefone'];
 @$pago30 = $_POST['pago'];
 @$turma30 = $_POST['turma'];
 
 @$tecido30 = $_POST['tecido'];
 @$costureira30 = $_POST['costureira'];
 @$bordado31 = $_POST['bordado'];
 
 if ($tecido30 > $costureira30 && $tecido30 > $bordado31){$etapa30 = $tecido30;}
 else if($costureira30 > $bordado31){$etapa30 = $costureira30;}
 else{$etapa30 = $bordado31;}
 @$qtd30 = $_POST['qtd'];
 @$cor30 = $_POST['cor'];
 @$tamanho30 = $_POST['tamanho'];
 @$obs30 = $_POST['obs'];
 @$bordado10 = $_POST['bordado1'];
 @$bordado20 = $_POST['bordado2'];
 @$bordado30 = $_POST['bordado3'];
 @$bordado40 = $_POST['bordado4'];
 @$bordado50 = $_POST['bordado5'];
 @$produto30 = $_POST['produto'];
 @$ajuste30 = $_POST['ajuste'];
 @$data30 = $_POST['data'];
 @$bordado30_nome = $_POST['bordado3_nome'];
 @$bordado30_curso = $_POST['bordado3_curso'];
 @$bordado31_nome = $_POST['bordado4_nome'];
 @$bordado31_curso = $_POST['bordado4_curso'];
 @$fl_status30 = $_POST['ativo'];
 $position1 = 0;
 $position2 = 0;
 $position3 = 0;
 $position4 = 0;
 $position5 = 0;
 $position6 = 0;
 $position7 = 0;
 
 if($Atualizar == "OK"){
   @$id = $_POST['Cliente'];
   @$idCliente = $_POST['idCliente'];	
 }

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
	<form action="aut_img.php" method="post" enctype="multipart/form-data" target="_parent" accept-charset="UTF-8">
    <div id="primaryContainer" class="primaryContainer clearfix">
 <?Php  
 
 if($Atualizar == "OK"){
	
$sql0 = " UPDATE `cliente`
SET nome = '".$cliente30."', telefone= '".$telefone30."', turma= '".$turma30."', endereco= '".$local30."'
WHERE idCliente = ".$idCliente."";

if ($strcon->query($sql0) === TRUE) {
  echo "<br> Nova Atualização criada com sucesso Cliente 1 <br>";
} else {
  echo "Error: " . $sql0 . "<br>" . $strcon->error;
}

$sql1 = "UPDATE `impressao` 
SET `Produto_idProduto` = ".$produto30.", `Etapa_idEtapa`=".$etapa30.", `qtd` = ".$qtd30.", `Cor` = '".$cor30."', `tamanho` = '".$tamanho30."', `obs` = '".$obs30."', `pago` = '".$pago30."', `fl_status` = '".$fl_status30."'
WHERE Cliente_idCliente = ".$idCliente." and idImpressao = '".$id."';";

if ($strcon->query($sql1) === TRUE) {
  echo "<br> Nova gravação criada com sucesso Impressão 1 <br>";
} else {
  echo "Error: " . $sql1 ." --- <br>" . $strcon->error;
}

if( $bordado10 != 0){
$sql111 = "UPDATE `lista_bordados` 
SET `nome` = '".$ajuste30."', `data` = '".$data30."', `Imagens_idImagens` = '".$bordado10."' 
WHERE Impressao_idImpressao = '".$id."' and position = 1;";

 if ($strcon->query($sql111) === TRUE) {
  echo "<br> Nova gravação criada com sucesso Imagem 1 <br>";
} else {
  echo "Error: " . $sql111 . "<br>" . $strcon->error;
}

}

if( $bordado20 != 0){
$sql12 = "UPDATE `lista_bordados` 
SET `nome` = '".$ajuste30."', `data` = '".$data30."', `Imagens_idImagens` = '".$bordado20."' 
WHERE Impressao_idImpressao = '".$id."' and position = 2;";

 if ($strcon->query($sql12) === TRUE) {
  echo "<br> Nova gravação criada com sucesso Imagem 2 <br>";
} else {
  echo "Error: " . $sql12 . "<br>" . $strcon->error;
}
}

if( $bordado30 != 0){
 $sql13 = "UPDATE `lista_bordados` 
SET `nome` = '".$ajuste30."', `data` = '".$data30."', `Imagens_idImagens` = '".$bordado30."' 
WHERE Impressao_idImpressao = '".$id."' and position = 3;";

 if ($strcon->query($sql13) === TRUE) {
  echo "<br> Nova gravação criada com sucesso Imagem 3 <br>";
} else {
  echo "Error: " . $sql13 . "<br>" . $strcon->error;
}
}

if( $bordado40 != 0){
$sql14 = "UPDATE `lista_bordados` 
SET `nome` = '".$ajuste30."', `data` = '".$data30."', `Imagens_idImagens` = '".$bordado40."' 
WHERE Impressao_idImpressao = '".$id."' and position = 4;";

 if ($strcon->query($sql14) === TRUE) {
  echo "<br> Nova gravação criada com sucesso Imagem 4 <br>";
} else {
  echo "Error: " . $sql14 . "<br>" . $strcon->error;
}
}

if( $bordado50 != 0){
$sql15 = "UPDATE `lista_bordados` 
SET `nome` = '".$ajuste30."', `data` = '".$data30."', `Imagens_idImagens` = '".$bordado50."' 
WHERE Impressao_idImpressao = '".$id."' and position = 5;";

 if ($strcon->query($sql15) === TRUE) {
  echo "<br> Nova gravação criada com sucesso Imagem 5 <br>";
} else {
  echo "Error: " . $sql15 . "<br>" . $strcon->error;
}
}

if( $bordado30_nome != '0'){
$sql16 = "UPDATE `lista_bordados` 
SET `nome` = '".$ajuste30."', `data` = '".$data30."', `bordar_nome` = '".$bordado30_nome."', `bordar_curso` = '".$bordado30_curso."'
WHERE Impressao_idImpressao = '".$id."' and position = 6;";

 if ($strcon->query($sql16) === TRUE) {
  echo "<br> Nova gravação criada com sucesso Imagem 6 <br>";
} else {
  echo "Error: " . $sql16 . "<br>" . $strcon->error;
}
}
	 
if( $bordado31_nome != '0'){
$sql17 = "UPDATE `lista_bordados` 
SET `nome` = '".$ajuste30."', `data` = '".$data30."', `bordar_nome` = '".$bordado31_nome."', `bordar_curso` = '".$bordado31_curso."'
WHERE Impressao_idImpressao = '".$id."' and position = 6;";

 if ($strcon->query($sql17) === TRUE) {
  echo "<br> Nova gravação criada com sucesso Imagem 6 <br>";
} else {
  echo "Error: " . $sql17 . "<br>" . $strcon->error;
}
}

$cad10 = "0";
				$cad20 = "0";
				$cad30 = "0";
				$cad40 = "0";
				$cad50 = "0";
				$cad60 = "0";
				
$sql100 = "SELECT l.bordar_nome, l.bordar_curso, l.position, i.Links FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$id." and l.Imagens_idImagens = i.idImagens;";
	 
  $resultado100 = my7qli_query($strcon,$sql100) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro100 = mysqli_fetch_array($resultado100))
 {	
	$position = $registro100['position'];
	
	if($position == 1){
		$cad10 = "Atualizado";
		}else if($position == 2){
			$cad20 = "Atualizado";
			}
		else if($position == 3){ 
				$cad30 = "Atualizado";
			}
		else if($position == 4){
			$cad40 = "Atualizado";
			}
		else if($position == 5){
				$cad50 = "Atualizado";
				}
		else if($position == 6){
				$cad60 = "Atualizado";
				}else{
				$cad10 = "Erro";
				$cad20 = "Erro";
				$cad30 = "Erro";
				$cad40 = "Erro";
				$cad50 = "Erro";
				$cad60 = "Erro";
				}
	
	
	
 }
 
 if($cad10 != 'Atualizado'){
				$cad10 = "OK";
			   }else if($cad20 != 'Atualizado'){
				$cad20 = "OK";
			    }else if($cad30 != 'Atualizado'){
				$cad30 = "OK";
				 }else if($cad40 != 'Atualizado'){
				$cad40 = "OK";
				 }else if($cad50 != 'Atualizado'){
				$cad50 = "OK";
				 }else if($cad60 != 'Atualizado'){
				$cad60 = "OK";
				 }else { 
				 
				 }

if($cad10  == 'OK') {
if(isset($bordado10)){
 $sql10 = "INSERT INTO `lista_bordados` (`idLista_bordados`, `Impressao_idImpressao`, `Imagens_idImagens`, `nome`, `valor`, `position`, `data`) VALUES (NULL, '".$id."', '".$bordado10."', '".$ajuste30."', '5', '1','".$data30."');";
 
 if ($strcon->query($sql10) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql10 . "<br>" . $strcon->error;
}
}
}

if($cad20  == 'OK') {
if(isset($bordado20) ){
 $sql11 = "INSERT INTO `lista_bordados` (`idLista_bordados`, `Impressao_idImpressao`, `Imagens_idImagens`, `nome`, `valor`, `position`, `data`) VALUES (NULL, '".$id."', '".$bordado20."', '".$ajuste30."', '5', '2','".$data30."');";
 
 if ($strcon->query($sql11) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql11 . "<br>" . $strcon->error;
}
}
}
if($cad30  == 'OK') {
if(isset($bordado30)){
$sql12 = "INSERT INTO `lista_bordados` (`idLista_bordados`, `Impressao_idImpressao`, `Imagens_idImagens`, `nome`, `valor`, `position`, `data`) VALUES (NULL, '".$id."', '".$bordado30."', '".$ajuste30."', '5', '3','".$data30."');";
 
 if ($strcon->query($sql12) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql12 . "<br>" . $strcon->error;
}
}
}
if($cad40  == 'OK') {
if(isset($bordado40)){
$sql13 = "INSERT INTO `lista_bordados` (`idLista_bordados`, `Impressao_idImpressao`, `Imagens_idImagens`, `nome`, `valor`, `position`, `data`) VALUES (NULL, '".$id."', '".$bordado40."', '".$ajuste30."', '5', '4','".$data30."');";
 
 if ($strcon->query($sql13) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql13 . "<br>" . $strcon->error;
}
}
}
if($cad50  == 'OK') {
if(isset($bordado5)){
$sql14 = "INSERT INTO `lista_bordados` (`idLista_bordados`, `Impressao_idImpressao`, `Imagens_idImagens`, `nome`, `valor`, `position`, `data`) VALUES (NULL, '".$id."', '".$bordado50."', '".$ajuste30."', '5', '5','".$data30."');";

 
 if ($strcon->query($sql14) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql14 . "<br>" . $strcon->error;
}
}
}
if(strlen($cad60) == 'OK'){
if(isset($bordado30_curso)){
$sql15 = "INSERT INTO `lista_bordados` (`idLista_bordados`, `Impressao_idImpressao`, `Imagens_idImagens`, `nome`, `valor`, `position`, `data`, `bordar_nome`, `bordar_curso`) VALUES (NULL, '".$id."', '2', '".$ajuste30."', '5', '6','".$data."','".$bordado30_nome."','".$bordado30_curso."');";

 if ($strcon->query($sql15) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql15 . "<br>" . $strcon->error;
}
}
}

}
 
     $sql1 = "SELECT i.idImpressao, i.Produto_idProduto, i.Etapa_idEtapa, i.Cliente_idCliente, i.Tipo_idTipo, i.qtd, i.Cor, i.tamanho, i.obs , i.fl_status, t.modelo, c.nome, c.endereco, p.nome produto, i.pago, c.telefone, c.turma, c.endereco local FROM impressao i, produto p, etapa e, tipo t, cliente c WHERE i.idImpressao in (".$id.") and i.Produto_idProduto = p.idProduto and i.Etapa_idEtapa = e.idEtapa and i.Tipo_idTipo = t.idTipo and i.Cliente_idCliente = c.idCliente;";
	 
  $resultado1 = mysqli_query($strcon,$sql1) or die("Erro ao retornar dados 1");

 // Obtendo os dados por meio de um loop while
 while (@$registro1 = mysqli_fetch_array($resultado1))
 {	
    $tipo = $registro1['Tipo_idTipo'];
	$telefone = $registro1['telefone'];
	$turma = $registro1['turma'];
	$local = $registro1['local'];
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
	$ativo = $registro1['fl_status'];
	$nomes = $registro1['nome'];
	$endereco = $registro1['endereco'];
		
				$sql43 = "SELECT l.nome, l.data, l.valor, l.position, l.bordar_nome, l.bordar_curso, i.idImagens FROM lista_bordados l, imagens i WHERE l.Impressao_idImpressao = ".$idImpressao." and l.Imagens_idImagens = i.idImagens;";
	 
 $resultado43 = mysqli_query($strcon,$sql43) or die("Erro ao retornar dados 2");
 $y = 0;
 $vetor = array('img1' => 0, 'img2' => 0, 'img3' => 0,'img4' => 0,'img5' => 0,'img6' => 0);
 // Obtendo os dados por meio de um loop while
 while (@$registro43 = mysqli_fetch_array($resultado43))
 {	
    $y++;
	
	$ajuste = $registro43['nome'];
	$data = $registro43['data'];
	$position = $registro43['position'];
	$idImagens = $registro43['idImagens'];
	$bordar_nome = $registro43['bordar_nome'];
	$bordar_curso = $registro43['bordar_curso'];
	//$valor = $registro43['valor'];
	
	if($position == 1){
		$vetor['img1'] = $idImagens;
		$position1= $position;
		}else if($position == 2){
			$vetor['img2'] = $idImagens;
			$position2 = $position;
			}
		else if($position == 3){ 
				$vetor['img3'] = $idImagens;
				$position3 = $position;
			}
		else if($position == 4){
			$vetor['img4'] = $idImagens;
			$position4 = $position;
			}
		else if($position == 5){
				$vetor['img5'] = $idImagens;
				$position5 = $position;
				}
		else if($position == 6){
				$vetor['img6'] = $idImagens;
				$bordar_nome6 = $bordar_nome;
				$bordar_curso6 = $bordar_curso;
				$position6 = $position;
				}
	 		else if($position == 7){
					$vetor['img7'] = $idImagens;
					$bordar_nome7 = $bordar_nome;
					$bordar_curso7 = $bordar_curso;
					$position7 = $position;
					}else{
				echo $position;
					}
	

 }

 @$i = $i + 1;
 
  $sql84 = "SELECT t.idTipo, t.modelo, t.pontos, t.link, t.css FROM tipo t where t.idTipo = '".$tipo."';"; 
  $resultado88 = mysqli_query($strcon,$sql84) or die("Erro ao retornar dados 3");
 // Obtendo os dados por meio de um loop while
 while (@$registro88 = mysqli_fetch_array($resultado88))
 {	
   $css = $registro88['css'];
 }
 ?>


      <div id="box" class="clearfix">
            <div id="box1" class="clearfix">
      
                <div id="box2" class="clearfix">
                    <p id="text">
                    Fase de testes
                    </p>
                    <div id="box3" class="clearfix">
                    


                    </div>
                </div>
                <div id="box4" class="clearfix">
                <p>Telefone
              
                  <input name="telefone" type="text" id="tel" value="<?Php echo $telefone; ?>" size="10">
                </p>
                <p>Pago
              
                  <input name="pago" type="text" id="pago" value="<?Php echo $pago; ?>" size="10">
                </p>
                <p>Status
              
                  <input name="ativo" type="text" id="ativo" value="<?Php echo $ativo; ?>" size="10">
                </p>
                </div>
                <div id="box5" class="clearfix">
                <p>Turma</p>
                <p>
                  <input name="turma" type="text" id="ajuste" value="<?Php echo $turma; ?>" size="10">
                </p>
                
                <p>
                  <label for="textarea">Observação:</label>
                  <textarea name="obs" cols="15" rows="8" id="textarea"><?Php echo $obs; ?></textarea>
                </p>
                </div>
            </div>
        <div id="boxy" class="clearfix">
          <div id="<?Php echo $css; ?>" class="clearfix"> 
                </div>
     <?Php  $sql2 = "SELECT e.idEtapa, e.fl_status, e.nome FROM etapa e WHERE e.fl_status = 1";
	 
  $resultado = mysqli_query($strcon,$sql2) or die("Erro ao retornar dados 5");
 $i = 7;
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $idEtapa = $registro['idEtapa'];
    $fl_status = $registro['fl_status']; 
	$nome = $registro['nome'];
	$ativo = "checked";
 	$i = $i + 1; 
?>
                <div id="box<?Php echo $i; ?>" class="clearfix">
          <input name="<?Php echo $nome; ?>" type="checkbox" id="<?Php echo $nome; ?>" value="<?Php echo $idEtapa; ?>" 
		  <?Php if ($idEtapa == $Etapa_idEtapa) {echo $ativo; } ?>>
                </div>
 <?Php  } ?>       
                <div id="box11" class="clearfix">
                <input name="data" type="date" id="data" autocomplete="off" value="<?Php echo $data; ?>">
                </div>
                <div id="box12" class="clearfix">
                  <input name="cliente" type="text" id="cliente" value="<?Php echo $nomes; ?>" size="29">
                </div>
                <div id="box13" class="clearfix">
                <input name="ajuste" type="text" id="ajuste" value="<?Php echo $ajuste; ?>" size="29">
              </div>
                <div id="box14" class="clearfix">
                <input name="local" type="text" id="local" value="<?Php echo $local; ?>" size="23">
              </div>
                <div id="box15" class="clearfix">
                <p>02
                 <select name="bordado2">
                 <?Php $sql4 = "SELECT i.idImagens, i.Links, i.nome, i.bordado FROM imagens i where i.idImagens = ".$vetor['img2'].";"; 
  $resultado2 = mysqli_query($strcon,$sql4) or die("Erro ao retornar dados 6");
 // Obtendo os dados por meio de um loop while
 while (@$registro2 = mysqli_fetch_array($resultado2))
 {	
    $idImagens2 = $registro2['idImagens'];
	$nome2 = $registro2['nome'];
	$Links2 = $registro2['Links'];

 ?>
  <option value="<?Php echo $idImagens2; ?>" selected><?Php echo $nome2; ?></option>
<?Php }  ?>
<option value="0" >Imagem</option>
 <?Php $sql4 = "SELECT i.idImagens, i.Links, i.nome, i.bordado FROM imagens i;"; 
  $resultado22 = mysqli_query($strcon,$sql4) or die("Erro ao retornar dados 6");
 // Obtendo os dados por meio de um loop while
 while (@$registro22 = mysqli_fetch_array($resultado22))
 {	
    $idImagens22 = $registro22['idImagens'];
	$nome22 = $registro22['nome'];
	$Links22 = $registro22['Links'];

 ?>
  <option value="<?Php echo $idImagens22; ?>"><?Php echo $nome22; ?></option>
<?Php } ?>
</select>
</p>
   <p>03
                 <select name="bordado3">
<?Php $sql4 = "SELECT i.idImagens, i.Links, i.nome, i.bordado FROM imagens i where i.idImagens = ".$vetor['img3'].";"; 
  $resultado3 = mysqli_query($strcon,$sql4) or die("Erro ao retornar dados 6");
 // Obtendo os dados por meio de um loop while
 while (@$registro3 = mysqli_fetch_array($resultado3))
 {	
    $idImagens3 = $registro3['idImagens'];
	$nome3 = $registro3['nome'];
	$Links3 = $registro3['Links'];

 ?>
  <option value="<?Php echo $idImagens3; ?>" selected><?Php echo $nome3; ?></option>
<?Php }  ?>
<option value="0" >Imagem</option>
 <?Php $sql7 = "SELECT i.idImagens, i.Links, i.nome, i.bordado FROM imagens i;"; 
  $resultado33 = mysqli_query($strcon,$sql7) or die("Erro ao retornar dados 7");
 // Obtendo os dados por meio de um loop while
 while (@$registro33 = mysqli_fetch_array($resultado33))
 {	
    $idImagens33 = $registro33['idImagens'];
	$nome33 = $registro33['nome'];
	$Links33 = $registro33['Links'];

 ?>
  <option value="<?Php echo $idImagens33; ?>"><?Php echo $nome33; ?></option>
<?Php } ?>
</select>
</p>
 <p>05
                 <select name="bordado5">
<?Php $sql4 = "SELECT i.idImagens, i.Links, i.nome, i.bordado FROM imagens i where i.idImagens = ".$vetor['img5'].";"; 
  $resultado5 = mysqli_query($strcon,$sql4) or die("Erro ao retornar dados 6");
 // Obtendo os dados por meio de um loop while
 while (@$registro5 = mysqli_fetch_array($resultado5))
 {	
    $idImagens5 = $registro5['idImagens'];
	$nome5 = $registro5['nome'];
	$Links5 = $registro5['Links'];

 ?>
  <option value="<?Php echo $idImagens5; ?>" selected><?Php echo $nome5; ?></option>
<?Php } ?> <option value="0" >Imagem</option>
 <?Php $sql8 = "SELECT i.idImagens, i.Links, i.nome, i.bordado FROM imagens i;"; 
  $resultado55 = mysqli_query($strcon,$sql8) or die("Erro ao retornar dados 8");
 // Obtendo os dados por meio de um loop while
 while (@$registro55 = mysqli_fetch_array($resultado55))
 {	
    $idImagens55 = $registro55['idImagens'];
	$nome55 = $registro55['nome'];
	$Links55 = $registro55['Links'];

 ?>
  <option value="<?Php echo $idImagens55; ?>"><?Php echo $nome55; ?></option>
<?Php } ?>
</select>
</p>
                </div>
                <div id="box16" class="clearfix">
                <p>01</p>
                <select name="bordado1">
  <?Php $sql4 = "SELECT i.idImagens, i.Links, i.nome, i.bordado FROM imagens i where i.idImagens = ".$vetor['img1'].";"; 
  $resultado1 = mysqli_query($strcon,$sql4) or die("Erro ao retornar dados 6");
 // Obtendo os dados por meio de um loop while
 while (@$registro1 = mysqli_fetch_array($resultado1))
 {	
    $idImagens1 = $registro1['idImagens'];
	$nome1 = $registro1['nome'];
	$Links1 = $registro1['Links'];

 ?>
  <option value="<?Php echo $idImagens1; ?>" selected><?Php echo $nome1; ?></option>
<?Php }  ?>
<option value="0" >Imagem</option>
 <?Php $sql4 = "SELECT i.idImagens, i.Links, i.nome, i.bordado FROM imagens i ;"; 
  $resultado11 = mysqli_query($strcon,$sql4) or die("Erro ao retornar dados 9");
 // Obtendo os dados por meio de um loop while
 while (@$registro11 = mysqli_fetch_array($resultado11))
 {	
    $idImagens11 = $registro11['idImagens'];
	$nome11 = $registro11['nome'];
	$Links11 = $registro11['Links'];

 ?>
  <option value="<?Php echo $idImagens11; ?>"><?Php echo $nome11; ?></option>
<?Php } ?>
</select>
<p>04</p>
                <select name="bordado4">
  <?Php $sql4 = "SELECT i.idImagens, i.Links, i.nome, i.bordado FROM imagens i where i.idImagens = ".$vetor['img4'].";"; 
  $resultado4 = mysqli_query($strcon,$sql4) or die("Erro ao retornar dados 6");
 // Obtendo os dados por meio de um loop while
 while (@$registro4 = mysqli_fetch_array($resultado4))
 {	
    $idImagens4 = $registro4['idImagens'];
	$nome4 = $registro4['nome'];
	$Links4 = $registro4['Links'];

 ?>
  <option value="<?Php echo $idImagens4; ?>" selected><?Php echo $nome4; ?></option>
<?Php } ?>
<option value="0" >Imagem</option>
 <?Php $sql6 = "SELECT i.idImagens, i.Links, i.nome, i.bordado FROM imagens i;"; 
  $resultado44 = mysqli_query($strcon,$sql6) or die("Erro ao retornar dados 10");
 // Obtendo os dados por meio de um loop while
 while (@$registro44 = mysqli_fetch_array($resultado44))
 {	
    $idImagens44 = $registro44['idImagens'];
	$nome44 = $registro44['nome'];
	$Links44 = $registro44['Links'];

 ?>
  <option value="<?Php echo $idImagens44; ?>"><?Php echo $nome44; ?></option>
<?Php } ?>
</select>
                </div>
                <div id="box17" class="clearfix">
                <select name="produto">
 <?Php $sql5 = "SELECT * FROM `produto`where idProduto = ".$Produto_idProduto.";"; 
  $resultado = mysqli_query($strcon,$sql5) or die("Erro ao retornar dados 11");
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $idProduto = $registro['idProduto'];
	$nome = $registro['Nome'];

 ?>
  <option value="<?Php echo $idProduto; ?>"><?Php echo $nome; ?></option>
<?Php } ?>
</select>
                </div>
                <div id="box18" class="clearfix">
                <input name="qtd" type="text" id="qtd" value="<?Php echo $qtd; ?>" size="1">
                </div>
                <div id="box19" class="clearfix">
                <input name="cor" type="text" id="cor" value="<?Php echo $cor; ?>" size="1">
                </div>
                <div id="box20" class="clearfix">
                <input name="tamanho" type="text" id="tamanho" value="<?Php echo $tamanho; ?>" size="10">
                </div>
                <div id="box42" class="clearfix">
                  <p>06</p>
                  <input name="bordado3_nome" type="text" id="textfield2" value="<?Php echo $bordar_nome6; ?>" size="15">
                  <input name="bordado3_curso" type="text" id="textfield2" value="<?Php echo $bordar_curso6; ?>" size="15">
                </div>
			   <div id="box43" class="clearfix">
                  <p>07</p>
                  <input name="bordado4_nome" type="text" id="textfield2" value="<?Php echo $bordar_nome7; ?>" size="15">
                  <input name="bordado4_curso" type="text" id="textfield2" value="<?Php echo $bordar_curso7; ?>" size="15">
                </div>
        </div>
          <input name="Status" type="hidden" id="Status" value="OK">
          <input name="idCliente" type="hidden" id="idCliente" value="<?Php echo $Cliente_idCliente; ?>">
          <input name="Cliente" type="hidden" id="Cliente" value="<?Php echo $idImpressao; ?>">
          <input id="input" type="submit" value="Atualização"></input>
        </div>
    </div>
    <?Php } ?>
    </form>
</body>
</html>


 <!-- Preenchendo a tabela com os dados do banco: -->
 <?php
   
 mysqli_close($strcon);

?>