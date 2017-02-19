<?php

include_once 'funciones.php';

$nombre = $_POST['name'];
$correo = $_POST['mail'];
$telefono = $_POST['tel'];
$opciones = $_POST['opciones'];

if (isset($_POST['informacion'])){
    $informacion = $_POST['informacion'];
}

if(mail_contacto($nombre, $correo, $telefono, $opciones, $informacion = null)){
    mail_confirmacion($correo);
}
exit();

?>