<?php
//require 'conexion.php';
error_reporting(0);
session_start();
//$_SESSION['clave'] = $clave;

$conexion=mysqli_connect("localhost","root","","sae");

$claveAsesor = $_POST['claveAsesor'];
$usuarioAsesor= $_POST['usuarioAsesor'];

$_SESSION['claveAsesor'] = $claveAsesor;
$_SESSION['usuarioAsesor'] = $usuarioAsesor;

//$ = "";
$claveAsesor=SED::encryption($claveAsesor);


$consultaAdmin="SELECT * FROM administrador WHERE RFC='$usuarioAsesor' Password='$claveAsesor'";


$resultadoAdmin=mysqli_query($conexion, $consultaAdmin);


$filasAdmin=mysqli_num_rows($resultadoAdmin);

if($filasAdmin>0){
	header("location:InterfaceAsesor.php");
}else{
	header("indexasesor.php");
	//echo"Error en la contraseña";
}

 ?>
