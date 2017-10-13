<?php
class gestionBD
{
    function conexion()
    {

        $nombreServidor = "127.0.0.1";
        $usuario = "root";
        $contraseña = "";
        $BD = "clima";

        $mysqli = new mysqli( $nombreServidor, $usuario, $contraseña, $BD );
        // if ($mysqli->connect_errno) {
        //     echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        // }
        return $mysqli;
    }

    function desconexion($mysqli)
    {

        $desconectar = $mysqli->close();
        return $desconectar;
    }


    function obtenerNuevoId()
    {

        $mysqli = $this->conexion();
        $res = $mysqli->query("SELECT NUMMEDIDA FROM medida");
        $num = $res->num_rows;
        $this->desconexion($mysqli);
        return $num;
    }
        
    function prepararCadena($vector)
    {
            
        $separado_por_comas = "";
        foreach ($vector as $clav => $valr) {
            while (list($clave,$valor)=each($valr)) {
                $separado_por_comas = $valor . "-" . $separado_por_comas;
            }
        }
        return  $separado_por_comas;
    }

    function agregarMedida($numSerie, $humedad, $temperatura, $lluvia)
    {

        $numId = $this->obtenerNuevoId();
        $fecha = getdate();
        $anio = $fecha["year"];
        $mes =  $fecha["mon"];
        $dia =  $fecha["mday"];
        $hora = $fecha["hours"];
        $minuto = $fecha["minutes"];
        $segundo = $fecha["seconds"];
        $mysqli = $this->conexion();

        $resultado = $mysqli->query("INSERT INTO medida (NUMMEDIDA, NUMSERIE, HUMEDAD, TEMPERATURA, LLUVIA, ANIO, MES, DIA, HORA, MINUTO, SEGUNDO) VALUES ($numId,$numSerie,$humedad,$temperatura,$lluvia,$anio,$mes,$dia,$hora,$minuto,$segundo);");
            
        return $resultado;
        $this->desconexion($mysqli);
    }

    function buscarUltimaHoraTemperatura()
    {

        $mysqli = $this->conexion();
        $fecha = getdate();
        $anio = $fecha["year"];
        $mes =  $fecha["mon"];
        $dia =  $fecha["mday"];
        $hora = $fecha["hours"];
        $mysqli->set_charset('utf8');
        $arreglo = array();
        $res = $mysqli->query( "SELECT TEMPERATURA  FROM medida WHERE ANIO = $anio AND MES = $mes AND DIA = $dia AND HORA = $hora" );
        while ($re=$res->fetch_array(MYSQLI_NUM)) {
            $arreglo[] = $re;
        }
        $this->desconexion($mysqli);
        return $arreglo;
    }

    //Obtiene las medidas de temperatura por dia, hora o mes
    function getTemperaturas($año, $mes, $dia, $hora, $minuto)
    {

        $mysqli = $this->conexion();
        $arreglo = array();
        $exito = true;
        //temperatura por hora
        if ($minuto === "" && $hora !== "" && $dia !== "" && $mes !== "" && $año !== "") {
            $res = $mysqli->query( "SELECT HUMEDAD, ANIO, MES, DIA, HORA, MINUTO, SEGUNDO FROM medida WHERE ANIO = $año AND MES = $mes AND DIA = $dia AND HORA = $hora" );
        } //temperatura por dia
        elseif ($minuto === "" && $hora === "" && $dia !== "" && $mes !== "" && $año !== "") {
            $res = $mysqli->query( "SELECT HUMEDAD, ANIO, MES, DIA, HORA, MINUTO, SEGUNDO FROM medida WHERE ANIO = $año AND MES = $mes AND DIA = $dia" );
        } //temperatura por mes
        elseif ($minuto === "" && $hora === "" && $dia === "" && $mes !== "" && $año !== "") {
            $res = $mysqli->query( "SELECT HUMEDAD, ANIO, MES, DIA, HORA, MINUTO, SEGUNDO FROM medida WHERE ANIO = $año AND MES = $mes" );
        } else {
            $exito = false;
        }
        
        if ($exito = true) {
            while ($resul=$res->fetch_array(MYSQLI_NUM)) {
                $arreglo[] = $resul;
            }
        }
        
        return $arreglo;
    }

    function getUltimoNumMedida()
    {
        
        $mysqli = $this->conexion();
        $res = $mysqli->query( "SELECT NUMMEDIDA FROM medida ORDER by NUMMEDIDA DESC LIMIT 1" );
        $resul=$res->fetch_array(MYSQLI_NUM);
        return $resul[0];
    }

    function getUltimaMedida()
    {
        
        $mysqli = $this->conexion();
        $res = $mysqli->query( "SELECT HUMEDAD, ANIO, MES, DIA, HORA, MINUTO, SEGUNDO FROM medida ORDER by NUMMEDIDA DESC LIMIT 1" );
        $resul=$res->fetch_array(MYSQLI_NUM);
        return $resul;
    }
}
