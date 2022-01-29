    <?Php 
	date_default_timezone_set('America/Fortaleza');
	@$cript = $_SESSION['cript'];
	@$valor = $_SESSION['valor'];
	@$carinho = $_SESSION['carinho'];
	@$vendas = $_SESSION['vendas'];
	@$t = 0;
	@$i = 0;
	@$email = 0;
	@$login = 0;
	@$total = 0;
	
	// include_once("../controler/conectar.php");
    include_once("controler/local.php");
	
	?>
    
     <?php
$sql1 = "SELECT login, email FROM tb_user where email = '".base64_decode($vendas)."' and codigo = '".base64_decode($carinho)."' ;";
  $resultado = mysqli_query($strcon,$sql1) or die("Erro ao retornar dados");
 
 if (empty($resultado)){
	 header("Location: model/sair.php");
	}else if(mysqli_num_rows($resultado) < 0){
	header("Location: model/sair.php");
	}else{
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {
   $login = $registro['login'];
   $email = $registro['email'];
 }
 
 }

?>
    <?Php if($vendas == base64_encode($email) and $cript == base64_encode($login)) {?>                              <?php
 $sql3 = "SELECT c.vl_preco FROM tb_carrinho c, tb_produto p where c.id_cliente = '".base64_decode($carinho)."' and c.cd_produto = p.cd_produto and c.dt_data >= '".date("Y/m/d")."' and fl_ativo = 0;";
  $resultado = mysqli_query($strcon, $sql3) or die("Erro ao retornar dados");
 
 if (empty($resultado)){
	 header("Location: model/sair.php");
	}else if(mysqli_num_rows($resultado) < 0){
	header("Location: model/sair.php");
	}else{
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {
	$p = $registro['vl_preco'];
	
	$t = $t + $p;
	$i++;
 }
 }
?>
    		<div class="cart-itmes">
							<a class="cart-itme-a" href="cart.php">
								<i class="mdi mdi-cart"></i>
  
								<?Php echo "$i"; ?> items :  <strong>R$ <?Php echo "$t"; ?>,00</strong>
							</a>
							<div class="cartdrop">
                            
                            <?php
  $sql2 = "SELECT p.nm_produto, p.ds_cor, p.ds_tamanho, c.vl_preco, p.ds_img FROM tb_carrinho c, tb_produto p where c.id_cliente = '".base64_decode($carinho)."' and c.cd_produto = p.cd_produto and c.dt_data >= '".date("Y/m/d")."' and fl_ativo = 0 ORDER BY c.id DESC LIMIT 5;";
  $resultado = mysqli_query($strcon,$sql2) or die("Erro ao retornar dados");
 
 if (empty($resultado)){
	 header("Location: model/sair.php");
	}else if(mysqli_num_rows($resultado) < 0){
	header("Location: model/sair.php");
	}else{
 // Obtendo os dados por meio de um loop while
 while (@$registro = mysqli_fetch_array($resultado))
 {
    $produto = $registro['nm_produto'];
    $cor = $registro['ds_cor']; 
	$tamanho = $registro['ds_tamanho'];
	$img = $registro['ds_img'];
	$preco = $registro['vl_preco'];
	
	$total = $total + $preco;

?>
                            
								<div class="sin-itme clearfix">
									<i class="mdi mdi-close"></i>
									<a class="cart-img" href="cart.html"><img src="img/cart/<?Php echo $img; ?>" alt="" /></a>
									<div class="menu-cart-text">
										<a href="#"><h5><?Php echo $produto; ?></h5></a>
										<span>Cor :  <?Php echo $cor; ?></span>
										<span>Tam :  <?Php echo $tamanho; ?></span>
										<strong>R$ <?Php echo $preco; ?>,00</strong>
									</div>
								</div>
<?Php  } } ?>
								<div class="total">
									<span>total: <strong> R$ <?Php echo "$t"; ?>.00</strong></span>
								</div>
								<a class="goto" href="cart.php">Ir para o carrinho</a>
								<a class="out-menu" href="checkout.php">Finalizar Pedido</a>
							</div>
						</div>
<?Php }else {?>
						<div class="cart-itmes">
							<a class="cart-itme-a" href="cart.php">
								<a href="shop.php">Buscar Produto</a>
							</a>
						</div>
<?Php }   ?>