 <?php
 // Conectando ao banco de dados:
 @include_once("controler/local.php");
  date_default_timezone_set('America/Fortaleza');
 
 @$idetapa = $_POST['idEtapa']; 
 @$nome2 = $_POST['nome']; 
 @$ativo2 = $_POST['ativo']; 
 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastrar Etapa</title>
</head>

<body>

 
 
<form action="cad_etapa.php" method="post" enctype="multipart/form-data" target="_parent" accept-charset="UTF-8">
<table width="100%" border="1">
  <tbody>
    <tr>
      <td>Produtos Cadastrados</td>
      <td>Nome</td>
      <td>Ativo</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
      <select name="idEtapa">
<option value="<?Php echo @$idEtapa; ?> " selected>Selecione um Etapa</option>
 <?Php $sql3 = "SELECT * FROM `etapa`;"; 
  $resultado3 = mysqli_query($strcon,$sql3) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while (@$registro3 = mysqli_fetch_array($resultado3))
 {	
     $idEtapa2 = $registro3['idEtapa'];
	$nome = $registro3['nome'];
 ?>
  <option value="<?Php echo $idEtapa2; ?>"><?Php echo $idEtapa2." - ".$nome; ?></option>
<?Php } ?>
</select>
      </td>
      <td><input type="text" name="nome" id="nome"></td>
      <td><input type="text" name="ativo" id="ativo"></td>
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
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Cadastrar"></td>
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
 
 if(isset($nome)){
 $sql1 = "INSERT INTO `etapa` (`idEtapa`, `fl_status`, `nome`) VALUES (NULL, '".$ativo2."', '".$nome2."');";

if ($strcon->query($sql1) === TRUE) {
  echo "Nova gravação criada com sucesso";
} else {
  echo "Error: " . $sql1 . "<br>" . $strcon->error;
}
 }
 
 @$nome = "";


 mysqli_close($strcon);

?>