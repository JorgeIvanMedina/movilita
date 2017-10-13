<?php
                                                   
session_start();

if ($_SESSION["activo"] != "SI")
    header('Location: ../index.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Movilita | Reportes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta charset="UTF-8">
  <link rel="icon" type="../img/logo.png" sizes="" href="img/logo.png">
</head>
<body>
  <header id="header" class="header">
    <div class="contenedor">
      <div class="logo-top">
        <a href="#"><img src="../img/logo.png" alt="logo-top"/>
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

      <?php if (@$_SESSION['activo']!="SI") { ?> 
        <a href="login.php" class="nav-element">Inicia sesión</a>
        <a href="registro.php" class="nav-element">Registrate</a>
      <?php } ?>
      <?php if (@$_SESSION['activo']=="SI") { ?> 
        <a href="cerrar_sesion.php" class="nav-element">Cerrar sesión</a>
        <a href="#" class="nav-element">Generación de reportes</a>
      <?php }?>  
      <?php if (@$_SESSION['TIPO'] == 1 or @$_SESSION['TIPO'] == 3 ) { ?>
        <a href="asig.php" class="nav-element">Asignar dispositivo IoT</a>
        <a href="MT.php" class="nav-element">Medios de transporte</a>
      <?php }?>
      <?php if (@$_SESSION['TIPO'] == 3) { ?>
        <a href="cruduser.php" class="nav-element">Administración de usuarios</a>
      <?php }?>
      <!--<a href="about-us.html" class="nav-element">Acerca de nosotros</a>  -->
    </nav>   
  </header>
<main>
<div class="login-form">      
        <h2 id="welcome">Menu de reportes</h2>
            <a class="list-item" href= "informes/reporteT.php">Reporte de Temperatura</a>
            <a class="list-item" href= "informes/reporteH.php">Reporte de Humedad</a>
            <a class="list-item" href= "informes/reporteR.php">Reporte de Registros</a>         
        
    </div>
</main>
<script src="../js/app.js"></script>
</body>
</html>
<link rel="stylesheet" href="../css/responsimple.css">

