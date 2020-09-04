<?php
//require 'conexion.php';
//error_reporting(0);
session_start();
//$_SESSION['clave'] = $clave;

$conexion=mysqli_connect("localhost","root","","sae");

$claveAsesor = $_POST['claveAsesor'];
$usuarioAsesor = $_POST ['usuarioAsesor'];

$_SESSION['usuarioAsesor']=$usuarioAsesor;
$_SESSION['claveAsesor'] = $claveAsesor;


//$materi = "quimica";
//$claveAsesor=SED::encryption($claveAsesor);


$consultaAsesor="SELECT * FROM asesor WHERE RFC='$usuarioAsesor' AND password = '$claveAsesor'";


$resultadoAsesor=mysqli_query($conexion, $consultaAsesor);


$filasAsesor=mysqli_num_rows($resultadoAsesor);

if($filasAsesor>0){
	header("location:InterfaceAsesor.php");
}else{
	//header("location:index.php");
	//$noContra = "Eroor en la contraseña o usuario";
	echo"Error en la contraseña";
}

 ?>
