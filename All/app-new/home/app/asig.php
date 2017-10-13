<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<title>Clima</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
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
      
      </header>
      <div class="container" style="color: white; padding: 20px">
        <center><h3>Asignación de dispositivo IoT</h3></center>
        <br>
      </div>
      <div class="row" > 
      <div class="col-xs-1 col-sm-3 col-md-4"></div>
      <div class="col-xs-10 col-sm-6 col-md-4">
<div class="container">
  <form action="asig.php" method="post" id= "asi">
      <div class="input-group">
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
    </div>
       
    
    <br>

    <div class="input-group">
       	<span class="input-group-addon">Barrio</span>     	
      	<input id="Barrio" type="text" class="form-control" name="Barrio" >
    </div>
    <br>
      <div class="input-group">
      <span class="input-group-addon">Longitud</span>
      <input id="Longitud" type="text" class="form-control" name="Longitud" placeholder="" value="">
    </div>
    <br>
      <div class="input-group">
      <span class="input-group-addon">Latitud</span>
      <input id="Latitud" type="text" class="form-control" name="Latitud" placeholder="" value="">
    </div>
    <br> <br>
   
    <center><input type="submit" name="Button" class="btn btn-info" value="Actualizar"> 
    <input type="submit" name="consultar" class="btn btn-danger" value="Consultar"> 
    <a href="menu.html" class="btn btn-warning" role="button">menu</a></center>
       
    <br> <br>

 </form>

</div>
</div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
</body>
</html>

   <link rel="stylesheet" href="../css/responsimple.min - copia.css">     
<?php

  if(isset($_POST["Button"])){

    $Serie = $_POST["Dispositivo"];
    $barrio = $_POST["Barrio"];
    $longitud = $_POST["Longitud"];
    $latitud = $_POST["Latitud"];

    require_once ('conectar.php');
    $conexion = conectar();

    $actualizar = "UPDATE dispositivo SET BARRIO = '$barrio', LATITUD= $latitud, LONGITUD = $longitud  WHERE NUMSERIE= '$Serie'";

    if (mysqli_query($conexion, $actualizar)) {

    	      echo "updated successfully";
    } else {
      echo "Error updating: " . mysqli_error($conexion);
    }
  
  mysqli_close($conexion);
  }


  if (isset($_POST["consultar"])) {

  	$Serie= $_POST["Dispositivo"];

    require_once ('conectar.php');
    $conexion = conectar();

    $consulta = "SELECT BARRIO, LATITUD, LONGITUD FROM dispositivo  WHERE NUMSERIE= '$Serie'";
    $resultado= mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {

    	while($row = mysqli_fetch_array($resultado)) {
        echo"
        <div class=\"row\" > 
        <div class=\"col-xs-1 col-sm-3 col-md-4\"></div>
      <div class=\"col-xs-1 col-sm-3 col-md-4\">
        <table class=\"table table-hover\" width = \"100%\" >
        <thead>
            <tr>    
                <td><b><center>Serie</center></b></td>
                <td><b><center>Barrio</center></b></td>
                <td><b><center>Latitud</center></b></td>
                <td><b><center>Longitud</center></b></td>
            </tr>
            </thead>
            <tbody>
            <tr>    
                <td><center>".$Serie."</center></td>
                <td><center>".$row['BARRIO']."</center></td>
                <td><center>".$row['LATITUD']."</center></td>
                <td><center>".$row['LONGITUD']."</center></td>
                
            </tr>
            </tbody>
        </table>    
        <p></p>
        </div>
         
        ";       


    }
	} else {
    echo "0 results";
		}

	mysqli_close($conexion);

  }
  
  	

?>

