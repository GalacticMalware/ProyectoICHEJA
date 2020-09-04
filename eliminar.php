<?php
require 'conexion.php';
//error_reporting(0);
session_start();
$varsesionAdminUsuario=$_SESSION['usuario'];
$varsesionAdminClave=$_SESSION['clave'];
if($varsesionAdminUsuario == null || $varsesionAdminUsuario = '' && $varsesionAdminClave== null || $varsesionAdminClave=''){
echo'Usted no tiene autorizacion';
die();
}

 include_once 'config.inc.php';
 if (isset($_POST['eliminar'])) {
                $db2=new Conect_MySql();
                $idArchivo= $_POST['id_arch'];
            $sql2= "DELETE FROM apoyo_didac WHERE id_arch='$datos'";
            $query = $db2->execute($sql2);
            if($query){
                echo "Se elimino correctamente";
                header("location:InterfaceAsespor.php")
}
}
 

  ?>
