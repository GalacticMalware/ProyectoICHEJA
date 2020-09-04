<?php 

session_start();
error_reporting(0);

$varsesionUsuario=$_SESSION['usuario'];
$varsesionClave=$_SESSION['clave'];
if($varsesionUsuario == null || $varsesionUsuario = '' && $varsesionClave== null || $varsesion=''){
echo'Usted no tiene autorizacion';
die();
}
session_destroy();
header("Location:index.php");


 ?>