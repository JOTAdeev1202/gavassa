<?php
session_start();
if (!isset($_SESSION["acceso_autorizado"])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Pastas Gavassa | Lo rico es lo nuestro</title>

	<meta name="viewport" content="width=device-width, user-scalable=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

	<link href='dist/simplelightbox.min.css' rel='stylesheet' type='text/css'>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="./slick/slick.css">
			<link rel="stylesheet" href="unslider-master/dist/css/unslider.css">
  <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">

  <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="unslider-master/src/js/unslider.js"></script> <!-- but with the right path! -->
	<script src="https://use.fontawesome.com/0e3cac397a.js"></script>

	<script>
		jQuery(document).ready(function($) {
			$('.my-slider').unslider({
				autoplay: true,
				delay: 7000,
				animation: 'fade',
				nav: false,
				arrows: false
			});
		});
	</script>

</head>
<body class="receta">

	

	<header>
		<div class="menu-movil"><i class="fa fa-bars"></i></div>


		<script type="text/javascript">
			$(".menu-movil").click(function(){
			    $(".menu").toggle();
				});
		</script>

		<div class="logo-movil"><a href="index.html"><img src="img/logo.png"></a></div>

		<div class="menu container">
			<ul>

				<li class="logo"><a href="index.html"><img src="img/logo.png"></a></li>
				<li><a href="index.html">Inicio</a></li>
				<li><a href="nosotros.html">Nuestra Compañía</a></li>
				<li class="">
					<a href="#">Productos</a>
					<ul>
						<li class="gallery">
							<a href="gavassa.html">Gavassa</a>
						</li>
						<li class="gallery">
							<a href="catalogo.html">Catálogo</a>
						</li>
						
						<!-- <li class="gallery-fitbrand"><a href="fitbrand.html">Fitbrand</a>

						</li>
						<li class="gallery-marypas">
							<a href="marypas.html">Marypas</a>
							
						</li> -->
					</ul>
				</li>
				<li><a href="recetas.html">Recetas</a></li>
				<li><a href="#">Servicios</a>
					<ul>
						<li class="brochure-cat">
							<a href="img/brochure1.jpg">Maquila</a>
							<a class="ocultar"  href="img/brochure2.jpg"></a>
							<a class="ocultar"  href="img/brochure3.jpg"></a>
						</li>
					</ul>
				</li>
				<li>
				    <a href="cambiaton.html">Cambiatón</a>
					
				</li>
				<li><a href="contacto.html">Contáctenos</a>
					<ul class="contacto-lista">
						<li><a href="contacto.html#trabaje-nosotros">Trabaje con nosotros</a></li>
						<li><a href="contacto.html#proveedor">Quiere ser nuestro proveedor?</a></li>
						<li><a href="contacto.html#qyr">Formato Electrónico de Quejas y Reclamos</a></li>
						<li><a href="contacto.html#comprar-producto">Quiere comprar nuestro producto?</a></li>
					</ul>
				</li>
				<li>
					<a href="https://www.psepagos.co/PSEHostingUI/DatabaseTicketOffice.aspx?ID=10078" target="_blank">
						<img src="img/logo-pse.png" height="40">
					</a>
				</li>
			</ul>
		</div>

		<!-- <div class="brochure brochure-cat"><a href="img/brochure.jpg">Brochure</a></div> -->
	</header>

	<section id="recetas">

	<div class="catalogo">
		<!-- <div class="gallery">
			<a href="img/catalogo1.jpg" class="big"><img src="img/catalogo1.jpg"/></a>
			<a class="ocultar" href="img/catalogo2.jpg"></a>
			<a class="ocultar" href="img/catalogo3.jpg"></a>
			<a class="ocultar" href="img/catalogo4.jpg"></a>
			<a class="ocultar" href="img/catalogo5.jpg"></a>
			<a class="ocultar" href="img/catalogo6.jpg"></a>
			<a class="ocultar" href="img/catalogo7.jpg"></a>
			<a class="ocultar" href="img/catalogo8.jpg"></a>
			<a class="ocultar" href="img/catalogo9.jpg"></a>
		

			<div class="link"><a href="images/image1.jpg">Abrir Catálogo</a></div>

		</div> -->

		
	</div>



		<!-- <div style="margin-bottom: 0px; margin-top: 0px;position: relative;background: url(img/portada-recetas-cover.jpg) no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;padding: 200px 0px; border-radius: 0px;" class="titulo-valores"><span>Recetas</span></div> -->
		<div class="formulario-trabaje container formulario">
			
		</div>

		<div class="row container-full">
			<div class="col-md-12 margen-cero row">
				<iframe style="width:1170px;height:800px" src="https://online.fliphtml5.com/ndsfx/ztyu/#p=1"  seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" ></iframe>
				
			</div>
			

			
		</div>

		
		

		

		<div class="frase" id="contacto"><img src="img/frase.png" alt=""></div>
		
	</section>

	<footer>
		<div class="footer-logo"><img src="img/logo.png"></div>
		<div class="footer-abajo container">
			<div class="redes">
	<a href="https://www.facebook.com/pastasgavassa/" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
	<a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
</div>
			<div class="creditos"><b>© 2025 · Gavassa · Calle 20 # 12 - 50 Bucaramanga, Santander · <br> Teléfonos de contacto:</b><br> Atención general: 6076960119 - 3153768142 - 018000187696 <br> Seguimiento a entrega de pedidos: 3176680987 <br>Servicio al cliente y PQR: 3183787188 <br> 
			<a href="img/politica.pdf" style="color:#919191;">Politica de tratamiento de Datos</a></div>
		</div>
	</footer>
	




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="dist/simple-lightbox.js"></script>
<script type="text/javascript" src="js/recetas.js"></script>

</body>
</html>