<?php
require 'conexion.php';
session_start();
error_reporting(0);
$varsesionUsuario=$_SESSION['usuario'];
$varsesionClave=$_SESSION['clave'];
if($varsesionUsuario == null || $varsesionUsuario = '' && $varsesionClave== null || $varsesion=''){
echo'Usted no tiene autorizacion';
die();
}
  ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Bienvenido al sistema
	</title>

	<link rel="stylesheet" href="CSS/Estilo2.css">
	<link rel="stylesheet" href="CSS/flexslider.css" type="text/css">
	<link rel="stylesheet" href="CSS/estilos_tabla.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="IMG/propuesta-interes-01.jpg">

	<script src="JS/jquery.flexslider.js"></script>
	<script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider({
    	touch: true,
    	pauseOnAction: false,
    	pauseOnHover: false,
    });
  });
</script>

<style type="text/css">
		#pdf{
			display: none;
		}
</style>

<script type="text/javascript">
		function mostrarPDF() {
			document.getElementById('pdf').style.display = 'block';
		}
		function ocultarPDF() {
			document.getElementById('pdf').style.display = 'none';
		}
	</script>


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
			<img src="IMG/logo1.png" alt="" title="Chiapas nos uno" width=14% align=BOTTOM>
		</div>	
		<br>
		<br>
		<hr width="1010px" size="0px" >
	</header>
	</body>

	<a style="margin-left: 1100px;" href="CerrarSesion.php">No olvides cerrar session</a>	

	<body>
		<div class="flexslider">
		<ul class="slides">
			<li>
				<img src="prueba/1.png" alt="">
				<section class="flex-caption">
					<p></p>
				</section>
			</li>
			<li>
				<img src="prueba/2.png" alt="">
				<section class="flex-caption">
					<p></p>
				</section>
			</li>
			<li>

				<body>
					<a href="" class="boton">
						<span class="icono"></span>
					</a>
				</body>

				<img src="prueba/3.png" alt="">
				<section class="flex-caption">
					<p></p>
				</section>
			</li>
		</ul>
</div> 
</body>


<body style="margin:auto;">
	<input type="submit" value="" class="pdf" onclick="mostrarPDF();" style="margin-left: 450px; height: 150px; width: 150px; font-size: 10px; background-image: url(img/pdf.png); background-size: 100% 100%; float: left;">
	

<form action="interfaceChat.php">
<input type="submit" value="" class="chat" style="margin-left: 950px; height: 150px; width: 150px; font-size: 10px; background-image: url(img/negocios.png); background-size: 100%; margin-top:30px;">
</form>
<p style="margin-left: 440px; font-size: 20px; margin-top: 0px;">
Mostrar archivos pdf </p>
<p style="margin-left: 920px; font-size: 20px; margin-top: -40px; ">Convbersar con un asesor</p>


<div id="pdf">
 <table class="tabla" style="margin: auto;">
            <tr >
                <td>Titulo  </td>
                <td>Descripcion  </td>
                <td>Tamaño archivo   </td>
                <td>Tipo  </td>
                <td>Nombre  </td>
            </tr>
<?php
      include 'config.inc.php';
        $db=new Conect_MySql();
            $sql = "select*from apoyo_didac ";
            $query = $db->execute($sql);
            while($datos=$db->fetch_row($query)){?>
            <tr>
                <td><?php echo $datos['Titulo']; ?></td>
                <td><?php echo $datos['Descripcion']; ?></td>
                <td><?php echo $datos['Tamanio']; ?></td>
                <td><?php echo $datos['Tipo']; ?></td>
                <td><a href="archivo.php?id=<?php echo $datos['id_arch']?>"><?php echo $datos['Nombre_Archivo']; ?></a></td>
            </tr>
          <?php  } ?>
        </table>
        <br>
<a style="margin:auto; margin-left: 700px;" href="javascript:void(0);"  onclick="ocultarPDF();">Limpiar la pantalla</a>
	</div>







 
	<footer  class="abajo">
	<p>Links</p>
</footer>
</body>

</html>