<?php
                                                   
session_start();

if (@$_SESSION["activo"] == "SI")
    header('Location: ../index.php');
?>


<!DOCTYPE html>
<html>
<head>
  <title>Movilita | Iniciar sesion</title>
  <meta name="viewport" content="width=device-width; initial-scale=1, minimum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta charset="UTF-8">
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
      <a href="../index.php" class="nav-element">Inicio</a>
      <a href="login.php" class="nav-element selected">Iniciar sesion</a>
      <a href="registro.php" class="nav-element">Registrate</a>
      <a href="about-us.html" class="nav-element">Acerca de nosotros</a>  
    </nav>   
  </header>
  <main>
    <div class="login-form">      
        <h2 id="welcome">Bienvenido<h2>
        <h3>Ingresa tus datos</h3>
        <div>
          <form name="loginform" id="loginform" action="sesion.php" method="POST">
            <p>
              Nombre de usuario<input type="text" name="username" id="username" value="" size="20" placeholder="Usuario" required />
            </p>
            <p>
              Contrasena<input type="password" name="password" id="password" value="" size="20" placeholder="Contrasena" required />
            </p>
              <input type="submit" name="login" class="button" value="Entrar" />
          </form>
        </div>
    </div>
  </main>
<script src="../js/app.js"></script>
</body>
</html>
<link rel="stylesheet" href="../css/responsimple.css">    

	