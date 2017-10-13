<?php
    include_once("gestionBD.php");

    $bd = new gestionBD();
    $solicitud = $_POST['solicitud'];
    

if ($solicitud === 'temperatura') {
    $fecha = getdate();
    $anio = $fecha["year"];
    $mes =  $fecha["mon"];
    $dia =  $fecha["mday"];
    $hora = $fecha["hours"];
    $multivectorial = $bd->getTemperaturas($anio, $mes, "", "", "");
    echo json_encode($multivectorial);
}

if ($solicitud === "cambio_temperatura") {
    $tamaño = $_POST['tamaño'];
    if ($tamaño < $resul =( ($bd -> getUltimoNumMedida()) + 1)) {
        echo json_encode( $bd -> getUltimaMedida() );
	}
	else {
		echo json_encode ( "" );
	}
}
