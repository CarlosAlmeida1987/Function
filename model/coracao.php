<?php
 // Conectando ao banco de dados:
// include_once("../controler/conectar.php");
 
  include_once("../controler/local.php");

 // Recebendo os dados a pesquisar
 @$cd_produto = $_POST['cd_produto'];
 @$vl_preco = $_POST['vl_preco'];
 @$id_cliente =  $_POST['carrinho'];
 @$ds_promocao = $_POST['ds_promocao'];
 @$nu_qtd = $_POST['nu_qtd'];
 @$dt = date("d/m/Y");
 
 if (empty($vl_preco)){
 
 $sql01 = "SELECT vl_preco FROM tb_produto where cd_produto = $cd_produto;";
 $resultado = mysqli_query($strcon, $sql01) or die("Erro ao retornar dados");
 
 // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
   $vl_preco = $registro['vl_preco'];
 }
 }
 
 if (empty($id_cliente)){
	 echo "Cadastre-se para poder comprar <a href='login.php'>Entrar</a>";
	 }else{
 $sql10 = "INSERT INTO tb_favorito
  (cd_produto, vl_preco, id_cliente, ds_promocao, nu_qtd)
VALUES
  ($cd_produto, $vl_preco, ".base64_decode($id_cliente).", $ds_promocao, $nu_qtd);";

if ($strcon->query($sql10) === TRUE) {
  echo "Adicionado a os favoritos com Sucesso";
} else {
  echo "Error: " . $sql10 . "<br>" . $strcon->error;
}
 }
 


?>
