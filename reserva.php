  <?php
   // Conectando ao banco de dados:
   date_default_timezone_set('America/Fortaleza');
   @include_once("controler/local.php");
   
   @$nome = $_POST['nome'];
	@$telefone = $_POST['telefone'];
	 @$produto = $_POST['produto'];
	  @$tamanho = $_POST['tamanho'];
	   @$curso = $_POST['curso'];
		@$obs = $_POST['obs'];
		
		$data = date("Y/m/d");
		
if(empty($obs)){
	echo "Informe a Observação";
}
		
if(isset($obs)){
	
	$sql = "INSERT INTO `reserva` (`idreserva`, `nome`, `telefone`, `produto`, `tamanho`, `curso`, `obs`, `fl_status`, `data_cadastro`) VALUES (NULL, '".$nome."', '".$telefone."', '".$produto."', '".$tamanho."', '".$curso."', '".$obs."', '1', '".$data."')";
	
	if ($strcon->query($sql) === TRUE) {
	 // echo "Nova gravação criada com sucesso";
	  	  
	 echo  "<script type='text/javascript'>
         		window.location = 'recibo.php?telefone=$telefone';
	  		</script>";
	  
	} else {
	  echo "Error: " . $sql . "<br>" . $strcon->error;
	}
	
	}
  @$nome = "";
  @$telefone = "";
  @$produto = "";
  @$tamanho = "";
  @$curso = "";
  @$obs = "";	
  $data = "";
  
  mysqli_close($strcon);
  ?>
   
  <!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Reserva Produto</title>
  <link href="css/reserva.css" rel="stylesheet" id="bootstrap-css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  
  <body>
  
  
  <!------ Include the above in your HEAD tag ---------->
  <form action="reserva.php" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
  <div class="container contact">
	  <div class="row">
		  <div class="col-md-3">
			  <div class="contact-info">
				  <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
				  <h2>Entre em contato conosco</h2>
				  <h4>Gostaríamos muito de ouvir de você !</h4>
			  </div>
		  </div>
		  <div class="col-md-9">
			  <div class="contact-form">
				  <div class="form-group">
					<label class="control-label col-sm-2" for="fname">Nome:</label>
					<div class="col-sm-10">          
					  <input type="text" class="form-control" id="fname" placeholder="Entre com o Primeiro Nome" name="nome">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-2" for="lname">Telefone:</label>
					<div class="col-sm-10">          
			  
					  <input type="tel" class="form-control" id="phone" name="telefone" placeholder="(85) 99999-9999" required>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-2" for="email">Produto:</label>
					<div class="col-sm-10">
					  
					  <select class="form-control" name="produto" id="produto">
						  <option value="01">Blusa Instituição Peito e Nome Atrás</option>
						  <option value="02">Blusa Nome Atrás</option>
						  <option value="03">Blusa Brasão Atrás</option>
						  <option value="04">Blusa Nova Brasão</option>
						  <option value="05">Blusa Completa 04 Bordado</option>
						  <option value="06">Blusa Brasão e Nome Peito 04 Bordado</option>
						  <option value="07">Blusa Media 03 Bordado Nome</option>
						  <option value="08">Blusa Media 03 Bordado Brasão</option>
						  <option value="09">Blusa Nome e Brasão</option>
						  <option value="10">Blusa Instituição</option>
						  <option value="11">Blusa 02 mangas 01 peito Bordado</option>
						  <option value="12">Blusa 01 nome manga 01 Brasão peito Bordado</option>
						  <option value="13">Jaleco Feminino</option>
						  <option value="14">Jaleco Masculino</option>
						  <option value="15">Jaleco Bordado 03</option>
						  <option value="16">Jaleco Bordado Instituição</option>
						  <option value="17">Jaleco Bordado Curso</option>
						  <option value="18">Jaleco Bordado Nome</option>
						  <option value="19">Jaleco Bordado Curso e Nome</option>
						  <option value="20">Jaleco Velcro</option>
						  <option value="21">Pijama Hospitalar Nome</option>
						  <option value="22">Boné</option>
						  
					  </select>
					</div>
				  </div>
				   <div class="form-group">
					<label class="control-label col-sm-2" for="email">Tamanho:</label>
					<div class="col-sm-10">
					  
					  <select class="form-control" name="tamanho" id="tamanho">
						  <option value="01">P Babylook</option>
						  <option value="02">M Babylook</option>
						  <option value="03">G Babylook</option>
						  <option value="04">GG Babylook</option>
						  <option value="05">P Padrão</option>
						  <option value="06">M Padrão</option>
						  <option value="07">G Padrão</option>
						  <option value="08">GG Padrão</option>
						  <option value="09">EXG Padrão</option>
					  </select>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-2" for="email">Curso:</label>
					<div class="col-sm-10">
					  
					  <select class="form-control" name="curso" id="curso">
						  <option value="01">Enfermagem</option>
						  <option value="02">Radiologia</option>
						  <option value="03">Farmacia</option>
						  <option value="04">Administração</option>
						  <option value="05">Segurança do Trabalho</option>
						  <option value="06">Pesonalisado</option>
					  </select>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-2" for="comment">Obs:</label>
					<div class="col-sm-10">
					  <textarea name="obs" rows="5" class="form-control" id="comment"></textarea>
					  
					</div>
				  </div>
				  <div class="form-group">        
					<div class="col-sm-offset-2 col-sm-10">
					  <button type="submit" class="btn btn-default">Reservar</button>
					</div>
				  </div>
			  </div>
		  </div>
	  </div>
  </div>
  </form>
</body>
</html>
