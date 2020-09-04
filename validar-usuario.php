<?php
//require 'conexion.php';
//error_reporting(0);
session_start();
//$_SESSION['clave'] = $clave;

$conexion=mysqli_connect("localhost","root","","sae");

$clave = $_POST['clave'];
$usuario = $_POST ['usuario'];

$_SESSION['usuario']=$usuario;
$_SESSION['clave'] = $clave;


//$materi = "quimica";

$consultaUsuario="SELECT * FROM alumno WHERE num_control='$usuario' AND password = '$clave'";


$resultadoUsuario=mysqli_query($conexion, $consultaUsuario);


$filasUsuario=mysqli_num_rows($resultadoUsuario);


if($filasUsuario>0){
	header("location:InterfaceUsuario.php");
}else{
	//header("location:index.php");
	//$noContra = "Eroor en la contraseña o usuario";
	echo"Error en la contraseña";
}

 ?>
