<?php


require 'EscuelaDAO.php';
$consulta = new EscuelaDAO();

$matricula = trim($_POST['matriculaA']);


if($matricula != "")
{

        

$resultado = $consulta->consultaInscripcion($matricula);

}else{
	    $response = array('success' => false, 'message' => 'Error en la matricula');

	
}
//se retorna $response como JSON

echo json_encode($resultado);

?>