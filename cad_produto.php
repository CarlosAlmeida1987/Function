 <?php
 // Conectando ao banco de dados:
 @include_once("controler/local.php");
  date_default_timezone_set('America/Fortaleza');
  @$arquivo  = isset($_FILES["img"])  ? $_FILES["img"] : FALSE;
 
 @$uploaddir = 'img/produto/';
 @$uploadfile = $uploaddir . basename($_FILES['img']['name']);
 @$idProduto = $_POST['idProduto']; 
 @$produto = $_POST['produto']; 
 @$link = basename($_FILES['img']['name']);
 @$qtd = $_POST['qtd'];
 @$cor = $_POST['cor'];
 @$modelo = $_POST['modelo'];
 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastrar Produto</title>
</head>

<body>

 
 
<form action="cad_produto.php" method="post" enctype="multipart/form-data" target="_parent" accept-charset="UTF-8">
<table width="100%" border="1">
  <tbody>
    <tr>
      <td>Produtos Cadastrados</td>
      <td>Produto</td>
      <td>Qtd</td>
      <td>Update Imagem</td>
      <td>Modelo</td>
      <td>Cor</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
      <select name="idProduto">
<option value="<?Php echo @$idProduto; ?> " selected>Selecione um Modelo</option>
 <?Php $sql3 = "SELECT * FROM `produto`;"; 
  $resultado3 = mysqli_query($strcon,$sql3) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro3 = mysqli_fetch_array($resultado3))
 {	
     $idProduto = $registro3['idProduto'];
	$nome = $registro3['Nome'];
 ?>
  <option value="<?Php echo $idProduto; ?>"><?Php echo $idProduto." - ".$nome; ?></option>
<?Php } ?>
</select>
      </td>
      <td><input type="text" name="produto" id="produto"></td>
      <td><input type="text" name="qtd" id="qtd"></td>
      <td><input type="file" name="img" id="img"></td>
      <td><input type="text" name="modelo" id="modelo"></td>
      <td><input type="text" name="cor" id="cor"></td>
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


 if(isset($produto)){
 $sql1 = "INSERT INTO `produto` (`idProduto`, `Nome`, `link`, `qtd`, `Cor`, `Modelo`) VALUES (NULL, '".$produto."', '".$link."', '".$qtd."', '".$cor."', '".$modelo."');";

if ($strcon->query($sql1) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql1 . "<br>" . $strcon->error;
}
 }
 
 @$produto = "";


 mysqli_close($strcon);

?>