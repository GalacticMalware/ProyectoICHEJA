<?php
include 'Incriptacion.php';
//require 'conexion.php';
error_reporting(0);
session_start();
//$_SESSION['clave'] = $clave;

$conexion=mysqli_connect("localhost","root","","sae");
//$clave=SED::decryption($clave);
$claveAsesor = $_POST['claveAsesor'];
$usuarioAsesor = $_POST ['usuarioAsesor'];

$_SESSION['usuarioAsesor']=$usuarioAsesor;
$_SESSION['claveAsesor'] = $claveAsesor;


//$materi = "quimica";
//$claveAdmin=SED::encryption($claveAdmin);

$consultaAsesor="SELECT * FROM asesor WHERE RFC='$usuarioAsesor' AND password = '$claveAsesor'";

$resultadoAsesor=mysqli_query($conexion, $consultaAsesor);

$filasAsesor=mysqli_num_rows($resultadoAsesor);

if($filasAsesor){
	header("location:InterfaceAsesor.php");
}else{
	//header("location:index.php");
	//$noContra = "Eroor en la contraseña o usuario";
	//echo $clave;
	echo"Error en la contraseña";

}

 ?>
