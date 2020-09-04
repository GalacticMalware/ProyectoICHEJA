<?php
require 'conexion.php';
error_reporting(0);
session_start();
$varsesionAdminUsuario=$_SESSION['usuarioAdmin'];
$varsesionAdminClave=$_SESSION['claveAdmin'];
if($varsesionAdminUsuario == null || $varsesionAdminUsuario = '' && $varsesionAdminClave== null || $varsesionAdminClave=''){
echo'Usted no tiene autorizacion';
die();
}




include_once 'config.inc.php';
if (isset($_POST['subir'])) {
          $nombreAsesor = $_POST['nombreAsesor'];
		  $apellidoAsesor = $_POST['apellidoAsesor'];
		  $numeroRFC = $_POST['RFC'];
		  $contrasena = $_POST['contrasena'];
			include 'Incriptacion.php';	
		  $contrasena=SED::encryption($contrasena);
		 // $numeroContol = SED::encryption($numeroContol); 
            $db=new Conect_MySql();
            $sql= "INSERT INTO asesor(Apellidos,Nombres,RFC,password) VALUES('$apellidoAsesor','$nombreAsesor','$numeroRFC','$contrasena')";

            $query = $db->execute($sql);
            if($query){
                echo "Se guardo correctamente";
            }
         else {
            echo "Error";
        }
    
}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>
 		Configuraciones
 	</title>
 </head>
 <body>
 	<meta charset="utf-8">
	<meta name="viewport" content="width=divice-width, initial-scale=1, maximus-scale=1">
 	<link rel="stylesheet" href="CSS/Asesor.css">
 	<link rel="stylesheet" href="CSS/Estilo.css">
 		<link rel="stylesheet" href="CSS/estilos_tabla.css">
 		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
 		<script src="js/maxLength.js"></script>
 	<script type="js/principal.js"></script>
  	<script src="js/jquery-3.3.1.min.js"></script>
  	<script src="js/main.js"></script>
  	<link rel="shortcut icon" type="image/x-icon" href="IMG/propuesta-interes-01.jpg">
</head>
<body>

<script>
	function solonumeros(e){
		key=e.keyCode || e.which;
		teclado=String.fromCharCode(key);
		numero="0123456789";
		especiales="8-37-38-46";
		teclado_especial=false;

		for(var i in especiales){
			if(key==especiales[i]){
				teclado_especial=true;
			}
		}
		if(numero.indexOf(teclado)==-1 && !teclado_especial){
			return false;
		}
	}
</script>


<script>
	function sololetras(e){
		key=e.keyCode || e.which;
		teclado=String.fromCharCode(key);
		numero="abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ ";
		especiales="8-37-38-46";
		teclado_especial=false;

		for(var i in especiales){
			if(key==especiales[i]){
				teclado_especial=true;
			}
		}
		if(numero.indexOf(teclado)==-1 && !teclado_especial){
			return false;
		}
	}
</script>


<script>
	function soloRFC(e){
		key=e.keyCode || e.which;
		teclado=String.fromCharCode(key);
		numero="0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ ";
		especiales="8-37-38-46";
		teclado_especial=false;

		for(var i in especiales){
			if(key==especiales[i]){
				teclado_especial=true;
			}
		}
		if(numero.indexOf(teclado)==-1 && !teclado_especial){
			return false;
		}
	}
</script>


	<style type="text/css">
		#lista{
			display: none;
		}
</style>

<script type="text/javascript">
		function mostrarLISTA() {
			document.getElementById('lista').style.display = 'block';
		}
		function ocultarLISTA() {
			document.getElementById('lista').style.display = 'none';
		}
	</script>


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
		<a style="margin-left: 1100px;" href="CerrarSesionAdmin.php">No olvides cerrar session</a>
		<br>
		<br>
	</header>
	</body>


<div style="margin:auto; height: 380px; width: 1010px; margin-left: 270px; background:#DEDEDE;">
	<p style="font-size: 35px; font-family:ARIAL;  margin: auto; margin-left: 220px; margin-bottom:40px; padding-top: 25px; opacity: 0.5;">DAR DE ALTA A UN NUEVO ASESOR</p>
<form method="post" action="" enctype="multipart/form-data">
	<P style=" font-size: 20px; font-family:ARIAL;  margin: auto; margin-left: 100px; margin-top:20px; float: left;">Nombre</P>
	<input maxlength="35" minlength="3" onkeypress="return sololetras(event);" type="text" name="nombreAsesor"  style="margin-top: 20px; width: 250px; height: 20px; font-family: courier; font-size: 20px; float: left;" required ">

	<P style=" font-size: 20px; font-family:ARIAL;  margin: auto; margin-left: 150px; margin-top:20px; float: left;">Apellidos</P>

		<input maxlength="35" minlength="5" onkeypress="return sololetras(event);" type="text" name="apellidoAsesor" required style="margin-top: 20px; width: 250px; height: 20px; font-family: courier; font-size: 20px; ">

			<P style=" font-size: 20px; font-family:ARIAL;  margin: auto; margin-left: 130px; margin-top:35px; float: left;">RFC</P>

	<input maxlength="12" minlength="8" onkeypress="return soloRFC(event);" type="text" name="RFC" required style="margin-top: 35px; width: 250px; height: 20px; font-family: courier; font-size: 20px; float: left;">

	<P style=" font-size: 20px; font-family:ARIAL;  margin: auto; margin-left: 130px; margin-top:35px; float: left;">Contraseña</P>

		<input maxlength="10" minlength="8" required type="text" name="contrasena" style="margin-top: 35px; width: 250px; height: 20px; font-family: courier; font-size: 20px; ">


		<input type="submit" value="INGRESAR DATOS" name="subir" style="margin-left: 280px; height: 40px; width: 450px; margin-top: 35px; background:linear-gradient(#FFDA63, #FFB940); border: 0px; opacity: 0.9;cursor: pointer; border-radius: 10px; font-family: arial; font-size: 20px;">
</form>

</div>

	
 <table class="tabla" style="margin: auto;">
            <tr >
                <td>Nombre</td>
                <td>Apellido  </td>
                <td>Numero de Control   </td>
            </tr>
<?php
		include 'Incriptacion.php';
     // include 'config.inc.php';
        $db=new Conect_MySql();
            $sql = "select*from asesor ";
            $query = $db->execute($sql);
            while($datos=$db->fetch_row($query)){?>
            <tr>

                <td><?php echo $datos['Nombres']; ?></td>
                <td><?php echo $datos['Apellidos']; ?></td>
                <td><?php echo $datos['RFC']; ?></td>
            </tr>
          <?php  } ?>
        </table>
        <br>
	
 </body>
 </html>