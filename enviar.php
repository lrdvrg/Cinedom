
<?php
$remitente = $_POST['email'];
$asunto = 'Contacto desde nuestra web de Cinedom';
$nombre =   isset( $_POST['name'] ) ? $_POST['name'] : '';
$telefono =   isset( $_POST['phone'] ) ? $_POST['phone'] : '';
$email  =   isset( $_POST['email'] ) ? $_POST['email'] : '';
$mensaje =  isset( $_POST['mensaje'] ) ? $_POST['mensaje'] : '';
$contenido = '
						<html>
						<head>
							<title></title>
						</head>
						<body>
							 <h2>Haz recibido un mensaje através de tu página Cinedom</h2>
							 <p>'.$nombre. ' te ha enviado el siguiente mensaje:</p>
                             <p>'.$mensaje. ' <br><br> Puedes ponerte en contacto con la persona al email: '.$email.'</p>
                             <p><br><br> El numero de teléfono de la persona que te ha escrito es:&nbsp'.$telefono.'</p>
							 <hr>
							 
						</body>
						</html>';


// Configuración de los encabezados
$headers = "From: " . $nombre . "<" . $email . "> \r\n" .
"Reply-To: " . $email . "\r\n" .
"MIME-Version: 1.0" . "\r\n" .
"Content-type:text/html;charset=UTF-8" . "\r\n";



// Enviar correo
$envio = mail('Dahiangonzalez14@gmail.com', $asunto, $contenido, $headers);


if($envio) {
	$miresultado = '<h4>El correo ha sido enviado! Gracias por ponerse en contacto con nosotros.</h4>';
	} else{
	
	$miresultado = '<h4>No se envío el correo.</h4>';
	
	}
	
	echo $miresultado;


//reenviar correo a quien lo envio

$remitente = $_POST['email'];
$nombreadmin = "Sistema Cinedom";
$correoadmin = 'Dahiangonzalez14@gmail.com';
$asunto = 'Contacto desde nuestra web de Cinedom';
$nombre =   isset( $_POST['name'] ) ? $_POST['name'] : '';
$telefono =   isset( $_POST['phone'] ) ? $_POST['phone'] : '';
$email  =   isset( $_POST['email'] ) ? $_POST['email'] : '';
$mensaje =  isset( $_POST['mensaje'] ) ? $_POST['mensaje'] : '';
$contenido = '
						<html>
						<head>
							<title></title>
						</head>
						<body>
							 <h2>Haz enviado correctamente el mensaje a contacto Cinedom</h2>
							 <p>'.$nombre. 'es el nombre que va a recibir el admin de la pagina y s envio al siguiente mensaje:</p>
                             <p>'.$mensaje. ' <br><br> Puedes ponerte en contacto con la persona al admin al: 809-983-1213 </p>
                             <p><br><br>El numero de teléfono que ingresaste a la pagina fue:&nbsp'.$telefono.'</p>
							 <hr>
							 
						</body>
						</html>';


// Configuración de los encabezados
$headers = "From: " . $nombreadmin . "<" . $correoadmin . "> \r\n" .
"Reply-To: " . $correoadmin . "\r\n" .
"MIME-Version: 1.0" . "\r\n" .
"Content-type:text/html;charset=UTF-8" . "\r\n";



// Enviar correo
$envio = mail($email, $asunto, $contenido, $headers);

if($envio) {
	$miresultado = '<h4>El correo ha sido enviado! Gracias por ponerse en contacto con nosotros.</h4>';
	} else{
	
	$miresultado = '<h4>No se envío el correo.</h4>';
	
	}
	
	echo $miresultado;


