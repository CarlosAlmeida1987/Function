 <?php
 // Conectando ao banco de dados:
 @include_once("controler/local.php");
  date_default_timezone_set('America/Fortaleza');
  @$arquivo  = isset($_FILES["img"])  ? $_FILES["img"] : FALSE;
 
 @$uploaddir = 'img/';
 @$uploadfile = $uploaddir . basename($_FILES['img']['name']);
 
 @$idimagens2 = $_POST['idimagens']; 
 
 @$nome2 = $_POST['nome']; 
 @$link2 = basename($_FILES['img']['name']);
 @$bordado2 = $_POST['$bordado'];

 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastrar Imagens</title>
</head>

<body>

 
 
<form action="cad_bordado.php" method="post" enctype="multipart/form-data" target="_parent" accept-charset="UTF-8">
<table width="100%" border="1">
  <tbody>
    <tr>
      <td>Imagens Cadastrados</td>
      <td>Nome</td>
      <td>Bordado</td>
      <td>Update Imagem</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
      <select name="idimagens">
<option value="<?Php echo @$idimagens; ?> " selected>Selecione uma Imagem</option>
  <?Php $sql4 = "SELECT i.idImagens, i.Links, i.nome, i.bordado FROM imagens i;"; 
  $resultado4 = mysqli_query($strcon,$sql4) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro4 = mysqli_fetch_array($resultado4))
 {	
    $idImagens = $registro4['idImagens'];
	$nome = $registro4['nome'];
	$Links = $registro4['Links'];

 ?>
  <option value="<?Php echo $idImagens; ?>"><?Php echo $idImagens." -- ".$nome; ?></option>
<?Php } ?>

</select>
      </td>
      <td><input type="text" name="nome" id="nome"></td>
      <td><input type="text" name="bordado" id="bordado"></td>
      <td><input type="file" name="img" id="img"></td>
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
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Cadastrar"></td>
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


 if(isset($idimagens2)){
 $sql1 = "INSERT INTO `imagens` (`idImagens`, `Links`, `nome`, `bordado`) VALUES (NULL, '".$link2."', '".$nome2."', '".$bordado2."'); ";

if ($strcon->query($sql1) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql1 . "<br>" . $strcon->error;
}
 }
 
 @$idimagens2 = "";


 mysqli_close($strcon);

?>