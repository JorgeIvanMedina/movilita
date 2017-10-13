<!DOCTYPE html>
<html>
<head>
  <title>Movilita</title>
  <meta name="viewport" content="width=device-width; initial-scale=1, minimum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta charset="UTF-8">
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
<head>
<script type="text/javascript">
    function hacer_click(){

        //alert("Me haz dado click");
        window.location="../index.php";
    }
</script>
<body>
<script src="../js/bootstrap.min.js" charset="utf-8" async defer></script>    
</body>
</html>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/responsimple.min - copia.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<?php
session_start();
?>

<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>

<?php
$con = conectar();
if(isset($_SESSION["session_username"])){
// echo "Session is set"; // for testing purposes
header("Location: intropage.php");
}

if(isset($_POST["login"])){

if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];

    $query =mysqli_query($con,"SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");

    $numrows=mysqli_num_rows($query);
    if($numrows!=0)

    {
    while($row=mysqli_fetch_assoc($query))
    {
    $dbusername=$row['username'];
    $dbpassword=$row['password'];
    }

    if($username == $dbusername && $password == $dbpassword)

    {

        header("Location: menu.html");

    }
    } else {

 $message =  "Nombre de usuario ó contraseña invalida!";
    }

} else {
    $message = "Todos los campos son requeridos!";
}
}
?>




    <div class="container" style="width:90%; text-align: center; margin-top: 100px">
        <form name="loginform" id="loginform" action="" method="POST">
        <p>
            <label for="user_login">Nombre De Usuario<br />
            <input type="text" name="username" id="username" class="input" value="" size="20" /></label>
        </p>
        <p>
            <label for="user_pass">Contraseña<br />
            <input type="password" name="password" id="password" class="input" value="" size="20" /></label>
        </p>
            <p class="submit">
            <input type="submit" name="login" class="button" value="Entrar" />
        </p>
        </form>
    </div>
	

	
	<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
	