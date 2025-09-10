<?php
session_start();

// Define tu contraseÃ±a aquÃ­
$claveCorrecta = "890200408-9";

// Si se enviÃ³ el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["password"] === $claveCorrecta) {
        $_SESSION["acceso_autorizado"] = true;
        header("Location: empleados.php");
        exit();
    } else {
        $error = "ContraseÃ±a incorrecta";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Acceso Empleados - Gavassa</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
  html, body {
    height: 100%;
  }

  .centro-login {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
  }
</style>
</head>
<body class="centro-login text-center" style="background-color: #f9f9f9;">
    
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
				<li><a href="#">Contáctenos</a>
					<ul class="contacto-lista">
						<li><a href="trabajo.html">Trabaje con nosotros</a></li>
						<li><a href="proveedor.html">Quiere ser nuestro proveedor?</a></li>
						<li><a href="pqr.html">Formato peticiones quejas y reclamos</a></li>
						<li><a href="compras.html">Quiere comprar nuestro producto?</a></li>
					</ul>
				</li>
				
			<li>
			    <a href="login.php" class="link-blanco"><i class="fa fa-lock"></i> Empleados</a>
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

<h2 class="mb-4">🔒 Acceso restringido para empleados Gavassa</h2>

<form method="post" style="max-width: 300px; width: 100%;">
  <input class="form-control mb-2" type="password" name="password" placeholder="Ingrese la contraseña" required>
  <button class="btn btn-danger btn-block" type="submit">Entrar</button>
 
  <?php if (!empty($error)) echo "<p class='text-danger mt-2'>$error</p>"; ?>
</form>




	


</body>
</html>