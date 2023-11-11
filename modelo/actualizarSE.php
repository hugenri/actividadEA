<?php

session_start();//se inicia la sesion
require 'EscuelaDAO.php';
$consulta = new EscuelaDAO();

//  se obtienen los datos 
$id = $_POST['id'];
$asignatura = $_POST['asignatura'];
$profesor = $_POST['profesor'];
$turno = $_POST['turno'];
$semestre = $_POST['semestre'];
$grupo = $_POST['grupo'];
$estatus = $_POST['estatus'];

if($_SESSION['usuario'] == "se"){ //si usuario en sesion es SE


if($id != "" && $asignatura != "" && $profesor != "" && $turno != "" && $semestre != "" && $grupo != "" && $estatus != ""){
   
    $resultado = $consulta->actualizarinscripcion($asignatura, $grupo, $profesor, $turno, $semestre, $estatus, $id);
    if($resultado === true){
   $response = array("success" => true);

    }else{
    $response = array('success' => false, 'message' => 'Error en  la actualizacion de los datos');

   }
}else{

    $response = array('success' => false, 'message' => 'Ingrese todos los datos en el formulario!');

}
}else{

    $response = array('success' => false, 'message' => 'No tiene permisos para actualizar registros');

}

//se retorna $response como JSON
echo json_encode($response);

?>