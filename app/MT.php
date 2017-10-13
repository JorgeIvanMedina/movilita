<?php
                                                   
session_start();

if ($_SESSION["activo"] != "SI" or $_SESSION['TIPO'] == 2)
    header('Location: ../index.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Movilita | Medios de transporte</title>
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
        <a href="asig.php" class="nav-element">Asignar dispositivo IoT</a>
        <a href="#" class="nav-element selected">Medios de transporte</a>
      <?php }?>
      <?php if (@$_SESSION['TIPO'] == 3) { ?>
        <a href="cruduser.php" class="nav-element">Administracion de usuarios</a>
      <?php }?>
      <a href="../about-us.html" class="nav-element">Acerca de nosotros</a>  
    </nav>   
  </header>
  <main>
    <div class="login-form transport">      
      <h2 id="welcome">Administracion medios de transporte</h2>
      <div>
        <form name="loginform" id="loginform" action="MT.php" method="POST">
            <p>Tipo de Transporte</p>
            <select name="selecTipo" class="" placeholder="seleccione">
                <option value="select"></option>
                <option value="Bus">Bus</option>
                <option value="Taxi">Taxi</option>
                <option value="Moto">Moto</option>
                <option value="Bicicleta">Bicicleta</option>
                <option value="Caminar">Caminar</option>
            </select>
            <p>
                Actualizar costo<input type="Number" name="cost" placeholder="Precio pasaje o recorrido"/>
            </p>
            <p class="submit">
                <input type="submit" value="Consultar" name="Consultar" />
                <input type="submit" value="Actualizar" name="Actualizar" />
            </p>
        </form>
      </div>
    </div>
  </main>
<?php if (@$_SESSION['activo']=="SI") { ?> 
<section class="user-name">
      <p><?php echo $_SESSION['NICK'];?></p>                                 
</section>
<?php } ?>
<script src="../js/app.js"></script>
</body>
</html>
<link rel="stylesheet" href="../css/responsimple.css">    
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

<?php

if(isset($_POST['Consultar']))
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


if(isset($_POST['Actualizar']))
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

