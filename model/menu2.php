<?Php session_start();?>
<header class="header-one header-two header-page">
			<div class="header-top-two">
				<div class="container text-center">
					<div class="row">
						<div class="col-sm-12">
							<div class="middel-top">
								<div class="left floatleft">
									<p><i class="mdi mdi-clock"></i> segunda a sexta: 16:00-21:00</p>
								</div>
							</div>
							<div class="middel-top clearfix">
								<ul class="clearfix right floatright">
									<li>
										<a href="#"><i class="mdi mdi-account"></i></a>
										<ul>
											<li><a href="login.php">Entrar</a></li>
												<li><a href="error-404.php">Cadastrar</a></li>
												<li><a href="model/sair.php">Sair</a></li>
										</ul>
									</li>
									<li>
										<a href="#"><i class="mdi mdi-settings"></i></a>
										<ul>
											 <li><a href="error-404.php">Arquivo</a></li>
                                                <li><a href="error-404.php">Orçamento</a></li>
                                                <li><a href="cart.php">Pedido</a></li>
										</ul>
									</li>
								</ul>
								<div class="right floatright">
                                <button type="button"><i class="mdi mdi-file-lock"></i></button> 
                                <form action="busca.php" method="post" enctype="multipart/form-data">
										<button type="submit"><i class="mdi mdi-magnify"></i></button>
										<input type="text" name="busca" placeholder="Pesquisa nestes campo..." />
									</form> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container text-center">
				<div class="row">
					<div class="col-sm-2">
						<div class="logo">
							<a href="index.php"><img src="img/logo2.png" alt="Sellshop" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="header-middel">
							<div class="mainmenu">
								<nav>
									<ul>
										<li><a href="index.php">Home</a></li>
										<li><a href="shop.php">Loja</a>
										</li>
										<li><a href="single-product.php">Produtos</a>
										</li>
										<li><a href="blog.php">Blog</a></li>
										<li><a href="about.php">Quem somos</a></li>
										<li><a href="contact.php">Contato</a></li>
									</ul>
								</nav>
							</div>
							<!-- mobile menu start -->
							<div class="mobile-menu-area">
								<div class="mobile-menu">
									<nav id="dropdown">
										<ul>
											<li><a href="index.php">Home</a></li>
										<li><a href="shop.php">Loja</a>
										</li>
										<li><a href="single-product.php">Produtos</a>
										</li>
										<li><a href="blog.php">Blog</a></li>
										<li><a href="about.php">Quem somos</a></li>
										<li><a href="contact.php">Contato</a></li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-2">
                    <?Php include "carinho.php";?>
					</div>
				</div>
			</div>
		</header>