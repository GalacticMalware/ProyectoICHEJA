<?php 

session_start();
error_reporting(0);

$varsesionAdminUsuario=$_SESSION['usuarioAdmin'];
$varsesionAdminClave=$_SESSION['claveAdmin'];
if($varsesionAdminUsuario == null || $varsesionAdminUsuario = '' && $varsesionAdminClave== null || $varsesionAdminClave=''){
echo'Usted no tiene autorizacion';
die();
}
session_destroy();
header("Location:index.php");

 ?>