<?php

session_start();//se inicia la sesion

require 'EscuelaDAO.php';
$consulta = new EscuelaDAO();

if(isset($_SESSION['matricula']))
{
	$matricula = $_SESSION['matricula'];
        

$resultado = $consulta->consultaInscripcionAlumno($matricula);
echo json_encode($resultado);
}
?>