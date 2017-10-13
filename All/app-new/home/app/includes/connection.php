
<?php
/*require("constants.php");

$con = mysqli_connect(DB_SERVER,DB_USER, DB_PASS) or die(mysql_error());
	mysqli_select_db(DB_NAME) or die("Cannot select DB");*/
	
	?>

<?php
/**
 * Created by PhpStorm.
 * User: AndresF
 * Date: 22/02/2017
 * Time: 12:55
 */
require("constants.php");
function conectar() {
    $con = new mysqli(DB_SERVER,DB_USER, DB_PASS,DB_NAME);
    if (mysqli_connect_errno($con)) {
        echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
    }
    $con->character_set_name();
    if (!$con->set_charset('utf8')) {
        echo nl2br("\nError cargando el conjunto de caracteres utf8: %s\n", $con->error);
        exit;
    }
    return $con;
}
?>