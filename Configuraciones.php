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
          $nombreAlum = $_POST['NombreAlumno'];
		  $apellidoAlum = $_POST['ApellidoAlumno'];
		  $numeroContol = $_POST['NCONTROLAlumno'];
		  $contrasena = $_POST['contrasena'];
			include 'Incriptacion.php';	
		  $contrasena=SED::encryption($contrasena);
		 // $numeroContol = SED::encryption($numeroContol); 
            $db=new Conect_MySql();
            $sql= "INSERT INTO alumno(Apellidos,Nombres,num_control,password) VALUES('$apellidoAlum','$nombreAlum','$numeroContol','$contrasena')";

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
 		<script type="text/javascript" src="JS/jqueryletra.js"></script>
 	<script type="js/principal.js"></script>
  	<script src="js/jquery-3.3.1.min.js"></script>
  	<script src="js/main.js"></script>
  	<link rel="stylesheet" type="text/css" href="estilosletra.css">
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

<script type="text/javascript">
var tooltipObj = new DHTMLgoodies_formTooltip(); //lo crea
tooltipObj.setTooltipPosition('right'); // Indica en que posición se mostrar el globo, puede ser right(derecha) o below(debajo)
tooltipObj.setPageBgColor('#EEE'); //Debes indicar el color de fondo de tu sitio
tooltipObj.setCloseMessage('Cerrar'); // Indica el texto que aparecerá para que el usuario pueda cerrar el globo
tooltipObj.setDisableTooltipMessage('No mostrar más');
//Mensaje que aparecerá para que el usuario pueda tener la opción de que no aparezcan más textos de ayuda
tooltipObj.initFormFieldTooltip(); //inicializa
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

<script type="text/javascript">
	$(function(){
		function limiteCaracteres(input, counter,limit){
			$('.'+conter).text(limit+'restantes');
			var left;
			$('.'+input).on('keyup',function(e){
				var qtdCaracteres = $(this).val().length;
				left = limit-qtdCaracteres;

if(left <= 0){
	left=0;
	var textoActual = $(this).val();
	var nuevoTexto = '';
	for(var n = 0 ; n<limit;n++){
		nuevoTexto+=textoActual[n];
	}
	$(this).val(nuevoTexto);
}

				$('.'+counter).text(left+'restantes');
			});
		}
		limiteCaracteres('texto1', 'counter1',30);
	});
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
		<a style="margin-left: 1100px;" href="CerrarSesion-asesor.php">No olvides cerrar session</a>
		<br>
		<br>
	</header>
	</body>


<div style="margin:auto; height: 380px; width: 1010px; margin-left: 270px; background:#DEDEDE;">
	<p style="font-size: 35px; font-family:ARIAL;  margin: auto; margin-left: 220px; margin-bottom:40px; padding-top: 25px; opacity: 0.5;">DAR DE ALTA A UN NUEVO ALUMNO</p>
<form method="post" action="" enctype="multipart/form-data">
	<P style=" font-size: 20px; font-family:ARIAL;  margin: auto; margin-left: 100px; margin-top:20px; float: left;">Nombre</P>

	<input oninvalid="this.setCustomValidity('El nombre debe de ser mas de 3 caracteres')" title="El nombre no debe de ser mas de 35 caracteres" class="nombre"  maxlength="35" minlength="3" onkeypress="return sololetras(event);" type="text" name="NombreAlumno" required="required"  style="cursor: pointer;  cursor: text; margin-top: 20px; width: 250px; height: 20px; font-family: courier; font-size: 20px; float: left;" >

	<P style=" font-size: 20px; font-family:ARIAL;  margin: auto; margin-left: 150px; margin-top:20px; float: left;">Apellidos</P>

		<input oninvalid="this.setCustomValidity('El apellido debe de ser mas de 4 caracteres')" title="El nombre no debe de ser mas de 35 caracteres" maxlength="35" minlength="6" onkeypress="return sololetras(event);" type="text" name="ApellidoAlumno" required="required" style="margin-top: 20px; width: 250px; height: 20px; font-family: courier; font-size: 20px; ">
		

			<P style=" font-size: 20px; font-family:ARIAL;  margin: auto; margin-left: 85px; margin-top:35px; float: left;">N.Control</P>

	<input maxlength="10" minlength="8" oninvalid="this.setCustomValidity('El numero de control no debe contener mas de 8 caracteres')" title="El numero de control no debe conterner mas de 10 numeros" onkeypress="return solonumeros(event);" type="text" name="NCONTROLAlumno" required style="margin-top: 35px; width: 250px; height: 20px; font-family: courier; font-size: 20px; float: left;">

	<P style=" font-size: 20px; font-family:ARIAL;  margin: auto; margin-left: 130px; margin-top:35px; float: left;">Contraseña</P>

		<input oninvalid="this.setCustomValidity('La contraseña debe de contener mas de 8 caracteres')" title="La contraseña no debe de contener mas de 10 caracteres" maxlength="10" minlength="8"  required type="text" name="contrasena" style="margin-top: 35px; width: 250px; height: 20px; font-family: courier; font-size: 20px; ">


		<input type="submit" value="INGRESAR DATOS" name="subir" style="margin-left: 280px; height: 40px; width: 450px; margin-top: 35px; background:linear-gradient(#FFDA63, #FFB940); border: 0px; opacity: 0.9;cursor: pointer; border-radius: 10px; font-family: arial; font-size: 20px;">
</form>

		<form action="InterfaceAsesor.php">
		<input type="submit" value="Volver" style="margin-left: 280px; height: 40px; width: 200px; margin-top: 20px; background:linear-gradient(#FFDA63, #FFB940); border: 0px; opacity: 0.7;cursor: pointer; border-radius: 10px; font-family: arial; font-size: 20px; float: left;" >
		</form>

			<input class="lista" onclick="mostrarLISTA();" type="submit" value="Lista de alumnos" style="margin-left: 50px; height: 40px; width: 200px; margin-top: 20px; background:linear-gradient(#FFDA63, #FFB940); border: 0px; opacity: 0.7;cursor: pointer; border-radius: 10px; font-family: arial; font-size: 20px;" >
</div>

	<div id="lista">
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
            $sql = "select*from alumno ";
            $query = $db->execute($sql);
            while($datos=$db->fetch_row($query)){?>
            <tr>

                <td><?php echo $datos['Nombres']; ?></td>
                <td><?php echo $datos['Apellidos']; ?></td>
                <td><?php echo $datos['num_control']; ?></td>
            </tr>
          <?php  } ?>
        </table>
        <br>
<a style="margin:auto; margin-left: 700px;" href="javascript:void(0);"  onclick="ocultarLISTA();">Limpiar la pantalla</a>
	</div>

	
 </body>
 </html>