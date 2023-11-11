<?php
$clave_secreta = '6LdYBvwkAAAAAAmqPzxzNKYbHpQILtwzu6n9XfGd';

require 'EscuelaDAO.php';
$consultaBD = new EscuelaDAO();
$nombre = trim($_POST['nombre']); 
$apellidoP = trim($_POST['apellidoP']);
$apellidoM = trim($_POST['apellidoM']); 
$matricula = trim($_POST['matricula']);
$turno = trim($_POST['turno']); 
$tipo_usuario = trim($_POST['tipoUsuario']);
$password = trim($_POST['password']); 
$passValidacion = trim($_POST['passwordC']);
 $recaptcha = $_POST['recaptcha'];
 $response = array();
 $validacion = null;

function validarRecaptcha($clave_secreta, $recaptcha) {
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $clave_secreta,
        'response' => $recaptcha
    ];
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $result = curl_exec($ch);
    curl_close($ch);
    $response = json_decode($result);

    // Verifica que la respuesta fue exitosa y que la puntuación es suficiente
    if ($response->success  && $response->score >= 0.5) {
        return true;
    } else {
        return false;
    }
}



 //si se envia formulario sin datos se marca un error
if($matricula != "" && $nombre != ""  && $apellidoP != "" && $apellidoM !="" && $matricula != "" && $turno != "" && 
$tipo_usuario !=""  && $password != "" && $password != "" && $passValidacion != ""){
	
        $datos= $consultaBD->verificarAlumno($matricula, $nombre, $apellidoP, $apellidoM);
            if(!empty($datos)){ //validación si existe el alumno
            echo json_encode(['success' => false, 'message' => 'Existe un alumno registrado! No se puede realizar el registro']);
             $validacion = false;
			 exit();
			}else if (strtoupper($tipo_usuario) != "AL") {  //validación tipo usuario 
            echo json_encode(['success' => false, 'message' => 'Sólo se aceptan alumnos con el tipo de usuario AL']);
            $validacion = false;
			exit();
        }else if($password != $passValidacion){  //validación confrimación de la contraseña
            echo json_encode(['success' => false, 'message' => 'Los contraseñas ingresadas no son iguales']);
             $validacion = false;
           exit();
		    //validación del formato del password
			}else if (strlen($password) < 8 || !preg_match('/[a-zA-Z]/', $password) || !preg_match('/\d/', $password) || !preg_match('/[^\w\s]/', $password)) {
                      echo json_encode(['success' => false, 'message' => 'La contraseña no cumple con el formato, números, caracteres especiales y mínimo 8 caracteres']);
          $validacion = false;
         exit();
        }else{
			$validacion = true;
		}
    } else {
        // Enviar una respuesta JSON con error
        echo json_encode(['success' => false, 'message' => 'Faltan datos, llenar los campos vacíos']);
		exit();
    }
	
	  if($validacion == true){
		  
    $rcaptcha = validarRecaptcha($clave_secreta, $recaptcha);


    // se verificar el token de Recaptcha enviado por el formulario web
  if ($rcaptcha === true) {//si pasa la verifivacion se ejecuta este bloque if
      $recapchatMG =  "Validación del ReCaptcha V3 es correcta. No eres un bot.";
     $resultado = $consultaBD->registrarAlumno($matricula, $nombre, $apellidoP, $apellidoM, $turno, $tipo_usuario, $password);
            
           if($resultado === true){
      
             echo json_encode(["success" => true, 'message' => 'Se realizo con éxito el registro de los datos', 'mgRecaptcha' => $recapchatMG]);
             exit();
		   }else{
       
             echo json_encode(['success' => false, 'message' => 'Error en el registro', 'mgRecaptcha' => $recapchatMG]);
             exit();
		   }
  
  }
  
  else {
          // Enviar una respuesta JSON con error
           echo json_encode(["success" => false, 'message' => 'Error en el ReCaptcha']);
		   exit();

      }
	  }
	  
	  
	 ?>