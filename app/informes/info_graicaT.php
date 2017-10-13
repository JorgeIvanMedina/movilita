<?php 
   session_start();
   $fecha_ini = $_SESSION['fecha_inic']; 
   $fecha_fin = $_SESSION['fecha_fina'];
   $serie = $_SESSION['serieD'];
   require_once ('conectar.php');
   $conexion = conectar();
?>
<!DOCTYPE HTML>
<html>
	<head>
    <meta http-equiv="refresh" content="60">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="UTF-8">
		<title>Grafico del Reporte</title>
		<style type="text/css">
		</style>
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
  <script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="highcharts.js"></script>
<script src="exporting.js"></script>
<div id="container" style="min-width: 100%; height: 400px; margin: 2%  10% auto 1.5%"></div>   
		<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Grafico de temperatura entre el <?php echo $fecha_ini;?> / <?php echo $fecha_fin;?>'
    },
    subtitle: {
        text: 'Serie del dispositivo '+'<?php echo $serie;?>' 
    },
    xAxis: {
        categories: [
         <?php
           $sql= "SELECT NUMSERIE, TEMPERATURA, FECHA as 'Fecha', DATE(FECHA) as 'fech' from MEDIDA where FECHA >= '$fecha_ini' and FECHA <= '$fecha_fin' and NUMSERIE = '$serie';"; 
           $result = mysqli_query($conexion,$sql);
           while($consulta = mysqli_fetch_array($result))
           {
            ?>
               '<?php echo $consulta['fech']?>',
            <?php
           }        
         ?>
        ]
    },
    yAxis: {
        title: {
            text: 'Temperatura'
        },
        labels: {
            formatter: function () {
                return this.value + '°';
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: '°C',
        marker: {
            symbol: 'square'
        },
        data: [

                 <?php
           $sql= "SELECT NUMSERIE, TEMPERATURA, FECHA as 'Fecha', DATE(FECHA) as 'fech' from MEDIDA where FECHA >= '$fecha_ini' and FECHA <= '$fecha_fin' and NUMSERIE = '$serie';"; 
           $result = mysqli_query($conexion,$sql);
           while($consulta = mysqli_fetch_array($result))
           {
            ?>
               <?php echo $consulta['TEMPERATURA']?>,
            <?php
           }        
         ?>

        ]

    }]
});
		</script>
    <script type="text/javascript">
      function hacer_click(){    
        window.location="reporteT.php";
      }   
    </script>    
      <?php
           $sql= "SELECT MAX(TEMPERATURA), MIN(TEMPERATURA) from MEDIDA where FECHA >= '$fecha_ini' and FECHA <= '$fecha_fin' and NUMSERIE = '$serie';"; 
           $result = mysqli_query($conexion,$sql);         
           while($consulta = mysqli_fetch_array($result))
           {         
               $con = $consulta['MAX(TEMPERATURA)'];
               $con2 = $consulta['MIN(TEMPERATURA)'];         
           }
           echo "Temperatura máxmia: ".$con;
           echo "Temperatura mínima: ".$con2;
      ?>    
	</body>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/responsimple.min - copia.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">  
</html>
