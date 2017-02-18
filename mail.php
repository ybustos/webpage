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
    $opt;

    switch ($opcion) {
        case 'dwe':
            $opt = 'Desarrollo web estático';
            break;
        case 'appm':
            $opt = 'Aplicaciones móviles';
            break;
        case 'seo':
            $opt = 'Posicionamiento en buscadores';
            break;
        case 'rpv':
            $opt = 'Desarrollo responsive';
            break;
        case 'din':
            $opt = 'Desarrollo web dinámico';
            break;
        case 'otr':
            $otro = 'Además, el cliente ha solicitado la siguiente información:<br>';
            break;
    }
    $opciones .= '<li>' . $opt . '</li>';
}

$mail = <<<EOD
<div style='padding:10px'>
    <p>From: <em>$nombre</em><small>               $correo</small></p>
    <p>$fecha</p>
    <br>
    <p>El cliente ha solicitado los siguientes servicios</p>
    <br>
    <ul>$opciones</ul>
    $otro
    $informacion
</div>
EOD;

echo $mail;
//print_r($_POST);

?>