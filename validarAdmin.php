<?php
include 'Incriptacion.php';
//require 'conexion.php';
error_reporting(0);
session_start();
//$_SESSION['clave'] = $clave;

$conexion=mysqli_connect("localhost","root","","sae");
//$clave=SED::decryption($clave);
$claveAdmin = $_POST['claveAdmin'];
$usuarioAdmin = $_POST ['usuarioAdmin'];

$_SESSION['usuarioAdmin']=$usuarioAdmin;
$_SESSION['claveAdmin'] = $claveAdmin;


//$materi = "quimica";
$claveAdmin=SED::encryption($claveAdmin);

$consultaAdmin="SELECT * FROM administrador WHERE RFC='$usuarioAdmin' AND Password = '$claveAdmin'";

$resultadoAdmin=mysqli_query($conexion, $consultaAdmin);

$filasAdmin=mysqli_num_rows($resultadoAdmin);

if($filasAdmin){
	header("location:administrador.php");
}else{
	//header("location:index.php");
	//$noContra = "Eroor en la contraseña o usuario";
	//echo $clave;
	echo"Error en la contraseña";

}

 ?>
