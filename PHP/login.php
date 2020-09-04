<?php
require 'cone.php'
$usuario=$mysqli->query("SELECT Nombre,	Tipo_usuario FROM usuarios WHERE Usuario = '".$_POST['USUARIO']."'AND Password ='" $_POST['CONTRASEÑA']"'");
if ($usuarios->num_rows ==1):
	$datos = $usuarios->fetch_assoc();
	echo json_encode(array('error' => false, 'tipo' => $datos));
else:
	echo json_encode(array('error' = > true));
endif;

$mysqli->close();
?>