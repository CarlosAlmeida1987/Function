<?php
 // Conectando ao banco de dados:
 @include_once("controler/local.php");
 
//  include_once("../controler/local.php");
 
 // Recebendo os dados a pesquisar
 date_default_timezone_set('America/Fortaleza');
 @$tipo = $_POST['tipo'];
 if (!$tipo){
	 $tipo = 'box7';
	 }
 @$modelo_link = $_POST['tipo'];	 
 @$cliente = $_POST['cliente'];
 @$local = $_POST['local'];
 if (!$local){
	 $local = 'Grau Técnico Washington Soares';
	 }
 @$telefone = $_POST['telefone'];
 @$pago = $_POST['pago'];
 @$turma = $_POST['turma'];
 
 @$tecido = $_POST['tecido'];
 @$costureira = $_POST['costureira'];
 @$bordado = $_POST['bordado'];
 
 if ($tecido > $costureira && $tecido > $bordado){$etapa = $tecido;}
 else if($costureira > $bordado){$etapa = $costureira;}
 else{$etapa = $bordado;}
 @$qtd = $_POST['qtd'];
 @$cor = $_POST['cor'];
 @$tamanho = $_POST['tamanho'];
 @$obs = $_POST['obs'];
 @$bordado1 = $_POST['bordado1'];
 @$bordado2 = $_POST['bordado2'];
 @$bordado3 = $_POST['bordado3'];
 @$bordado4 = $_POST['bordado4'];
 @$bordado5 = $_POST['bordado5'];
 @$bordado_nome = $_POST['bordado_nome'];
 @$bordado_curso = $_POST['bordado_curso']; 
 @$bordado3_nome = $_POST['bordado3_nome'];
 @$bordado3_curso = $_POST['bordado3_curso']; 
 @$bordado4_nome = $_POST['bordado4_nome'];
 @$bordado4_curso = $_POST['bordado4_curso'];

 @$produto = $_POST['produto'];
 @$ajuste = $_POST['ajuste'];
 @$data = $_POST['data'];

 
  $sql910 = "SELECT css FROM `designer`  WHERE`ativo` = '1';";
	 
  $resultado910 = mysqli_query($strcon,$sql910) or die("Erro ao retornar dados");

 // Obtendo os dados por meio de um loop while
 while (@$registro910 = mysqli_fetch_array($resultado910))
 {	 

	  @$colection = $registro910['css'];
	  @$designer = $designer." ".$colection;
 
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
    <style>
    <?Php echo $designer; ?>  
    </style>
    </head>
    <body>
    <?php include ("view/script.php");?>
    <?php include ("view/menu.php");?>
	<form action="cad_img.php" method="post" enctype="multipart/form-data" target="_parent" accept-charset="UTF-8">
    <div id="primaryContainer" class="primaryContainer clearfix">
    <?Php $sql84 = "SELECT t.idTipo, t.modelo, t.pontos, t.link, t.css FROM tipo t where t.css = '".$tipo."';"; 
  $resultado88 = mysqli_query($strcon,$sql84) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro88 = mysqli_fetch_array($resultado88))
 {	
   $idTipo = $registro88['idTipo'];
 }
 ?>
     Produto
                    <input id="input" type="submit" value="Selecionar"></input>
<form action="cad_img.php" method="post" enctype="multipart/form-data" target="_parent" accept-charset="UTF-8">
                    <select name="tipo">
<option value="<?Php echo $idTipo; ?> " selected>Selecione um Modelo</option>
 <?Php $sql4 = "SELECT t.idTipo, t.modelo, t.pontos, t.link, t.css FROM tipo t;"; 
  $resultado = mysqli_query($strcon,$sql4) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $idTipo = $registro['idTipo'];
	$modelo = $registro['modelo'];
	$pontos = $registro['pontos'];
	$link = $registro['link'];
	$css = $registro['css'];
 ?>
  <option value="<?Php echo $css; ?>"><?Php echo $idTipo." - ".$modelo; ?></option>
<?Php } ?>
</select>
</form>
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
              
                  <input name="telefone" type="text" id="tel" size="10">
                </p>
                <p>Pago
              
                  <input name="pago" type="text" id="pago" size="10">
                </p>
       
                </div>
                <div id="box5" class="clearfix">
                <p>Turma</p>
                <p>
                  <input name="turma" type="text" id="ajuste" size="10">
                </p>
                
                <p>
                  <label for="textarea">Observação:</label>
                  <textarea name="obs" cols="15" rows="8" id="textarea"></textarea>
                </p>
                </div>
            </div>
            <div id="boxy" class="clearfix">
                <div id="<?Php echo $modelo_link; ?>" class="clearfix"> 
                </div>
     <?Php  $sql2 = "SELECT e.idEtapa, e.fl_status, e.nome FROM etapa e WHERE e.fl_status = 1";
	 
  $resultado = mysqli_query($strcon,$sql2) or die("Erro ao retornar dados");
 $i = 7;
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $idEtapa = $registro['idEtapa'];
    $fl_status = $registro['fl_status']; 
	$nome = $registro['nome'];
 	$i = $i + 1; 
?>
                <div id="box<?Php echo $i; ?>" class="clearfix">
          <input name="<?Php echo $nome; ?>" type="checkbox" id="<?Php echo $nome; ?>" value="<?Php echo $idEtapa; ?>">
                </div>
 <?Php  } ?>       
                <div id="box11" class="clearfix">
                <input name="data" type="date" id="data" autocomplete="off">
                </div>
                <div id="box12" class="clearfix">
                  <input name="cliente" type="text" id="cliente" size="29">
                </div>
                <div id="box13" class="clearfix">
                <input name="ajuste" type="text" id="ajuste" size="29">
              </div>
                <div id="box14" class="clearfix">
                <input name="local" type="text" id="local" size="23">
              </div>
                <div id="box15" class="clearfix">
                <p>02
                 <select name="bordado2">
<option value="0" selected>Imagem</option>
 <?Php $sql4 = "SELECT i.idImagens, i.Links, i.nome, i.bordado FROM imagens i;"; 
  $resultado = mysqli_query($strcon,$sql4) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $idImagens = $registro['idImagens'];
	$nome = $registro['nome'];
	$Links = $registro['Links'];

 ?>
  <option value="<?Php echo $idImagens; ?>"><?Php echo $nome; ?></option>
<?Php } ?>
</select>
</p>
   <p>03
                 <select name="bordado3">
<option value="0" selected>Imagem</option>
 <?Php $sql7 = "SELECT i.idImagens, i.Links, i.nome, i.bordado FROM imagens i;"; 
  $resultado = mysqli_query($strcon,$sql7) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $idImagens = $registro['idImagens'];
	$nome = $registro['nome'];
	$Links = $registro['Links'];

 ?>
  <option value="<?Php echo $idImagens; ?>"><?Php echo $nome; ?></option>
<?Php } ?>
</select>
</p>
 <p>05
                 <select name="bordado5">
<option value="0" selected>Imagem</option>
 <?Php $sql8 = "SELECT i.idImagens, i.Links, i.nome, i.bordado FROM imagens i;"; 
  $resultado = mysqli_query($strcon,$sql8) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $idImagens = $registro['idImagens'];
	$nome = $registro['nome'];
	$Links = $registro['Links'];

 ?>
  <option value="<?Php echo $idImagens; ?>"><?Php echo $nome; ?></option>
<?Php } ?>
</select>
</p>
                </div>
                <div id="box16" class="clearfix">
                <p>01</p>
                <select name="bordado1">
  <option value="0" selected>Imagem</option>
 <?Php $sql4 = "SELECT i.idImagens, i.Links, i.nome, i.bordado FROM imagens i;"; 
  $resultado = mysqli_query($strcon,$sql4) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $idImagens = $registro['idImagens'];
	$nome = $registro['nome'];
	$Links = $registro['Links'];

 ?>
  <option value="<?Php echo $idImagens; ?>"><?Php echo $nome; ?></option>
<?Php } ?>
</select>
<p>04</p>
                <select name="bordado4">
  <option value="0" selected>Imagem</option>
 <?Php $sql6 = "SELECT i.idImagens, i.Links, i.nome, i.bordado FROM imagens i;"; 
  $resultado = mysqli_query($strcon,$sql6) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $idImagens = $registro['idImagens'];
	$nome = $registro['nome'];
	$Links = $registro['Links'];

 ?>
  <option value="<?Php echo $idImagens; ?>"><?Php echo $nome; ?></option>
<?Php } ?>
</select>
                </div>
                <div id="box17" class="clearfix">
                <select name="produto">
<option value="0" selected>Produto</option>
 <?Php $sql5 = "SELECT * FROM `produto`;"; 
  $resultado = mysqli_query($strcon,$sql5) or die("Erro ao retornar dados");
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
                <input name="qtd" type="text" id="qtd" size="1">
                </div>
                <div id="box19" class="clearfix">
                <input name="cor" type="text" id="cor" size="1">
                </div>
                <div id="box20" class="clearfix">
                <input name="tamanho" type="text" id="tamanho" size="10">
                </div>
              <div id="box21" class="clearfix">
              <p>06</p>
                <input name="bordado3_nome" type="text" id="textfield2" size="15">
                <input name="bordado3_curso" type="text" id="textfield2" size="15">
              
              <p>07</p>
                <input name="bordado4_nome" type="text" id="textfield3" size="15">
                <input name="bordado4_curso" type="text" id="textfield3" size="15">
                
                </div>
            </div>
            <div class="cad_btn"><input id="input" type="submit" value="Cadastrar"></input></div>
        </div>
    </div>
    </form>
</body>
</html>

 <!-- Preenchendo a tabela com os dados do banco: -->
 <?php
 
if (!$data){
$tipo = "box7";
}else{	
	 //$modelo_link = 'box7';
 if(isset($telefone)){
$sql3 = "SELECT e.idCliente FROM cliente e WHERE e.telefone = '".$telefone."'"; 
  $resultado = mysqli_query($strcon,$sql3) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $idCliente = $registro['idCliente'];
 }
 }

if(empty($idCliente)){
$sql0 = "INSERT INTO `cliente` (`idCliente`, `nome`, `telefone`, `turma`, `endereco`) VALUES
(null, '".$cliente."', '".$telefone."', '".$turma."', '".$local."')";

if ($strcon->query($sql0) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql0 . "<br>" . $strcon->error;
}

}

 if(isset($telefone)){
$sql3 = "SELECT e.idCliente FROM cliente e WHERE e.telefone = '".$telefone."'"; 
  $resultado = mysqli_query($strcon,$sql3) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $idCliente = $registro['idCliente'];
 }
	
$sql1 = "INSERT INTO `impressao` (`idImpressao`, `Produto_idProduto`, `Etapa_idEtapa`, `Cliente_idCliente`, `Tipo_idTipo`, `qtd`, `Cor`, `tamanho`, `obs`, `pago`, `fl_status`) VALUES
(null, ".$produto.", ".$etapa.", ".$idCliente.", ".$tipo.", ".$qtd.", '".$cor."', '".$tamanho."', '".$obs."','".$pago."', 'Ativo') ";

if ($strcon->query($sql1) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql1 ." --- ".$tipo. "<br>" . $strcon->error;
}

 $sql23 = "SELECT i.idImpressao FROM impressao i WHERE i.Cliente_idCliente = ".$idCliente." ORDER BY i.idImpressao ASC"; 
  $resultado = mysqli_query($strcon,$sql23) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $idImpressao = $registro['idImpressao'];

 }
	 
if($bordado1 != 0) {
if(isset($bordado1)){
	
	$sqlvalor1 = "select i.nu_valor from imagens i where i.idImagens = $bordado1"; 
  $resultado = mysqli_query($strcon,$sqlvalor1) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $vl_bordado1 = $registro['nu_valor'];

 }
	
 $sql10 = "INSERT INTO `lista_bordados` (`idLista_bordados`, `Impressao_idImpressao`, `Imagens_idImagens`, `nome`, `valor`, `position`, `data`) VALUES (NULL, '".$idImpressao."', '".$bordado1."', '".$ajuste."', '".$vl_bordado1."', '1','".$data."');";
 
 if ($strcon->query($sql10) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql10 . "<br>" . $strcon->error;
}
}
}

if($bordado2 != 0) {
if(isset($bordado2) ){
	
	$sqlvalor2 = "select i.nu_valor from imagens i where i.idImagens = $bordado2"; 
  $resultado = mysqli_query($strcon,$sqlvalor2) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $vl_bordado2 = $registro['nu_valor'];

 }
 $sql11 = "INSERT INTO `lista_bordados` (`idLista_bordados`, `Impressao_idImpressao`, `Imagens_idImagens`, `nome`, `valor`, `position`, `data`) VALUES (NULL, '".$idImpressao."', '".$bordado2."', '".$ajuste."', '".$vl_bordado2."', '2','".$data."');";
 
 if ($strcon->query($sql11) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql11 . "<br>" . $strcon->error;
}
}
}
if($bordado3 != 0) {
if(isset($bordado3)){
	
	$sqlvalor3 = "select i.nu_valor from imagens i where i.idImagens = $bordado3"; 
  $resultado = mysqli_query($strcon,$sqlvalor3) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $vl_bordado3 = $registro['nu_valor'];

 }
$sql12 = "INSERT INTO `lista_bordados` (`idLista_bordados`, `Impressao_idImpressao`, `Imagens_idImagens`, `nome`, `valor`, `position`, `data`) VALUES (NULL, '".$idImpressao."', '".$bordado3."', '".$ajuste."', '".$vl_bordado3."', '3','".$data."');";
 
 if ($strcon->query($sql12) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql12 . "<br>" . $strcon->error;
}
}
}
if($bordado4 != 0) {
if(isset($bordado4)){
	
	$sqlvalor4 = "select i.nu_valor from imagens i where i.idImagens = $bordado4"; 
  $resultado = mysqli_query($strcon,$sqlvalor4) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $vl_bordado4 = $registro['nu_valor'];

 }
$sql13 = "INSERT INTO `lista_bordados` (`idLista_bordados`, `Impressao_idImpressao`, `Imagens_idImagens`, `nome`, `valor`, `position`, `data`) VALUES (NULL, '".$idImpressao."', '".$bordado4."', '".$ajuste."', '".$vl_bordado4."', '4','".$data."');";
 
 if ($strcon->query($sql13) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql13 . "<br>" . $strcon->error;
}
}
}
if($bordado5 != 0) {
if(isset($bordado5)){
	
	$sqlvalor5 = "select i.nu_valor from imagens i where i.idImagens = $bordado5"; 
  $resultado = mysqli_query($strcon,$sqlvalor5) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $vl_bordado5 = $registro['nu_valor'];

 }
$sql14 = "INSERT INTO `lista_bordados` (`idLista_bordados`, `Impressao_idImpressao`, `Imagens_idImagens`, `nome`, `valor`, `position`, `data`) VALUES (NULL, '".$idImpressao."', '".$bordado5."', '".$ajuste."', '".$vl_bordado5."', '5','".$data."');";

 
 if ($strcon->query($sql14) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql14 . "<br>" . $strcon->error;
}
}
}
if(strlen($bordado3_nome) >= 6){
if(isset($bordado3_curso)){
	
	$sqlvalor6 = "select i.nu_valor from imagens i where i.idImagens = $bordado6"; 
  $resultado = mysqli_query($strcon,$sqlvalor6) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $vl_bordado6 = $registro['nu_valor'];

 }
$sql15 = "INSERT INTO `lista_bordados` (`idLista_bordados`, `Impressao_idImpressao`, `Imagens_idImagens`, `nome`, `valor`, `position`, `data`, `bordar_nome`, `bordar_curso`) VALUES (NULL, '".$idImpressao."', '8', '".$ajuste."', '".$vl_bordado6."', '6','".$data."','".$bordado3_nome."','".$bordado3_curso."');";

 if ($strcon->query($sql15) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql15 . "<br>" . $strcon->error;
}
}
}
echo "$bordado4_nome";
if(strlen($bordado4_nome) >= 7){
if(isset($bordado4_curso)){
	
	$sqlvalor7 = "select i.nu_valor from imagens i where i.idImagens = $bordado7"; 
  $resultado = mysqli_query($strcon,$sqlvalor7) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {	
    $vl_bordado7 = $registro['nu_valor'];

 }
	
$sql16 = "INSERT INTO `lista_bordados` (`idLista_bordados`, `Impressao_idImpressao`, `Imagens_idImagens`, `nome`, `valor`, `position`, `data`, `bordar_nome`, `bordar_curso`) VALUES (NULL, '".$idImpressao."', '2', '".$ajuste."', '".$vl_bordado7."', '7','".$data."','".$bordado4_nome."','".$bordado4_curso."');";

 if ($strcon->query($sql16) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql16 . "<br>" . $strcon->error;
}
}
}

}else{
	echo "Cadastre um Telefone";
	}
}
 mysqli_close($strcon);

?>