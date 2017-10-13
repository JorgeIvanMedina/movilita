<?php                                   
session_start();
if (@$_SESSION["activo"] == "SI")
    header('Location: ../index.php');
?>
<!DOCTYPE html>
<html>
    <head>
      <title>Movilita | Registrate</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
      <meta charset="UTF-8">
      <link rel="icon" type="img/logo.png" sizes="" href="../img/logo.png">
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
      <?php if (@$_SESSION['activo']!="SI") { ?> 
        <a href="login.php" class="nav-element">Inicia sesion</a>
        <a href="registro.php" class="nav-element selected">Registrate</a>
      <?php } ?>
      <?php if (@$_SESSION['activo']=="SI") { ?> 
        <a href="cerrar_sesion.php" class="nav-element">Cerrar sesion</a>
        <a href="register.php" class="nav-element">Generacion de reportes</a>
      <?php }?>  
      <?php if (@$_SESSION['TIPO'] == 1 or @$_SESSION['TIPO'] == 3 ) { ?>
        <a href="asig.php" class="nav-element">Asignar dispositivo IoT</a>
        <a href="MT.php" class="nav-element">Medios de transporte</a>
      <?php }?>
      <?php if (@$_SESSION['TIPO'] == 3) { ?>
        <a href="cruduser.php" class="nav-element">Administracion de usuarios</a>
      <?php }?>
      <a href="../about-us.html" class="nav-element">Acerca de nosotros</a>  
    </nav>   
  </header>

</div>
</header>
<main>
    <div class="login-form devices">      
        <h2 id="welcome">Registrate<h2>
        <h3>Ingresa tus datos</h3>
        <div>
          <form name="loginform" id="loginform" action="phpmailer/send.php" method="POST">
            <p>
              Nombre<input type="text" name="nombre"  placeholder="Nombre" required/>
            </p>
            <p>
              Correo electronico<input type="email" name="email" placeholder="email@dominio.com" required/>
            </p>
            <p>
              Celular<input type="number" name="cell" placeholder="3201023948" size="10" required/>
            </p>
            <p>
              Usuario<input type="text" name="usuario" placeholder="Nombre de usuario" required/>
            </p>
            <p>
              Contrasena<input type="password" name="password" id="password" value="" size="20" placeholder="Contrasena"/>
            </p>
              <input type="submit" name="registro" class="button" value="Enviar" />
          </form>
        </div>
    </div>
</main>
</body>
<script src="../js/app.js"></script>
</html>
<link rel="stylesheet" href="../css/responsimple.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
