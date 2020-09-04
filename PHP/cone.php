<?php
$mysqli = new mysqli('localhost','root','','login');
if ($mysqli->connect_errno);
echo "Erro al conectar con el servidor".$mysqli->connect_errno;
//endif;
?>
