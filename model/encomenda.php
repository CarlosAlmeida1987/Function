<?php
 // Conectando ao banco de dados:
// include_once("../controler/conectar.php");
 
  include_once("../controler/local.php");

 // Recebendo os dados a pesquisar
 date_default_timezone_set('America/Fortaleza');
 @$cd_produto = $_POST['cd_produto'];
 @$vl_preco = $_POST['vl_preco'];
 @$id_cliente =  $_POST['carrinho'];
 @$ds_promocao = $_POST['ds_promocao'];
 @$nu_qtd = $_POST['nu_qtd'];
 @$dt = date("d/m/Y");
 
 if (empty($id_cliente) ){
	 echo "Cadastre-se para poder comprar <a href='login.php'>Entrar</a>";
	 }else{
 if ($vl_preco >= 1){
 $sql10 = "INSERT INTO tb_encomenda
  (cd_encomenda, vl_preco, id_cliente, ds_promocao, nu_qtd)
VALUES
  ($cd_produto, $vl_preco, ".base64_decode($id_cliente).", $ds_promocao, $nu_qtd);";

if ($strcon->query($sql10) === TRUE) {
  echo "Adicionado a encomenda com Sucesso";
} else {
  echo "Error: " . $sql10 . "<br>" . $strcon->error;
}
 }else{ echo "Adicione um produto no carrinho";
	 }
 }
 
$sql11 = "UPDATE tb_carrinho c SET c.fl_ativo=1 WHERE c.id_cliente=".base64_decode($id_cliente)." and c.dt_data >= '".date("Y/m/d")."'";

if ($strcon->query($sql11) === TRUE) {
  echo "";
} else {
  echo "Error na Atualização para gravar: " . $strcon->error;
}

?>
