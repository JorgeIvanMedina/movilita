<?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
	require 'PHPMailerAutoload.php';
	function sendemail($to, $from, $fromName, $body) {
		$mail = new PHPMailer();
		$mail->setFrom($from, $fromName);
		$mail->addAddress($to);
		$mail->Subject = 'Contacto formato web';
		$mail->Body = $body;	
		return $mail->send();	
	}

	$name = $_POST['nombre'];
	$email = $_POST['email'];
	$cell = $_POST['cell'];
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	$body="Nombre: ".$name." - E-mail: ". $email." - Celular: ".$cell." - Usuario: ".$usuario." - Contrasena: ".$password;
	if(sendemail('andresforonda@doitdev.co', $email, $name, $body))
		$msg='Mensaje enviado!';
		else
		$msg='Error al enviar el mensaje.';
	echo '<script>alert("Gracias por contactarnos, pronto le responderemos.")</script> ';
	echo "<script>location.href='http://www.doitdev.co/projects/movilita/'</script>"; 
}
