<?php
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Movilita</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta charset="UTF-8">
</head>
<body>
    <header class="header">
    <div class="contenedor">
      <div class="logo-top">
        <img src="../img/logo.png" alt="logo-top">
      </div>
      <h1 class="logo-style">Movilita</h1>      
      <div >       
        <div class="icon-menu">
          <input type="btn-menu" class="icon-container-out" value="Regresar" onclick="hacer_click()">            
        </div> 
      </div> 
    </div>
    </header>      
    <form action="reporteT.php" method="POST">
    <table align="center" style="margin: auto auto;" width=90% border="1" bgcolor="#009ED6">
    <br>                       
    <td valing="top" width="25%" height="20%" align="center" colspan=2 bgcolor="#DEEEF5" class="_espacio_celdas" style="color: #044062; font-weight: bold">
        REPORTE DE EVENTOS POR RANGO DE FECHAS
    </td> 
    <tr>
      <td width="25%" height="20%" align="center" bgcolor="#DEEEF5" class="_espacio_celdas_m" style="color: #044062; font-weight: bold">
              SELECCIONE DISPOSITIVO
      </td>
      <td height="100%" align="center" bgcolor="#F2F7F9" class="_espacio_celdas">
                 <span class="input-group-addon">Dispositivo</span>
                 <select name="Dispositivo" class="form-control" placeholder="seleccione">
      <option value="selec"></option>
      <option value="2001">2001</option>
      <option value="2002">2002</option>
      <option value="2003">2003</option>
      <option value="2004">2004</option>
      <option value="2005">2005</option>
      <option value="2006">2006</option>
      </select>              
      </td>
    </tr>
    <tr>
      <td width="25%" height="20%" align="center" bgcolor="#DEEEF5" class="_espacio_celdas_m" style="color: #044062; font-weight: bold">
              FECHA INICIAL
      </td>
      <td height="20" align="center" bgcolor="#F2F7F9" class="_espacio_celdas">
           <input type=date value="" name="fecha_ini" required>               
        </td>
      </tr>  
      <tr>
      <td width="25%" height="20%" align="center" bgcolor="#DEEEF5" class="_espacio_celdas_m" style="color: #044062; font-weight: bold">
              FECHA FINAL
      </td>
      <td height="20" align="center" bgcolor="#F2F7F9" class="_espacio_celdas">
            <input type=date value="" name="fecha_fin" required>               
      </td>
      </tr>
      <tr>
      <td width="25%" height="20%" align="center" bgcolor="#DEEEF5" class="_espacio_celdas" style="color: #044062; font-weight: bold">              
      </td>
      <td height="20" align="center" bgcolor="#F2F7F9" class="_espacio_celdas">
          <input type=hidden value="1" name="enviado">
          <input type=submit value="GENERAR REPORTE" name="GENERAR REPORTE">
          <br>    
          <input type=hidden value="1" name="graficado"> 
        </td>
        </tr> 
        <tr>
        <td width="25%" height="20%" align="center" bgcolor="#DEEEF5" class="_espacio_celdas" style="color: #044062; font-weight: bold">              
        </td>
        <td height="20" align="center" bgcolor="#F2F7F9" class="_espacio_celdas">
          <input type=hidden value="1" name="graficado">
          <input type=submit value="GRAFICAR" name="GRAFICAR" onclick="hacer_clickGraficar()">
        </td>
        </tr>              
      </table>
<script type="text/javascript">
  function hacer_click(){

    //alert("Me haz dado click");
        window.location="Menu_reportes.php";
    }
  function hacer_clickGraficar(){
    //alert("Me haz dado click");
        window.location="info_graicaT.php";
    }    
</script>
</body>
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/responsimple.min - copia.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet"> 
</html>
<?php
if(isset($_POST['enviado'])){ 
     require_once ('conectar.php');
      $conexion = conectar(); 
      $enviado = $_POST['enviado'];
      $fecha_ini = $_POST['fecha_ini'];
      $fecha_fin = $_POST['fecha_fin'];
      $serie = $_POST['Dispositivo'];      
      $_SESSION['fecha_inic']=$fecha_ini;
      $_SESSION['fecha_fina']=$fecha_fin;
      $_SESSION['serieD']=$serie;
      $sql= "SELECT NUMSERIE, TEMPERATURA, FECHA as 'Fecha', DATE(FECHA) as 'fech' from MEDIDA where FECHA >= '$fecha_ini' and FECHA <= '$fecha_fin' and NUMSERIE = '$serie';";
      echo"
                        <div class=\"contenedor\" >                         
                                    <table width = \"100%\" >
                                        <thead>
                                            <tr>                                           
                                                <td><b><center>Temperatura</center></b></td>
                                                <td><b><center>Fecha</center></b></td>                            
                                            </tr>
                                        </thead>               
                                    </table>    
                            </div>
          ";
                if ($result = mysqli_query($conexion,$sql)) {
                    while($consulta = mysqli_fetch_array($result))
                    {                        
                        echo" 
                        <div class=\"contenedor\" >                         
                                    <table width = \"100%\" >   
                                        <tbody>
                                            <tr>                                           
                                            <td><center>".$consulta['TEMPERATURA']."</center></td>
                                            <td><center>".$consulta['Fecha']."</center></td>
                                            </tr>
                                        </tbody>       
                                    </table>    
                            </div>         
                               
                        ";            
                    }       
                } 
                else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
                } 
                mysqli_close($conexion);             
        }
 ?>     