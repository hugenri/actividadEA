<?php
session_start();//se inicia la sesion
require 'EscuelaDAO.php';
$login = new EscuelaDAO();
//  se obtienen los datos 
$matricula = trim($_POST['matricula']);
$password = trim($_POST['passW']); 

if($matricula == "" || $password ==""){ //para verificar que los datos enviados por POST tenga un valor.

	$response = array('success' => false, 'message' => 'Faltan datos');

	
}elseif (!preg_match('/^[a-zA-Z0-9]+$/', $matricula)) { //para verificar que el valor contiene solo letras y números.
	$response = array('success' => false, 'message' => 'Solo numeros y letras en la matricula');

 }else{

	$datos= $login->login($matricula, $password); //se realiza la consulta SQL a MYSQL

	if(!empty($datos)){//si el usuario existe

		$_SESSION["nombre"] =  $datos["nombre"];//se guarda el usuari en la variable de session
		$_SESSION["apellidoP"] =  $datos["apellidoPaterno"];//se guarda  en la variable de session
		$_SESSION["apellidoM"] =  $datos["apellidoMaterno"];
		$_SESSION["usuario"] =  $datos["tipoUsuario"];
	    $_SESSION["matricula"] =  $datos["matricula"];


		$response = array("success" => true);
	}
	if($datos == 0){//si el usuario no existe
		$response = array('success' => false, 'message' => 'Usuario no registrado');
	
	}
}
//se retorna $response como JSON
echo json_encode($response);
?>