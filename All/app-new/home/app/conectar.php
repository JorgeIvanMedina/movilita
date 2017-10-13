<?php
/**
 * Created by PhpStorm.
 * User: AndresF
 * Date: 22/02/2017
 * Time: 12:55
 */
function conectar() {
    $conexion = new mysqli("localhost", "root", "", "clima");
    if (mysqli_connect_errno($conexion)) {
        echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
    }
    $conexion->character_set_name();
    if (!$conexion->set_charset('utf8')) {
        echo nl2br("\nError cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
        exit;
    }
    return $conexion;
}
?>
