<?php 
session_start();
error_reporting(0);
$varsesionAsesorUsuario=$_SESSION['usuarioAsesor'];
$varsesionAsesorClave=$_SESSION['claveAsesor'];
if($varsesionAsesorUsuario == null || $varsesionAsesorUsuario = '' && $varsesionAsesorClave== null || $varsesionAsesorClave=''){
echo'Usted no tiene autorizacion';
die();
}
session_destroy();
header("Location:index.php");	

 ?>