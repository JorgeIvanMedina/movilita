<?php
                                                   
session_start();

if ($_SESSION["activo"] != "SI" or $_SESSION['TIPO'] == 2 or $_SESSION['TIPO'] == 1)
    header('Location: ../index.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Movilita | Administracion de usuarios</title>
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
        <a href="#" class="nav-element selected">Administracion de usuarios</a>
      <?php }?>
      <a href="../about-us.html" class="nav-element">Acerca de nosotros</a>  
    </nav>   
  </header>
</div>
</header>
<main>
    <section class="login-form devices">      
        <h2 id="welcome">Registrate</h2>
        <h3>Ingresa tus datos</h3>
        <div>
          <form name="loginform" id="loginform" action="cruduser.php" method="POST">
            <p>
              Nombre<input type="text" name="nombre"  placeholder="Nombre" required/>
            </p>
            <p>
              Correo electronico<input type="email" name="email" placeholder="email@dominio.com" required/>
            </p>
            <p>
              Celular<input type="number" name="cell" placeholder="3201023948" required/>
            </p>
            <p>
              Usuario<input type="text" name="usuario" placeholder="Nombre de usuario" required/>
            </p>
            <p>
              Contrasena<input type="password" name="pass" id="pass" value="" size="20" placeholder="Contrasena"/>
            </p>                 
            <input type="submit" value="Guardar" name="btnSave">
            <input type="submit" value="Actualizar" name="btnActualizar">
            <input type="submit" value="Eliminar" name="btnEliminar">
            <input type="submit" name="registro" value="Registrar" />
          </form>
        </div>
    </section>
    <section>
        <form>
            
        </form>
    </section>

</main>
<?php if (@$_SESSION['activo']=="SI") { ?> 
<section class="user-name">
      <p><?php echo $_SESSION['NICK'];?></p>                                 
</section>
<?php } ?>
</body>
<script src="../js/app.js"></script>
</html>
<link rel="stylesheet" href="../css/responsimple.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<?php
if(isset($_POST['btnSave']))
{
        require_once ('conectar.php');
        $conexion = conectar();
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $cell = $_POST['cell'];
        $nickname = $_POST['usuario'];
        $pass = $_POST['pass'];
        $pass_cifrada = MD5($pass);
        $tipo=2;
        $sql="INSERT INTO USUARIO (NAME,E_MAIL,CELL_PHONE,NICKNAME, PASSWORD,TYPE) VALUES ('$nombre', '$email', '$cell','$nickname','$pass_cifrada','$tipo');";

        if (mysqli_query($conexion,$sql)) {
                                            echo "<br/>New record created successfully espacio ";
                                        } 
        else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
            }

        mysqli_close($conexion);
}



if(isset($_POST['btnConsultar']))
{
        require_once ('conectar.php');
        $conexion = conectar();
        $consulta = $_POST['consultaUser'];
        $pass = $_POST['pass'];
        $pass_cifrada = MD5($pass);
        $sql= "SELECT * FROM USUARIO WHERE NICKNAME = '$consulta';";
        if ($result = mysqli_query($conexion,$sql)) {              
            while($consulta = mysqli_fetch_array($result))
            {                 
              if($pass_cifrada == $consulta['PASSWORD']){
                if($consulta['ESTADO']=="0"){
                    $e = "Deshabilitado";
                }
                else{
                    $e = "Habilitado";
                }
                echo"
                <div class=\"contenedor\"> 
                    <div class=\"row\"> 
                        <div class=\"col-xs-1 col-sm-3 col-md-4\"></div>
                        <div class=\"col-xs-10 col-sm-6 col-md-4\">
                            <table class=\"table table-hover\" width = \"100%\" >
                                <thead>
                                    <tr>    
                                        <td><b><center>Nombre</center></b></td>
                                        <td><b><center>Email</center></b></td>
                                        <td><b><center>Cell-Phone</center></b></td>
                                        <td><b><center>Nickname</center></b></td>
                                        <!-- <td><b><center>Password</center></b></td> -->
                                        <td><b><center>Estado</center></b></td>
                                        <td><b><center>Fecha</center></b></td>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>    
                                        <td><center>".$consulta['NAME']."</center></td>
                                        <td><center>".$consulta['E_MAIL']."</center></td>
                                        <td><center>".$consulta['CELL_PHONE']."</center></td>
                                        <td><center>".$consulta['NICKMANE']."</center></td>
                                        <!-- <td><center>".$consulta['PASSWORD']."</center></td> -->
                                        <td><center>".$e."</center></td>    
                                        <td><center>".$consulta['FECHA_REGISTRO']."</center></td>                       
                                    </tr>
                                </tbody>
                            </table>    
                                      
                        </div>
                    </div>
                
                </div>     
                ";  
              } 
            //-------------
            }
            
        }    
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
        } 
        mysqli_close($conexion);      
}


if(isset($_POST['btnActualizar']))
{
        require_once ('conectar.php');
        $conexion = conectar();
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $cell = $_POST['cell'];
        $nickname = $_POST['usuario'];
        $pass = $_POST['pass'];
        $sql="UPDATE Usuario SET Name= '$nombre', E_mail='$email', Cell_phone= '$cell', Password='$pass' WHERE Nickmane = '$nickname';";
        if (mysqli_query($conexion,$sql)) {
                                            echo "<br/>New record created successfully";
                                        } 
        else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
            }

        mysqli_close($conexion);
}

    

if(isset($_POST['btnEliminar']))
{
        require_once ('conectar.php');
        $conexion = conectar();
        $nickname = $_POST['usuario'];
        $sql1= "SELECT Estado FROM Usuario WHERE Nickmane = '$nickname';";
        $result = mysqli_query($conexion,$sql1);
        $consulta = mysqli_fetch_array($result);
        $n = $consulta['Estado'];
        if($n == "0"){ 
        $sql="UPDATE Usuario SET Estado= 1 WHERE Nickmane = '$nickname';";
        if (mysqli_query($conexion,$sql)) {
                                            echo "<br/>New record created successfully";
                                        } 
        else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
            }

       }


       else{
        $sql="UPDATE Usuario SET Estado= 0 WHERE Nickmane = '$nickname';";
        if (mysqli_query($conexion,$sql)) {
                                            echo "<br/>New record created successfully";
                                        } 
        else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
            }
       }

         mysqli_close($conexion);
            

       
}


?>


