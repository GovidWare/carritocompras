<!DOCTYPE html>
<html lang="es">
<head>
<title>Carro de Compras</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Smart Bazaar Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="<?php echo base_url();?>public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="<?php echo base_url();?>public/css/menu.css" rel="stylesheet" type="text/css" media="all" />  
<link href="<?php echo base_url();?>public/css/animate.min.css" rel="stylesheet" type="text/css" media="all" />   
<link href="<?php echo base_url();?>public/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> 

<link href="<?php echo base_url();?>public/css/font-awesome.css" rel="stylesheet"> 

<script src="<?php echo base_url();?>public/js/jquery-2.2.3.min.js"></script> 
<script src="<?php echo base_url();?>public/js/owl.carousel.js"></script>

<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>

<script src="<?php echo base_url();?>public/js/jquery-scrolltofixed-min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {

        $('.header-two').scrollToFixed();  
        
        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('.header-two').outerHeight(true) + 10, 
                zIndex: 999
            });
        });
    });
</script>

<script type="text/javascript" src="<?php echo base_url();?>public/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>

<script type="text/javascript">
	$(document).ready(function() {
	
		var defaults = {
			containerID: 'toTop', 
			containerHoverID: 'toTopHover',
			scrollSpeed: 1200,
			easingType: 'linear' 
		};
		
		$().UItoTop({ easingType: 'easeOutQuart' });
		
	});
</script>

<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.jscrollpane.min.js"></script>
		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				$('.scroll-pane').jScrollPane();
			});
		</script>

<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.mousewheel.js"></script>

</head>
<body>
  
	<div class="header">
		
		<div class="header-two">
			<div class="container">
				<div class="header-logo">
					<h1><a href="#"><span>C</span>Carro <i>de Compras</i></a></h1>
					<h6>los mejores productos. <br> Al mejor precio.</h6> 
				</div>	
				<div class="header-search">
					<form action="#" method="post">
						<input type="search" name="Search" placeholder="Buscar un producto..." required="">
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<i class="fa fa-search" aria-hidden="true"> </i>
						</button>
					</form>
				</div>
				<div class="header-cart"> 
				
					<div class="cart"> 
						<form action="#" method="post" class="last"> 
							<input type="hidden" name="cmd" value="_cart" />
							<input type="hidden" name="display" value="1" />
							<button style="color: white;" class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Orden</button>
						</form>  
					</div>
					<div class="clearfix"> </div> 
				</div> 
				<div class="clearfix"> </div>
			</div>		
		</div>
		<div class="header-three">
			<div class="container">

				<div class="move-text">
					<div class="marquee"><a href="offers.html"> Todo lo que buscas en un solo lugar...... <span>Mira nuestro nuevos productos </span> <span> Nuevos descuentos y ofertas</span></a></div>
					<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.marquee.min.js"></script>
					<script>
					  $('.marquee').marquee({ pauseOnHover: true });
					
					</script>
				</div>
			</div>
		</div>
	</div>

	<div class="products">	 
		<div class="container">
			<div class="col-md-9 product-w3ls-right">
				
				<div class="clearfix"> </div>
				
				<div class="product-top">
					<h4>Productos</h4>
					<ul> 
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Filtrar Por<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Precio más bajo</a></li> 
								<li><a href="#">Precio más alto</a></li>
								<li><a href="#">Unidades disponibles</a></li> 
								<!-- <li><a href="#">Popular</a></li>  -->
							</ul> 
						</li>
						
					</ul>  
					<div class="clearfix"> </div>
				</div>
				<div class="products-row">

					<!--All Products -->
					<?php 
						if(isset($productos)){
							foreach($productos->result() as $prod){?>
								<div class="col-md-3 product-grids"> 
									<div class="agile-products">
										<div class="new-tag"><h6>Nuevo</h6></div>
										<a href="single.html"><img src="<?php echo base_url();?>public/images/<?php echo $prod->imagen,".png" ?>" class="img-responsive" alt="img"></a>
										<div class="agile-product-text">              
											<h5><a href="single.html"><?php echo $prod->nombre ?></a></h5> 
											<h6><del><?php echo "$",$prod->precioAnt ?></del> <?php echo "$",$prod->precio ?></h6> 
											<form action="#" method="post">
												<input type="hidden" name="cmd" value="_cart" />
												<input type="hidden" name="add" value="1" /> 
												<input type="hidden" name="w3ls_item" value="<?php echo $prod->nombre ?>"/> 
												<textarea name="" id="" cols="15" rows="2" disabled style="resize: none;"><?php echo $prod->descripcion ?></textarea>
												<input type="hidden" name="amount" value="<?php echo $prod->precio ?>" /> 
												<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Agregar al carrito</button>
											</form> 
										</div>
									</div> 
								</div> 
							<?php
							}
						}else{
							echo "No hay productos en el momento";
						}
					?>
					  
					<!-- End All products -->

					<div class="clearfix"> </div>
				</div>
				
			</div>
			<div class="col-md-3 rsidebar">
				<div class="rsidebar-top">
					<div class="slider-left">
						<h4>Filtrar por Precio</h4>            
						<div class="row row1 scroll-pane">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>0 - $2.000 </label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$2.000 - $5.000 </label> 
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$5.000 - $10.000  </label> 
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$10.000 - $20.000 </label> 
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$20.000 - $30.000 </label> 
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$30.000 - $40.000  </label> 
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Más</label> 
						</div> 
					</div>
					<div class="sidebar-row">
						<h4>Filtar Por Categoria</h4>
						<ul class="faq">
							<li class="item1"><a href="#">Categorias<span class="glyphicon glyphicon-menu-down"></span></a>
								<ul>
								<?php 
									if(isset($categorias)){
										foreach($categorias->result() as $categ){
											echo "<li class='subitem1'><a href='#'>$categ->nombre</a></li>";
										}
									}else{
										echo "<li class='subitem1'><a href='#'>No hay categorias registradas</a></li>";
									}
								?>		 							
								</ul>
							</li>
							
						</ul>
						<!-- script for tabs -->
						<script type="text/javascript">
							$(function() {
							
								var menu_ul = $('.faq > li > ul'),
									   menu_a  = $('.faq > li > a');
								
								menu_ul.hide();
							
								menu_a.click(function(e) {
									e.preventDefault();
									if(!$(this).hasClass('active')) {
										menu_a.removeClass('active');
										menu_ul.filter(':visible').slideUp('normal');
										$(this).addClass('active').next().stop(true,true).slideDown('normal');
									} else {
										$(this).removeClass('active');
										$(this).next().stop(true,true).slideUp('normal');
									}
								});
							
							});
						</script>
						<!-- script for tabs -->
					</div>
													 
				</div>
				
			</div>
			<div class="clearfix"> </div>
			
		</div>
	</div>

	<div class="w3agile-ftr-top">
		<div class="container">
			<div class="ftr-toprow">
				<div class="col-md-4 ftr-top-grids">
					<div class="ftr-top-left">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div> 
					<div class="ftr-top-right">
						<h4>ENTREGA GRATIS</h4>
						<p>Entregas a domicilio totalmente gratis</p>
					</div> 
					<div class="clearfix"> </div>
				</div> 
				<div class="col-md-4 ftr-top-grids">
					<div class="ftr-top-left">
						<i class="fa fa-user" aria-hidden="true"></i>
					</div> 
					<div class="ftr-top-right">
						<h4>ATENCIÓN AL CLIENTE</h4>
						<p>Atendemos cualquier queja, solicitud, reclamo y sugerencia 24/7 </p>
					</div> 
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 ftr-top-grids">
					<div class="ftr-top-left">
						<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
					</div> 
					<div class="ftr-top-right">
						<h4>BUENA CALIDAD</h4>
						<p>Nuestros productos son los mejores en cuanto a calidad precio </p>
					</div>
					<div class="clearfix"> </div>
				</div> 
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	
	<!-- //footer -->		
	<footer class="copy-right"> 
		<div class="container">
			<p>© 2020 Carro de Compras. Todos los derechos reservados</p>
		</div>
	</footer> 
	
	<script src="<?php echo base_url();?>public/js/minicart.js"></script>
	<script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) {
        			items[i].set('shipping', 0);
        			items[i].set('shipping2', 0);
        		}
        	}
        });
    </script>  
	
	<script src="<?php echo base_url();?>public/js/jquery.menu-aim.js"> </script>
	<script src="<?php echo base_url();?>public/js/main.js"></script> 
	
    <script src="<?php echo base_url();?>public/js/bootstrap.js"></script>
</body>
</html>