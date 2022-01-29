 <?php
 // Conectando ao banco de dados:
 @include_once("controler/local.php");
  date_default_timezone_set('America/Fortaleza');
 @$arquivo  = isset($_FILES["img"])  ? $_FILES["img"] : FALSE;
 
 @$uploaddir = 'img/';
 @$uploadfile = $uploaddir . basename($_FILES['img']['name']);
 @$tipo = $_POST['tipo']; 
 @$ds_nome = $_POST['nome'];
 @$ds_qtd = $_POST['qtd'];
 @$ds_img = basename($_FILES['img']['name']);
 @$ds_css = $_POST['css'];
 
  @$designer = $_POST['designer'];
  @$ds_class = $_POST['class'];
  @$ativo = $_POST['ativo'];
  @$ds_css_tipo = $_POST['css_tipo'];
  
  @$id_css_designer = $_POST['iddesigner'];
  @$ds_class2 = $_POST['class2'];
  @$ativo2 = $_POST['ativo2'];
  @$ds_css_tipo2 = $_POST['css_tipo2'];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastrar Tipo</title>
</head>

<body>

 
 
<form action="cad_tipo.php" method="post" enctype="multipart/form-data" target="_parent" accept-charset="UTF-8">
<table width="100%" border="1">
  <tbody>
    <tr>
      <td>Tipos Cadastrados</td>
      <td>Modelo</td>
      <td>Qtd</td>
      <td>Update Imagem</td>
      <td>Css</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
      <select name="tipo">
<option value="<?Php echo @$idTipo; ?> " selected>Selecione um Modelo</option>
 <?Php $sql3 = "SELECT t.idTipo, t.modelo, t.pontos, t.link, t.css FROM tipo t;"; 
  $resultado3 = mysqli_query($strcon,$sql3) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro3 = mysqli_fetch_array($resultado3))
 {	
    $idTipo = $registro3['idTipo'];
	$modelo = $registro3['modelo'];
	$pontos = $registro3['pontos'];
	$link = $registro3['link'];
	$css = $registro3['css'];
 ?>
  <option value="<?Php echo $idTipo; ?>"><?Php echo $idTipo." - ".$modelo; ?></option>
<?Php } ?>
</select>
      </td>
      <td><input type="text" name="nome" id="nome"></td>
      <td><input type="text" name="qtd" id="qtd"></td>
      <td><input type="file" name="img" id="img"></td>
      <td><input type="text" name="css" id="css"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Cadastrar"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</form>

<form action="cad_tipo.php" method="post" enctype="multipart/form-data" target="_parent" accept-charset="UTF-8">
<table width="100%" border="1">
  <tbody>
    <tr>
      <td>Css Cadastrados</td>
      <td>Class</td>
      <td>Css</td>
      <td>Ativo</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
      <select name="designer" id="designer">
<option value="<?Php echo @$idDesigner; ?> " selected>Selecione um Modelo</option>
 <?Php $sql4 = "SELECT t.id, t.nome, t.css, t.ativo FROM designer t;"; 
  $resultado4 = mysqli_query($strcon,$sql4) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro4 = mysqli_fetch_array($resultado4))
 {	
 
    $idDesigner = $registro4['id'];
	$modelo2 = $registro4['nome'];
	$ds_css2 = $registro4['css'];
	$ativo = $registro4['ativo'];

 ?>
  <option value="<?Php echo $idDesigner; ?>"><?Php echo $idDesigner." - ".$modelo2; ?></option>
<?Php } ?>
</select>
      </td>
      <td><input type="text" name="class" id="class"></td>
      <td><textarea name="css_tipo" cols="40" rows="15" id="css"></textarea></td>
      <td><input type="text" name="ativo" id="img"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="button2" id="button2" value="Cadastrar"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
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
</form>

<form action="cad_tipo.php" method="post" enctype="multipart/form-data" target="_parent" accept-charset="UTF-8">
<table width="100%" border="1">
  <tbody>
    <tr>
      <td>Css Atualizar</td>
      <td>Class</td>
      <td>Css</td>
      <td>Ativo</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
      <select name="iddesigner" id="iddesigner">
<option value="<?Php echo @$idDesigner; ?> " selected>Selecione um Modelo</option>
 <?Php $sql4 = "SELECT t.id, t.nome, t.css, t.ativo FROM designer t;"; 
  $resultado4 = mysqli_query($strcon,$sql4) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro4 = mysqli_fetch_array($resultado4))
 {	
 
    $idDesigner = $registro4['id'];
	$modelo2 = $registro4['nome'];
	$ds_css2 = $registro4['css'];
	$ativo = $registro4['ativo'];

 ?>
  <option value="<?Php echo $idDesigner; ?>"><?Php echo $idDesigner." - ".$modelo2; ?></option>
<?Php } ?>
</select>
      </td>
      <td><input type="text" name="class2" id="class2"></td>
      <td><textarea name="css_tipo2" id="css"></textarea></td>
      <td><input type="text" name="ativo2" id="img"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="Atualizar" id="Atualizar" value="Atualizar"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
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
</form>
</body>
</html>

 <?php

if(!$arquivo){
}else{
	
echo '<pre>';
if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
    echo "Arquivo válido e enviado com sucesso.\n";
} else {
    echo "Possível ataque de upload de arquivo!\n";
}
echo 'Aqui está mais informações de debug:';
print_r($_FILES);

print "</pre>";

}


 if(isset($ds_img)){
 $sql1 = "INSERT INTO `tipo` (`idTipo`, `modelo`, `pontos`, `link`, `css`) VALUES (NULL, '".$ds_nome."', '".$ds_qtd."', '".$ds_img."', '".$ds_css."');";

if ($strcon->query($sql1) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql1 . "<br>" . $strcon->error;
}
 }
 
 if(isset($ds_css_tipo)){
 $sql2 = "INSERT INTO `designer` (`id`, `nome`, `css`, `ativo`) VALUES (NULL, '".$ds_class."', '".$ds_css_tipo."', '".$ativo."');";

if ($strcon->query($sql2) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql2 ."<br>" . $strcon->error;
}
 }
 
  if(isset($id_css_designer)){
 $sql3 = "UPDATE `designer` SET `nome` = '".$ds_class2."', `css` = '".$ds_css_tipo2."', `ativo` = '".$ativo2."' WHERE `designer`.`id` = ".$id_css_designer.";";

if ($strcon->query($sql3) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql3 ."<br>" . $strcon->error;
}
 }
 
 @$id_css_designer = "";
 @$ds_css_tipo = "";
 @$ds_img = "";

 mysqli_close($strcon);

?>