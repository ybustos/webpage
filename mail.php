<?php

$fecha = date(DATE_RFC2822);
$nombre = $_POST['name'];
$correo = $_POST['mail'];
$telefono = $_POST['tel'];
if (isset($_POST['informacion'])){
    $informacion = $_POST['informacion'];
}
$opciones = "";
$otro = "";

for ($i = 0; $i < count($_POST['opciones']); $i += 1) {
    $opcion = $_POST['opciones'][$i];

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
            $otro = 'Además, el cliente ha solicitado la siguiente información:<br>';
            unset($opcion);
            break;
    }
    if (isset($opcion)){
		$opciones .= '<li>' . $opcion . '</li>';
    }
    
}

$mail = <<<EOD
<div style='padding:10px'>
    <p>From: <em>$nombre</em><small>               $correo</small></p>
    <p>$fecha</p>
    <br>
    <p>El cliente ha solicitado los siguientes servicios</p>
    <ul>$opciones</ul>
    $otro<br>
    $informacion
</div>
EOD;

//print_r($_POST);
exit($mail);

?>