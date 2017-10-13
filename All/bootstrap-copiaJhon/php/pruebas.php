<?php
include_once("gestionBD.php");
$bd = new gestionBD();
        $fecha = getdate();
        $anio = $fecha["year"];
        $mes =  $fecha["mon"];
        $dia =  $fecha["mday"];
        $hora = $fecha["hours"];
		$multivectorial = $bd->getTemperaturas($anio, $mes, "", "", "");
        echo json_encode ($multivectorial);
            $tamaño = $bd ->getUltimoNumMedida();
            if ($tamaño < $resul =( ($bd -> getUltimoNumMedida()) + 1)) {
                echo json_encode( $bd -> getUltimaMedida() );
            }
        
?>