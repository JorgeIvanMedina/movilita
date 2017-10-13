
<?php


session_start();
if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username=$_POST['username'];
    $pass=$_POST['password'];
    $password=MD5($pass);


require_once ('conectar.php');
 $conexion = conectar();

$query =mysqli_query($conexion,"SELECT * FROM USUARIO WHERE NICKNAME='".$username."' AND PASSWORD='".$password."'");

 $numrows=mysqli_fetch_array($query,MYSQLI_ASSOC);

if($numrows != 0){

  
  $_SESSION['TIPO']= $numrows['TYPE'];
  $_SESSION['USER']=$numrows['NAME'];
  $_SESSION['HABILITADO']=$numrows['ESTADO'];
  $_SESSION['NICK']=$numrows['NICKNAME'];

  if($numrows['ESTADO']==1){

  	    	$_SESSION['activo']= "SI";

  			header("Location: ../index.php");
    		


  }
  
  else{
    echo '<script>alert("Cuenta desabilitada temporalmente, contacte con el administrador del sistema.")</script> ';
    echo "<script>location.href='http://localhost/doitdev/movilita/app/login.php'</script>"; 

  }

   


}
else{
  echo '<script>alert("Nombre de usuario ó contraseña invalida!.")</script> ';
  echo "<script>location.href='http://localhost/doitdev/movilita/app/login.php'</script>";     
}
}
else{
	header("Location: login.php");
}

?>