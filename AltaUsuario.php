<?php 
require 'conexion.php';
//error_reporting(0);


$conexion=mysqli_connect("localhost","root","","sae");

$nombreAlum = $_POST['NombreAlumno'];
$apellidoAlum = $_POST['ApellidoAlumno'];
$numeroContol = $_POST['NCONTROLAlumno'];
$contrasena = $_POST['contrasena'];


$consulta="SELECT * FROM alumno WHERE Apellidos='$apellidoAlum' AND Nombres='$nombreAlum'";

$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas>0){
	echo "Los datos ya exixten";
}else{
//	header("location:index.php");
    $insertar="INSERT INTO alumno(Apellidos,Nombres,num_control,password) VALUES('$apellidoAlum','$nombreAlum','$numeroContol','$contrasena')";
    $concretar = mysqli_query($conexion,$insertar);

    if(!$concretar){
    	echo "No se pudo";
    }else{echo"los estan correctos";}
    
    
	//$noContra = "Eroor en la contraseña o usuario";
	
}
			/*include_once 'config.inc.php';
			$db=new Conect_MySql();
            $sql= "INSERT INTO apoyo_didac(Titulo,Descripcion,Tamanio,Tipo,Nombre_Archivo) VALUES('$titulo','$descri','$tamanio','$tipo','$nombre')";

            $query = $db->execute($sql);
            if($query){
                echo "Se guardo correctamente";
            }
*/


 ?>