<?php
include 'Incriptacion.php';
//require 'conexion.php';
error_reporting(0);
session_start();
//$_SESSION['clave'] = $clave;

$conexion=mysqli_connect("localhost","root","","sae");

$clave = $_POST['clave'];
$usuario = $_POST ['usuario'];

$_SESSION['usuario']=$usuario;
$_SESSION['clave'] = $clave;


//$materi = "quimica";
//$clave=SED::encryption($clave);

$consultaUsuario="SELECT * FROM alumno WHERE num_control='$usuario' AND password = '$clave'";
//$consultaAsesor="SELECT * FROM asesor WHERE RFC='$usuario' AND password = '$clave'";
//$consultaAdmin="SELECT * FROM administrador WHERE RFC='$usuario' AND Password = '$clave'";

$resultadoUsuario=mysqli_query($conexion, $consultaUsuario);
//$resultadoAsesor=mysqli_query($conexion, $consultaAsesor);
//$resultadoAdmin=mysqli_query($conexion, $consultaAdmin);

$filasUsuario=mysqli_num_rows($resultadoUsuario);
//$filasAsesor=mysqli_num_rows($resultadoAsesor);
//$filasAdmin=mysqli_num_rows($resultadoAdmin);

if($filasUsuario>0){
	header("location:InterfaceUsuario.php");
}//if($filasAsesor>0){
//	header("location:InterfaceAsesor.php");
//}if($filasAdmin){
//	header("location:administrador.php");
//}
else{
	//header("location:validarAdmin.php");
	//$noContra = "Eroor en la contraseña o usuario";
	//$clave=SED::decryption($clave);
	//echo $clave;
	echo"Error en la contraseña";

}

 ?>
