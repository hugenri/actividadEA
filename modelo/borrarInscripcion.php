<?php

session_start();//se inicia la sesion
require 'EscuelaDAO.php';
$consulta = new EscuelaDAO();
//  se obtienen los datos 
$idInscripcion = $_GET['id'];

if($_SESSION['usuario'] == "se"){ //si usuario en sesion es SE

if($idInscripcion != ""){
$resultado = $consulta->borrarInscripcion($idInscripcion);//se borrar el registro
if($resultado == true){

$response = array("success" => true);
}else{
 
    $response = array('success' => false, 'message' => 'Error al borrar el registro');

}
}
}else{

    $response = array('success' => false, 'message' => 'No tiene permisos para borrar registros');

}
//se retorna $response como JSON

echo json_encode($response);
?>