<?php
require 'conexion.php';
error_reporting(0);
session_start();
$varsesionAsesorUsuario=$_SESSION['usuarioAsesor'];
$varsesionAsesorClave=$_SESSION['claveAsesor'];
if($varsesionAsesorUsuario == null || $varsesionAsesorUsuario = '' && $varsesionAsesorClave== null || $varsesionAsesorClave=''){
echo'Usted no tiene autorizacion';
die();
}


include_once 'config.inc.php';
if (isset($_POST['subir'])) {
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "archivos/" . $nombre;
    if ($nombre != "") {
        if (copy($ruta, $destino)) {
            $titulo= $_POST['titulo'];
            $descri= $_POST['descripcion'];
            $db=new Conect_MySql();

            $sql= "INSERT INTO apoyo_didac(Titulo,Descripcion,Tamanio,Tipo,Nombre_Archivo) VALUES('$titulo','$descri','$tamanio','$tipo','$nombre')";

            $query = $db->execute($sql);
            if($query){
                echo "Se guardo correctamente";
            }
        } else {
            echo "Error";
        }
    }
}


 include_once 'config.inc.php';
 if (isset($_POST['eliminar'])) {
                $db2=new Conect_MySql();
                $idArchivo= $_POST['id_arch'];
            $sql2= "DELETE FROM apoyo_didac WHERE id_arch='$idArchivo'";
            $query = $db2->execute($sql2);
            if($query){
                echo "Se elimino correctamente";
}
}
 

  ?>


<!DOCTYPE html>
<html>
<head>
	<title>
		Bienvenido al sistema
	</title>
	<link rel="stylesheet" href="CSS/Asesor.css">
	<link rel="stylesheet" href="CSS/estilos_tabla.css">
    <link rel="shortcut icon" type="image/x-icon" href="IMG/propuesta-interes-01.jpg">
</head>
<body>
	<header>
		<div>	
	<div id="logos">
		<div class="Span4 logo1">
			<img src="IMG/logo.png" alt="" title="Estado de Chiapas" width=14% align=BOTTOM>	
		</div>	
		<DIV class="Span4 logo2">
			<img src="IMG/SAE.png" alt="" title="SAE" width=9% align=BOTTOM>
		</DIV>
		<div class="Span4 logo3">
			<img src="IMG/logo1.png" alt="" title="Chiapas nos une" width=14% align=BOTTOM>
		</div>	
		<br>
		<br>
		<hr width="1010px" size="0px" >
        <a style="margin-left: 1100px;" href="CerrarSesion-asesor.php">No olvides cerrar session</a>
	</header>
	</body>

	
	<a href="Configuraciones.php"><input type="submit"  value="Configuraciones" name="Configuraciones" style="margin:auto; margin-left:420px; size: 10px; height: 150px; width: 150px; background:linear-gradient(#FFDA63, #FFB940); border-radius:10px; cursor: pointer;  float: left;" >
		</a>

        <form action="interfaceChat.php">
<input type="submit" value="" class="chat" style="margin-left: 950px; height: 150px; width: 150px; font-size: 10px; background-image: url(img/negocios.png); background-size: 100%; margin-top:-30px;">
</form>


	
		<p style="size: 50px margin-left:720px;">
				
			</p>

 <div style="width: 500px;margin: auto;border: 1px solid blue;padding: 30px;">
            <h4>Subir PDF</h4>
            <form method="post" action="" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label>Nombre</label></td>
                        <td><input type="text" name="titulo" required style="width: 250px;"></td>
                    </tr>
                    <tr>
                        <td><label>Descripcion</label></td>
                        <td><textarea name="descripcion" style="width: 250px;" required></textarea></td>
                    </tr>
                        <td><input type="submit" value="subir" name="subir"></td>
                        <td colspan="2"><input type="file" name="archivo"></td>

                        
                </table>
            </form>
        </div>

  <table class="tabla"  style="margin: auto;">
            <tr >
                <td>Titulo  </td>
                <td>Descripcion  </td>
                <td>Tipo  </td>
                <td>Nombre  </td>
            </tr>
        <?php
     //  include 'config.inc.php';
        $db=new Conect_MySql();
            $sql = "select*from apoyo_didac";
            $query = $db->execute($sql);
            while($datos=$db->fetch_row($query)){?>
            <tr>
                <td><?php echo $datos['Titulo']; ?></td>
                <td><?php echo $datos['Descripcion']; ?></td>

                <td><?php echo $datos['Tipo']; ?></td>
                <td><a href="archivo.php?id=<?php echo $datos['id_arch']?>"><?php echo $datos['Nombre_Archivo']; ?>

                <td> <?php  ?>    ></td>





                     

            </tr>

          <?php  } ?>

        </table>

		
</div> 
</body>
</html>