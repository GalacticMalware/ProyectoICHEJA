<?php
//require 'conexion.php';
error_reporting(0);
session_start();
//$_SESSION['clave'] = $clave;

$conexion=mysqli_connect("localhost","root","","sae");

$clave = $_POST['clave'];
$usuario= $_POST['usuario'];

$_SESSION['clave'] = $clave;
$_SESSION['usuario'] = $usuario

//$ = "";

$consultaUsuario="SELECT * FROM alumno WHERE num_control AND password = '$clave'";
$consultaAdmin="SELECT * FROM administrador WHERE RFC='$usuario' Password='$clave'";

$resultadoUsuario=mysqli_query($conexion, $consultaUsuario);
$resultadoAdmin=mysqli_query($conexion, $consultaAdmin);

$filasUsuario=mysqli_num_rows($resultadoUsuario);
$filasAdmin=mysqli_num_rows($resultadoAdmin);

if($filasUsuario>0){
	header("location:InterfaceUsuario.php");
}if($filasAdmin>0){
	header("location:InterfaceAsesor.php");
}else{
	header("index.php");
	//echo"Error en la contraseña";
}

 ?>
