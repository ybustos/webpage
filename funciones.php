<?php

function mail_contacto($nombre, $correo, $telefono, $opciones, $informacion)
{
    error_log($opciones);
    $num_opciones = count($opciones);
    $campos='';
    $otro = '';

    for ($i = 0; $i < $num_opciones; $i += 1) {
        $opcion = $opciones[$i];
    error_log($opcion);
        switch ($opcion) {
            case 'dwe':
                $opcion = 'Desarrollo web estático';
                break;
            case 'appm':
                $opcion = 'Aplicaciones móviles';
                break;
            case 'seo':
                $opcion = 'Posicionamiento en buscadores';
                break;
            case 'rpv':
                $opcion = 'Desarrollo responsive';
                break;
            case 'din':
                $opcion = 'Desarrollo web dinámico';
                break;
            case 'otr':
                $otro = 'Además, el cliente ha solicitado la siguiente información:'.'<br>';
                unset($opcion);
                break;
        }
        if (isset($opcion)){
            $campos .= '<li>' . $opcion . '</li>';
        }
    }

    $to = 'info@codecube.es';

    $headers = "From: codecube.es\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    $headers .= "Return-Path: " . $correo . " \r\n";
    $headers .= "Reply-To: " . $correo . "\r\n";

    $mail = <<<EOD
	<!DOCTYPE html> 
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
			<title>Maqueta</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		</head>
		<body>
			<div style='padding:10px'>
				<p>De:<strong>$nombre</strong></p>
				<p>Correo: <em>$correo</em></p>
				<br>
				<p>El cliente ha solicitado los siguientes servicios</p>
				<ul>$campos</ul>
				$otro<br>
				$informacion
			</div>
		</body>
	</html>
EOD;
    return mail($to, 'Mensaje desde la página de contacto', $mail, $headers);
}

function mail_confirmacion($correo)
{
    error_log($correo);
    $to = $correo;

    $headers = "From: info@codecube.es\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";

    $mail_respuesta = <<<EOD
<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Maqueta</title>
    </head>
    <body>
        <table style="width: 100%">
            <tr>
                <td>
                    <table style="width: 95%; ">
                        <tr style="font-size: 1.5rem;">
                            <td>
                                <table style="width:20%">
                                    <tr>
                                        <td style="text-align: right">Code</td>
                                        <td>
                                            <div style="position: relative;width: 34px;top:-28px;left:12px;opacity:0.8">
                                                <div style="width:34px; height: 34px;background-color: blue;position: absolute;"></div>
                                            </div>
                                        </td>
                                        <td>Cube</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr id="body">
                <td style="border-width: 5px 0px 5px 0px; border-style: solid; border-color: #33AAD6;">
                    <table style="padding-top: 20px; width:100%;text-align:center;">
                        <tr>
                            <td style="color: #2564AA; font-size: 1.5rem; text-align: center;">
                                ¡Gracias por tu interés en CodeCube!
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center">
                                En breve nos pondremos en contacto contigo y veremos que podemos hacer por ti
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table id="footer">
                        
                    </table>
                </td>
            </tr>
            
        </table>
    </body>
    </html>
EOD;
    mail($to, 'Confirmación de codecube', $mail_respuesta, $headers);
}

