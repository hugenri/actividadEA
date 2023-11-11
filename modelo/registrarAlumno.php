<?php

require 'EscuelaDAO.php';
$consultaBD = new EscuelaDAO();
$nombre = trim($_POST['nombre']); 
$apellidoP = trim($_POST['apellidoP']);
$apellidoM = trim($_POST['apellidoM']); 
$matricula = trim($_POST['matricula']);
$turno = trim($_POST['turno']); 
$tipo_usuario = trim($_POST['tipoUsuario']);
$password = trim($_POST['password']); 
$passValidacion = trim($_POST['passW2']);

$validacion = null;


//si se envia formulario sin datos se marca un error
if($matricula != "" && $nombre != ""  && $apellidoP != "" && $apellidoM !="" && $matricula != "" && $turno != "" && 
$tipo_usuario !=""  && $password != "" && $password != "" && $passValidacion != ""){
  

 $validacion = true;

  if($password != $passValidacion){
	  $response = array('success' => false, 'message' => 'contraseña no coincide  con la confirmación');
	   $validacion = false;
    
  } else if (strlen($password) < 8 || !preg_match('/[a-zA-Z]/', $password) || !preg_match('/\d/', $password) || !preg_match('/[^\w\s]/', $password)) {
    $response = array('success' => false, 'message' => 'La contraseña no cumple con el formato');
    $validacion = false;

  }

  if(strtoupper($tipo_usuario) != "AL"){
		$response = array('success' => false, 'message' => 'Solo se registran alumnos');
        $validacion = false;
}

     if($validacion == true){

         $datos= $consultaBD->verificarAlumno($matricula, $nombre, $apellidoP, $apellidoM);
         if(!empty($datos)){
         $response = array('success' => false, 'message' => 'Existe un alumno registrado! No se puede realizar la inscripción!');
          $validacion = false;
      }else{
         $resultado = $consultaBD->registrarAlumno($matricula, $nombre, $apellidoP, $apellidoM, $turno, $tipo_usuario, $password);

        if($resultado === true){
   
              $response = array("success" => true);
        }else{
    
	            $response = array('success' => false, 'message' => 'Error en el registro');
        }
 
       }
    }
  
}else{
  	$response = array('success' => false, 'message' => 'Faltan datos en el formulario');

}




// Return response as JSON
echo json_encode($response);


?>