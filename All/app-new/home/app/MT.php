<?php
   echo '
<!DOCTYPE html>
<html>
<head>
    <title>Medios Transporte</title>
      <meta name="viewport" content="width=device-width; initial-scale=1, minimum-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="Estilos.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
</head>
<body>


       <header id="header" class="header">
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


<script type="text/javascript">
    function hacer_click(){

        //alert("Me haz dado click");
        window.location="../index2.php";
    }
</script>

    <div class="row" > 
        <div class="col-xs-1 col-sm-3 col-md-4"></div>
        <div class="col-xs-10 col-sm-6 col-md-4" >

            <div style="color:white; padding: 20px"><center><h3 >Viajero en Movilidad</h3></center></div>
        
            <form method="POST" action="MT.php">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon" style="width:200px">Tipo de Transporte</span>
                        <select class="form-control" name="selecTipo">
                        <option value="Bus">Bus</option>
                        <option value="Taxi">Taxi</option>
                        <option value="Moto">Moto</option>
                        <option value="Bicicleta">Bicicleta</option>
                        <option value="Caminar">Caminar</option>
                    </select> 
                     </div>
            </div>                

             <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon" style="width:100px">Costo</span>
                    <input type="Number" name="cost" class="form-control" >
                </div>
            </div>
                 <center>
                <input type="submit" value="Consultar" class="btn btn-info"  name="btn2">
                <input type="submit" value="Actualizar" class="btn btn-danger"  name="btn3">
                <a href= "menu.html" style="margin:20px" class="btn btn-warning"  name="btn4">Menu</a>
                <p></p>
                <p></p>
            </form>

            <!-- Latest compiled and minified JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

            <script src="../../js/bootstrap.min.js" charset="utf-8" async defer></script> 
        
<script src="js/bootstrap.min.js" charset="utf-8" async defer></script>
<script type="text/javascript">
  function hacer_click(){

    //alert("Me haz dado click");
        window.location="../index.php";
    }
</script>
</body>

</html>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/responsimple.min - copia.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

<link rel="stylesheet" href="../../css/responsimple.min - copia.css">
';





if(isset($_POST['btn2']))
{
        require_once ('conectar.php');
        $conexion = conectar();
        $tip = $_POST['selecTipo'];
        $sql= "SELECT * FROM MEDIOSTRANSPORTE WHERE TIPO = '$tip';";
        if ($result = mysqli_query($conexion,$sql)) {
            while($consulta = mysqli_fetch_array($result))
            {
                echo"
                <table class=\"table table-hover\" width = \"100%\" >
                <thead>
                    <tr>    
                        <td><b><center>Tipo</center></b></td>
                        <td><b><center>Costo</center></b></td>
                        <td><b><center>VelPromedio</center></b></td>
                        <td><b><center>Humedad</center></b></td>
                        <td><b><center>Lluvia</center></b></td>
                        <td><b><center>Temperatura</center></b></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>    
                        <td><center>".$consulta['TIPO']."</center></td>
                        <td><center>".$consulta['COSTO']."</center></td>
                        <td><center>".$consulta['VELPROMEDIO']."</center></td>
                        <td><center>".$consulta['HUMEDAD']."</center></td>
                        <td><center>".$consulta['LLUVIA']."</center></td>
                        <td><center>".$consulta['TEMPERATURA']."</center></td>
                                    
                    </tr>
                    </tbody>
                </table>    
                <p></p>   
                ";               
            }       
        } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        } 
        mysqli_close($conexion);      
}


if(isset($_POST['btn3']))
{
        require_once ('conectar.php');
        $conexion = conectar();
        $tip = $_POST['selecTipo'];
        $cost = $_POST['cost'];
        $sql="UPDATE mediostransporte SET COSTO = '$cost' WHERE TIPO = '$tip';";
        if (mysqli_query($conexion,$sql)) {
                                            echo "<br/>New record created successfully";
                                        } 
        else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
            }

        mysqli_close($conexion);
}


?>

