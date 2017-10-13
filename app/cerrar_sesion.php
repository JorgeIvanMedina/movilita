<?php
session_start();
session_destroy();
echo '<script>alert("Sesion cerrada, esperamos vuelvas pronto.")</script> ';
header("Location: ../index.php");
?>