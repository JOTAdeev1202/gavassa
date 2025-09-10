<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/gavassa/PHPMailer-master/src/Exception.php';
require '/home/gavassa/PHPMailer-master/src/PHPMailer.php';
require '/home/gavassa/PHPMailer-master/src/SMTP.php';


// Paso 1: Validar si los campos obligatorios están vacíos.
// Es crucial validar en el servidor, ya que la validación en HTML/JavaScript se puede omitir.
if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['cedula']) || empty($_POST['ciudad']) || empty($_POST['telefono']) || empty($_POST['email']) || empty($_POST['motivo']) || empty($_POST['prodname']) || empty($_POST['nombreproducto']) || empty($_POST['marca']) || empty($_POST['presentacion']) || empty($_POST['lote']) || empty($_POST['fecha']) || empty($_POST['reclamo']) || empty($_POST['attachment']) ) {
    // Si falta algún dato, muestra un mensaje de error y detiene el script.
    echo "¡Error! Por favor, regresa y completa todos los campos del formulario.";
    exit; // Detiene la ejecución del script aquí
}


$nombre = trim($_POST['nombre'] ?? '');
$apellido = trim($_POST['apellido'] ?? '');
$cedula = trim($_POST['cedula'] ?? '');
$ciudad = trim($_POST['ciudad'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$email = trim($_POST['correo'] ?? '');
$motivo = trim($_POST['motivo'] ?? '');
$prodName = trim($_POST['prodName'] ?? '');
$nombreproducto = trim($_POST['nombreproducto'] ?? '');
$marca = trim($_POST['marca'] ?? '');
$presentacion = trim($_POST['presentacion'] ?? '');
$lote = trim($_POST['lote'] ?? '');
$fecha = trim($_POST['fechavencimiento'] ?? '');
$reclamo = trim($_POST['reclamo'] ?? '');
$attachment = trim($_FILES['attachment']['tmp_name'] ?? '');

// Construcción del mensaje de correo
$mensaje = "<div style='width: 400px; margin: 30px auto; padding:50px; background:url(http://gavassa.com/gavassa/img/slide2.jpg) no-repeat; background-size: cover;shadow-box: 1px 1px 1px #000;-webkit-box-shadow: 0px 0px 40px 0px rgba(0,0,0,0.18);-moz-box-shadow: 0px 0px 40px 0px rgba(0,0,0,0.18);box-shadow: 0px 0px 40px 0px rgba(0,0,0,0.18);'><div style='background: #fff; padding:20px; border-radius: 20px; border: solid 1px rgba(0,0,0,.1); line-height:18px;'><div style='text-align:center; background:#fff; padding:20px;'><img height='80px;' src='http://gavassa.com/gavassa/img/logo.png'></div><h3 style='background: #bd0811; padding: 20px; color: #fff;'>Datos Personales</h3>";
$mensaje .= "Nombre del interesado: <b>" . htmlspecialchars($nombre) . "</b><br>";
$mensaje .= "Apellido del interesado: <b>" . htmlspecialchars($apellido) . "</b><br>";
$mensaje .= "Su correo es: <b>" . htmlspecialchars($email) . "</b><br>";
$mensaje .= "Su c&eacute;dula es: <b>" . htmlspecialchars($cedula) . "</b><br>";
$mensaje .= "Su ciudad es: <b>" . htmlspecialchars($ciudad) . "</b><br>";
$mensaje .= "Su tel&eacute;fono es: <b>" . htmlspecialchars($telefono) . "</b><br>";
$mensaje .= "<h3 style='background: #bd0811; padding: 20px; color: #fff;'>Motivo de la PQR</h3>";
$mensaje .= "Su motivo es: <b>" . htmlspecialchars($motivo) . "</b><br>";

// Solo agrega la sección de Calidad del Producto si el motivo es "Calidad del producto"
if ($motivo == 'Calidad del producto') {
    $mensaje .= "<h3 style='background:#bd0811;padding: 20px; color: #fff;'>Calidad del Producto</h3>";
    $mensaje .= "El lugar de compra del producto fue en: <b>" . htmlspecialchars($prodName) . "</b><br>";
    $mensaje .= "El nombre del producto es:<b> " . htmlspecialchars($nombreproducto) . "</b><br>";
    $mensaje .= "La marca es: <b>" . htmlspecialchars($marca) . "</b><br>";
    $mensaje .= "La presentaci&oacute;n es de: <b>" . htmlspecialchars($presentacion) . "</b><br>";
    $mensaje .= "El lote es: <b>" . htmlspecialchars($lote) . "</b><br>";
    $mensaje .= "La fecha de vencimiento es: <b>" . htmlspecialchars($fecha) . "</b><br>";
}

$mensaje .= "La descripci&oacute;n de la PQR es: <br><br><b>" . htmlspecialchars($reclamo) . "</b><br>";
$mensaje .= "<p style='text-align:center; padding:15px; border-radius: 25px; color:#fff; background: #bd0811;'>Enviado el " . date('d/m/Y', time()). "</p>";
$mensaje .= "</div></div>";

// Configuración de PHPMailer y envío
$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'mail.gavassa.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'notificaciones@gavassa.com';
    $mail->Password = 'Notificacionesg4v4ss4';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('notificaciones@gavassa.com', 'Gavassa & Cia. Ltda.');
    $mail->addAddress('juandajr11@gmail.com', 'Joe User');
    $mail->addCC('sistema.gavassa@gmail.com','sebastian');

    $mail->isHTML(true);
    $mail->Subject = 'Formulario web Gavassa (PQR)';
    $mail->Body = $mensaje;

    // Manejo del archivo adjunto
    if (!empty($_FILES['attachment']['tmp_name'])) {
        $uploadfile = 'attachment/' . basename($_FILES['attachment']['name']);
        if (move_uploaded_file($_FILES['attachment']['tmp_name'], $uploadfile)) {
            $mail->addAttachment($uploadfile);
        }
    }
    
    $mail->send();
    
    // Eliminar el archivo adjunto después del envío
    if (!empty($uploadfile) && file_exists($uploadfile)) {
        unlink($uploadfile);
    }
    
} catch (Exception $e) {
    echo "Mensaje no se pudo enviar/*: {$mail->ErrorInfo}*/";
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
<body>

   
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

    <section id="nosotros">

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



        <div style="margin-bottom: 20px; margin-left: 50px; margin-right: 50px;" class="titulo-valores">Gracias por escribirnos, pronto nos comunicaremos con usted.</div>
       

        <div class="frase" id="contacto"><img src="img/frase.png" alt=""></div>
        
    </section>

	<footer>
		<div class="footer-logo"><img src="img/logo.png"></div>
		<div class="footer-abajo container">
			<div class="redes">
	<a href="https://www.facebook.com/pastasgavassa/" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
	<a href="https://www.instagram.com/pastas_gavassa/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
			<div class="creditos"><b>© 2025 · Gavassa · Calle 20 # 12 - 50 Bucaramanga, Santander · <br> Teléfonos de contacto:</b><br> Atención general: 6076960119 - 3153768142 - 018000187696 <br> Seguimiento a entrega de pedidos: 3176680987 <br>Servicio al cliente y PQRS: 3183787188 <br> 
			<a href="img/politica.pdf" style="color:#919191;">Politica de tratamiento de Datos</a></div>
		</div>
	</footer>
	
    




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="dist/simple-lightbox.js"></script>
<script>
    $(function(){
        var $gallery = $('.gallery a').simpleLightbox();
        var $brochure = $('.brochure-cat a').simpleLightbox();
        var $fitbrand = $('.gallery-fitbrand a').simpleLightbox();
        var $marypas = $('.gallery-marypas a').simpleLightbox();

        $gallery.on('show.simplelightbox', function(){
            console.log('Requested for showing');
        })

        $borchure.on('show.simplelightbox', function(){
            console.log('Requested for showing');
        })
        .on('shown.simplelightbox', function(){
            console.log('Shown');
        })
        .on('close.simplelightbox', function(){
            console.log('Requested for closing');
        })
        .on('closed.simplelightbox', function(){
            console.log('Closed');
        })
        .on('change.simplelightbox', function(){
            console.log('Requested for change');
        })
        .on('next.simplelightbox', function(){
            console.log('Requested for next');
        })
        .on('prev.simplelightbox', function(){
            console.log('Requested for prev');
        })
        .on('nextImageLoaded.simplelightbox', function(){
            console.log('Next image loaded');
        })
        .on('prevImageLoaded.simplelightbox', function(){
            console.log('Prev image loaded');
        })
        .on('changed.simplelightbox', function(){
            console.log('Image changed');
        })
        .on('nextDone.simplelightbox', function(){
            console.log('Image changed to next');
        })
        .on('prevDone.simplelightbox', function(){
            console.log('Image changed to prev');
        })
        .on('error.simplelightbox', function(e){
            console.log('No image found, go to the next/prev');
            console.log(e);
        });
    });
</script>
</body>
</html>
w