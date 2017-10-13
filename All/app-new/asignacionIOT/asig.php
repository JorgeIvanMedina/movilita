<!DOCTYPE html>
<html>
<head>
  <title>Movilita</title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta charset="UTF-8">
</head>
<body>
  <header id="header" class="header">
    <div class="contenedor">
      <div class="logo-top">
        <img src="../../img/logo.png" alt="logo-top">
      </div>
      <h1 style="display: inline-block; margin: 30px auto auto -3px; color: #38a5d8">Movilita</h1>      
      <div > 
        
        <div class="icon-menu">
          <input type="btn-menu" class="icon-container" value="Logout" onclick="hacer_click()">                                 
        </div> 
                 
      </div> 
    </div>
  </header>  
<head>
	<meta charset="utf-8">
  	<title>Clima</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</head>
<script type="text/javascript">
    function hacer_click(){

        //alert("Me haz dado click");
        window.location="../index2.php";
    }
</script>
<body>
	  <header>
      <div class="container">
        <h1>Asignación</h1>
        <br>
      </div>
      </header>

<div class="container">
  <form action="asig.php" method="post" id= "asi">
      <div class="input-group">
      <span class="input-group-addon">Dispositivo</span>
     <select name="Dispositivo" class="form-control" placeholder="seleccione">
      <option value="selec"></option>
      <option value="S001">S001</option>
      <option value="S002">S002</option>
      <option value="S003">S003</option>
      <option value="S004">S004</option>
    </select>
    </div>
       
    
    <br>

    <div class="input-group">
       	<span class="input-group-addon">Barrio</span>     	
      	<input id="Barrio" type="text" class="form-control" name="Barrio" placeholder="" value="">
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
   
    <input type="submit" name="Button" class="btn btn-primary" value="Actualizar"> 
    <input type="submit" name="consultar" class="btn btn-warning" value="Consultar"> 
    <a href="http://localhost/lab3/menu.html" class="btn btn-info" role="button">menu</a>
       
    <br> <br>

 </form>

</div>

<?php

  if(isset($_POST["Button"])){

    $Serie = $_POST["Dispositivo"];
    $barrio = $_POST["Barrio"];
    $longitud = $_POST["Longitud"];
    $latitud = $_POST["Latitud"];

    $conexion= mysqli_connect("localhost", "root", "","clima");
    if (!$conexion) {

        die("Connection failed: " . mysqli_connect_error());
    }

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

  	$conexion= mysqli_connect("localhost", "root", "","clima");
    if (!$conexion) {

        die("Connection failed: " . mysqli_connect_error());
    }

    $consulta = "SELECT BARRIO, LATITUD, LONGITUD FROM dispositivo  WHERE NUMSERIE= '$Serie'";
    $resultado= mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {

    	while($row = mysqli_fetch_assoc($resultado)) {
        echo  "$Serie : BARRIO: " . $row["BARRIO"]. " - LATITUD: " . $row["LATITUD"]. "- LONGITUD: " . $row["LONGITUD"]. "<br>";

    }
	} else {
    echo "0 results";
		}

	mysqli_close($conexion);

  }
  
  	

?>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="../../js/bootstrap.min.js" charset="utf-8" async defer></script> 
</body>
</html>

<link rel="stylesheet" href="../../css/responsimple.min - copia.css">