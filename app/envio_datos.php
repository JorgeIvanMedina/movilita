<?php
/**
 * Created by PhpStorm.
 * User: AndresF
 * Date: 22/02/2017
 * Time: 12:55
 */
require_once ('conectar.php');
$conexion = conectar();
$temperatura = $_POST['temperatura'];
$humedad = $_POST['humedad'];
$serie = $_POST['serie'];
$sql="INSERT INTO MEDIDA (NUMMEDIDA, NUMSERIE, HUMEDAD, TEMPERATURA, LLUVIA,FECHA) VALUES (NULL, '$serie', '$humedad', '$temperatura', 1,NULL);";

if (mysqli_query($conexion,$sql)) {
    echo "<br/>New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}

mysqli_close($conexion);

?>