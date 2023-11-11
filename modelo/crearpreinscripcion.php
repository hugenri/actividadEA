<?php

session_start();//se inicia la sesion
require 'EscuelaDAO.php';
$consultaBD = new EscuelaDAO();

$matricula = $_POST['matricula']; 
$asignatura = $_POST['asignatura'];
$grupo = $_POST['grupo']; 
$profesor = $_POST['profesor'];
$turno = $_POST['turno']; 
$semestre = $_POST['semestre'];
$estatus = "prerinscrita"; 

if($_SESSION['usuario'] == "se"  || $_SESSION['usuario'] == "al" ){ //si usuario en sesion es SE

//si se envia formulario sin datos se marca un error
if($matricula != "" && $asignatura!= ""  && $grupo != "" && $profesor !="" && $turno != "" && $semestre != "" && 
$estatus !=""){
 
     if(is_numeric($_POST['grupo']) && is_numeric($_POST['semestre'])){
  $resultado =$consultaBD->preinscripcion($matricula, $asignatura, $grupo, $profesor, $turno, $semestre, $estatus);

  if($resultado == true){
    $response = array('success' => true);

  }else{
    $response = array('success' => false, 'message' => 'No se pudo realizar el registro');

  }
}else{
  $response = array('success' => false, 'message' => 'Ingrese solo numeros en grupo o semestre');

}
  
}else{
  	$response = array('success' => false, 'message' => 'Faltan datos en el formulario');

}

}else{

  $response = array('success' => false, 'message' => 'No tiene permisos para crear preinscripcion registros');

}
//se retorna $response como JSON
echo json_encode($response);


?>