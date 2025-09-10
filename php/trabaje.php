<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluye los archivos de PHPMailer
require '/home/gavassa/PHPMailer-master/src/Exception.php';
require '/home/gavassa/PHPMailer-master/src/PHPMailer.php';
require '/home/gavassa/PHPMailer-master/src/SMTP.php';

// Paso 1: Validar si los campos obligatorios están vacíos.
// Es crucial validar en el servidor, ya que la validación en HTML/JavaScript se puede omitir.
if (empty($_POST['empresa']) || empty($_POST['nit']) || empty($_POST['productos']) || empty($_POST['nombrecontacto']) || empty($_POST['correo']) || empty($_POST['ciudad']) || empty($_POST['direccion']) || empty($_POST['telefono']) || empty($_POST['autoriza'])) {
// Si falta algún dato, muestra un mensaje de error y detiene el script.
echo "¡Error! Por favor, regresa y completa todos los campos del formulario.";
exit; // Detiene la ejecución del script aquí
}

// Definir las variables del formulario y aplicar trim() para limpiar los espacios
$empresa = trim($_POST['empresa']);
$nit = trim($_POST['nit']);
$productos = trim($_POST['productos']);
$nombrecontacto = trim($_POST['nombrecontacto']);
$correo = trim($_POST['correo']);
$ciudad = trim($_POST['ciudad']);
$direccion = trim($_POST['direccion']);
$telefono = trim($_POST['telefono']);
$autoriza = isset($_POST['autoriza']) ? "Sí" : "No"; // Manejar el checkbox correctamente

$msg = ''; // Variable para almacenar el mensaje de éxito o error

// --- (1) Lógica de validación principal ---
// Verificamos que los campos obligatorios no estén vacíos después de usar trim()
if (empty($empresa) || empty($nit) || empty($productos) || empty($nombrecontacto) || empty($correo) || empty($ciudad) || empty($direccion) || empty($telefono) || $autoriza === "No") {
    $msg = "Por favor, complete todos los campos obligatorios.";
} else {
    // Si la validación es exitosa, preparamos y enviamos el correo electrónico
    $mensaje = "<div style='width: 400px; margin: 30px auto; padding:50px; background:url(http://gavassa.com/gavassa/img/slide2.jpg) no-repeat; background-size: cover;shadow-box: 1px 1px 1px #000;-webkit-box-shadow: 0px 0px 40px 0px rgba(0,0,0,0.18);-moz-box-shadow: 0px 0px 40px 0px rgba(0,0,0,0.18);box-shadow: 0px 0px 40px 0px rgba(0,0,0,0.18);'><div style='background: #fff; padding:20px; border-radius: 20px; border: solid 1px rgba(0,0,0,.1); line-height:18px;'><div style='text-align:center; background:#fff; padding:20px;'><img height='80px;' src='http://gavassa.com/gavassa/img/logo.png'></div><h3 style='background: #bd0811; padding: 20px; color: #fff;'>Datos del Proveedor</h3>";
    $mensaje .= "<b>Empresa:</b> " . htmlspecialchars($empresa) . "<br>";
    $mensaje .= "<b>NIT:</b> " . htmlspecialchars($nit) . " <br>";
    $mensaje .= "<b>Productos:</b> " . htmlspecialchars($productos) . "<br>";
    $mensaje .= "<b>Nombre de contacto:</b> " . htmlspecialchars($nombrecontacto) . " <br>";
    $mensaje .= "<b>Correo electr&oacute;nico:</b> " . htmlspecialchars($correo) . "<br>";
    $mensaje .= "<b>Ciudad:</b> " . htmlspecialchars($ciudad) . "<br>";
    $mensaje .= "<b>Direcci&oacute;n:</b> " . htmlspecialchars($direccion) . "<br>";
    $mensaje .= "<b>Tel&eacute;fono:</b> " . htmlspecialchars($telefono) . "<br>";
    $mensaje .= "<b>Acepta los terminos:</b> " . htmlspecialchars($autoriza) . " <br>";
    $mensaje .= "<p style='text-align:center; padding:15px; border-radius: 25px; color:#fff; background: #bd0811;'>Enviado el " . date('d/m/Y', time()) . "</p>";
    $mensaje .= "</div></div>";

    // --- (2) Usar un solo bloque try...catch para el envío de PHPMailer ---
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
        $mail->addAddress('juandajr11@gmail.com', 'Recursos Humanos');
        $mail->addCC('sistemas.gavassa@gmail.com', 'Sebastian');

        $mail->isHTML(true);
        $mail->Subject = 'Formulario web de proveerdor';
        $mail->Body = $mensaje;
        
        $mail->send();
        $msg = "Gracias por escribirnos, pronto nos comunicaremos con usted.";
    } catch (Exception $e) {
        $msg = "El mensaje no se pudo enviar. Error de PHPMailer: {$mail->ErrorInfo}";
    }
}

// --- (3) Mostrar el mensaje de resultado ---
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pastas Gavassa | Lo rico es lo nuestro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <section id="nosotros">
        <div style="margin-bottom: 20px; margin-left: 50px; margin-right: 50px;" class="titulo-valores">' . htmlspecialchars($msg) . '</div>
        <div class="frase" id="contacto"><img src="img/frase.png" alt=""></div>
    </section>
</body>
</html>';
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
			    <a href="login.php" class="link-blanco"><i class="fa fa-lock"></i> Acceso empleados</a>
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
    <a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
</div>
            <div class="creditos">© 2018 · Gavassa · Calle 20 # 12 - 50 Bucaramanga, Santander · Teléfono: (7) 6711459 · Desarrollado por Salmah Agencia de Publicidad</div>
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
