<?php
                                                   
session_start();

if ($_SESSION["activo"] != "SI" or $_SESSION['TIPO'] == 2)
    header('Location: ../index.php');
?>

<?php
$Serie="";
$bar="";
$lat="";
$lon="";

if (isset($_POST["consultar"])) {
    $Serie= $_POST["Dispositivo"];

    require_once ('conectar.php');
    $conexion = conectar();

    

    $consulta = "SELECT BARRIO, LATITUD, LONGITUD FROM DISPOSITIVO  WHERE NUMSERIE= '$Serie'";
    $resultado= mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {

      while($row = mysqli_fetch_array($resultado)) {

        $bar=$row['BARRIO'];
        $lat=$row['LATITUD'];
        $lon=$row['LONGITUD'];     
        echo $Serie;

    }
  } else {
    echo "0 results";
    }

  mysqli_close($conexion);

  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Movilita | Asignar dispositivos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta charset="UTF-8">
  <link rel="icon" type="img/logo.png" sizes="" href="img/logo.png">
</head>
<body>
  <header id="header" class="header">
    <div class="contenedor">
      <div class="logo-top">
        <a href="../index.php"><img src="../img/logo.png" alt="logo-top"/>
      </div>
      <h1 class="logo-style">Movilita</h1></a>      
      <div > 
        <div class="icon-menu">
          <div class="container-bar" onclick="myFunction(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
          </div>
        </div>  
      </div>
    </div>
    <nav class="nav" id="nav">
      <?php if (@$_SESSION['activo']=="SI") { ?> 
        <a href="cerrar_sesion.php" class="nav-element">Cerrar sesion</a>
        <a href="register.php" class="nav-element">Generacion de reportes</a>
      <?php }?>  
      <?php if (@$_SESSION['TIPO'] == 1 or @$_SESSION['TIPO'] == 3 ) { ?>
        <a href="#" class="nav-element selected">Asignar dispositivo IoT</a>
        <a href="MT.php" class="nav-element">Medios de transporte</a>
      <?php }?>
      <?php if (@$_SESSION['TIPO'] == 3) { ?>
        <a href="cruduser.php" class="nav-element">Administracion de usuarios</a>
      <?php }?>
      <a href="../about-us.html" class="nav-element">Acerca de nosotros</a>  
    </nav>   
  </header>
  <main>
    <div class="login-form devices">      
      <h2 id="welcome">Asignación de dispositivo IoT</h2>
      <div>
        <form name="loginform" id="loginform" action="asig.php" method="POST">
          <p>Seleccione referencia del dispositivo</p>
          <select name="Dispositivo" class="" placeholder="seleccione">
            <option value="select"></option>
            <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2004">2004</option>
            <option value="2005">2005</option>
            <option value="2006">2006</option>
          </select>
          <p>
            Barrio<input id="Barrio" type="text" class="form-control" name="Barrio" placeholder="Ingrese barrio" value= "<?php echo $bar?>"/>
          </p>
          <p>
            Longitud<input id="Longitud" type="text" class="form-control" name="Longitud" placeholder="Ingrese longitud" value="<?php echo $lon?>"/>
          </p>
          <p>
            Latitud<input id="Latitud" type="text" class="form-control" name="Latitud" placeholder="Ingrese latitud" value="<?php echo $lat?>"/>
          </p>
            <p class="submit">
            <input type="submit" name="consultar" value="Consultar">
            <input type="submit" name="Button" value="Actualizar"> 
         </p>
        </form>
      </div>
    </div>
  </main>
<script src="../js/app.js"></script>
<?php if (@$_SESSION['activo']=="SI") { ?> 
<section class="user-name">
      <p><?php echo $_SESSION['NICK'];?></p>                                 
</section>
<?php } ?>
</body>
</html>
<link rel="stylesheet" href="../css/responsimple.css">     
<?php

  if(isset($_POST["Button"])){

    $Serie = $_POST["Dispositivo"];
    $barrio = $_POST["Barrio"];
    $longitud = $_POST["Longitud"];
    $latitud = $_POST["Latitud"];

    require_once ('conectar.php');
    $conexion = conectar();

    $actualizar = "UPDATE DISPOSITIVO SET BARRIO = '$barrio', LATITUD= $latitud, LONGITUD = $longitud  WHERE NUMSERIE= '$Serie'";

    if (mysqli_query($conexion, $actualizar)) {    
        echo '<script>alert("Dispositivo actualizado")</script> ';
        echo "<script>location.href='asig.php'</script>";   
    } else {
      echo "Error updating: " . mysqli_error($conexion);
    }
  
  mysqli_close($conexion);
  }
?>

