<?php
require_once("ConexionBD.php");//se lo importa el archivo de la conexion 


class EscuelaDAO{

private $conexion;//variable para el objeto de la conexion 

public function __construct(){


$this->conexion = null;
    }
    public function login($matricula, $passWord){
        
        try{
        
            //se crea la conexion a la base de datos
            $this->conexion = ConexionBD::getconexion();
              ////se  prepara la sentencia de la  consulta sql para su ejecución y se devuelve un objeto de la consulta
            $query = $this->conexion->prepare("SELECT * FROM usuarios WHERE matricula = :matricula AND password = :passW");
            // se vinculan los parámetro de la consulta con las variables
            $query->bindParam(":matricula", $matricula);
            $query->bindParam(":passW", $passWord);
            //se ejecuta la consulta sql
            $query->execute();
           //se obtiene un array con todos los registros de los resultados
            $data=$query->fetch(PDO::FETCH_ASSOC);
			
            if($data){//si se regresan datos de la consulta se ejecuta este bloque 
                
              return $data;
            }else{//si no hay datos se ejecuta este bloque
                 return 0;
            }
    
        
    } catch (Exception $ex) {//se captura algún error tipo de error
     echo "Error". $ex;// se imprime el tipo de error 

    } finally {
        $this->conexion = null;//se cierra la conexión 
    }
}

public function registrarAlumno($matricula, $nombre, $apellidoP, $apellidoM, $turno, $tipoUsuario, $password){
    try{
    
        $this->conexion = ConexionBD::getconexion();  //se crea la conexion a la base de datos
         // se establece la sentencia de la consulta sql
$sql="INSERT INTO usuarios (matricula, nombre,apellidoPaterno, apellidoMaterno, turno, tipoUsuario, password) VALUES (:matricula,:nombre,:apellidoP, :apellidoM, :turno, :tipoUsuario, :password);";
//se  prepara la sentencia de la  consulta sql
$query = $this->conexion->prepare($sql);

//se vincula un parámetro al nombre de variable especificado 
$query->bindParam(':matricula',$matricula);
$query->bindParam(':nombre',$nombre);
$query->bindParam(':apellidoP',$apellidoP);
$query->bindParam(':apellidoM',$apellidoM);
$query->bindParam(':turno',$turno);
$query->bindParam(':tipoUsuario',$tipoUsuario);
$query->bindParam(':password',$password);


//Se ejecuta la consulta en la base de datos
$resultado = $query->execute();
    if($resultado === TRUE){//si se retorna true se eltra en este bloque if

            return true; //se retorna true
    }else{//si no
        return false;//se retorna false
    }

        
} catch (Exception $ex) { //se captura  el error que ocurra en el bloque try
echo "Error". $ex;

} finally {
   $this->conexion = null; //se cierra la conexión 
}
}

public function verificarAlumno($matricula, $nombre, $apellidoP, $apellidoM){
        
        try{
        
            //se crea la conexion a la base de datos
            $this->conexion = ConexionBD::getconexion();
              ////se  prepara la sentencia de la  consulta sql para su ejecución y se devuelve un objeto de la consulta
            $query = $this->conexion->prepare("SELECT * FROM usuarios WHERE (matricula = :matricula AND
			nombre = :nombre AND apellidoPaterno = :apellidoP AND apellidoMaterno = :apellidoM) OR (matricula = :matricula);");
            // se vinculan los parámetro de la consulta con las variables
            $query->bindParam(":matricula", $matricula);
            $query->bindParam(":nombre", $nombre);
			$query->bindParam(":apellidoP", $apellidoP);
            $query->bindParam(":apellidoM", $apellidoM);
            //se ejecuta la consulta sql
            $query->execute();
           //se obtiene un array con todos los registros de los resultados
            $data=$query->fetch(PDO::FETCH_ASSOC);
			
            if($data){//si se regresan datos de la consulta se ejecuta este bloque 
                
              return $data;
            }else{//si no hay datos se ejecuta este bloque
                 return 0;
            }
    
        
    } catch (Exception $ex) {//se captura algún error tipo de error
     echo "Error". $ex;// se imprime el tipo de error 

    } finally {
        $this->conexion = null;//se cierra la conexión 
    }
}

   
public function consultaInscripcionAlumno($matricula){
        
    try{
    
        //se crea la conexion a la base de datos
        $this->conexion = ConexionBD::getconexion();
          ////se  prepara la sentencia de la  consulta sql para su ejecución y se devuelve un objeto de la consulta
        $query = $this->conexion->prepare("SELECT * FROM inscripcion WHERE matricula = :matricula;");
        // se vinculan los parámetro de la consulta con las variables
        $query->bindParam(":matricula", $matricula);
        //se ejecuta la consulta sql
        $query->execute();
       //se obtiene un array con todos los registros de los resultados
        $data=$query->fetchAll(PDO::FETCH_ASSOC);
        
        if($data){//si se regresan datos de la consulta se ejecuta este bloque 
            
          return $data;
        }else{//si no hay datos se ejecuta este bloque
             return 0;
        }
} catch (Exception $ex) {//se captura algún error tipo de error
 echo "Error". $ex;// se imprime el tipo de error 

} finally {
    $this->conexion = null;//se cierra la conexión 
}
}
   
public function consultaInscripcion($matricula){
        
    try{
    
        //se crea la conexion a la base de datos
        $this->conexion = ConexionBD::getconexion();
          ////se  prepara la sentencia de la  consulta sql para su ejecución y se devuelve un objeto de la consulta
        $query = $this->conexion->prepare("SELECT * FROM usuarios JOIN inscripcion ON usuarios.matricula = inscripcion.matricula  WHERE inscripcion.matricula = :matricula;");
        // se vinculan los parámetro de la consulta con las variables
        $query->bindParam(":matricula", $matricula);
        //se ejecuta la consulta sql
        $query->execute();
       //se obtiene un array con todos los registros de los resultados
        $data=$query->fetchAll(PDO::FETCH_ASSOC);
        
        if($data){//si se regresan datos de la consulta se ejecuta este bloque 
            
          return $data;
        }else{//si no hay datos se ejecuta este bloque
             return 0;
        }

    
} catch (Exception $ex) {//se captura algún error tipo de error
 echo "Error". $ex;// se imprime el tipo de error 

} finally {
    $this->conexion = null;//se cierra la conexión 
}
}
//Función para borrar los datos de la inscripcion de alumno seleccionados
public function borrarInscripcion($id){
    try{ // bloque try-catch, se capturan las  excepciones 
            $this->conexion = ConexionBD::getconexion();//se crea la conexión a la BD
            // se establece la sentencia de la consulta sql
            $sql = "DELETE FROM inscripcion WHERE id_inscripcion= :id;";
            //se  prepara la sentencia de la  consulta sql
            $query = $this->conexion->prepare($sql);
            //Se vinculan los parámetros de la consulta con las variables
            $query->bindParam(":id", $id);
            //Se ejecuta la consulta en la base de datos
            $resultado = $query->execute();
        if($resultado === TRUE){//si el resultado es igual a true se ejecuta este bloque if 
            return true;//se retorna true si se elimino el registro
        }
        else{
            return false;//se retorna false si no se elimino el registro
        }
    }catch (Exception $ex) {//se captura  el error que ocurra en el bloque try
            echo "Error ". $ex;
           } finally {
               $this->conexion = null; //se cierra la conexión 
           }
  }
    //método para actualizar los datos de  alumno 
	
    public function actualizarInscripcion($asignatura, $grupo, $profesor, $turno, $semestre, 
    $estatus, $id){
        try{
        
        
            $this->conexion = ConexionBD::getconexion();//se crea la conexión a la BD
               // se establece la sentencia de la consulta sql para actualizar datos de un registro
    $sql="UPDATE inscripcion SET asignatura =:asignatura, grupo = :grupo, profesor= :profesor, turno = :turno, semestre = :semestre, 
    estatus = :estatus WHERE id_inscripcion = :id;";
    //se  prepara la sentencia de la  consulta sql
    $query = $this->conexion->prepare($sql);
    
    // se vinculan los parámetro de la consulta con las variables
    $query->bindParam(':asignatura',$asignatura);
    $query->bindParam(':grupo',$grupo);
    $query->bindParam(':profesor',$profesor);
    $query->bindParam(':turno',$turno);
    $query->bindParam(':semestre',$semestre);
    $query->bindParam(':estatus',$estatus);
    $query->bindParam(':id',$id);
    
    $query->execute(); //se ejecuta  la sentencia preparada 
    $resultado = $query->rowCount();//se devuelve el número de filas afectadas por la última consulta
        if($resultado > 0){//si el numuro de filas afectadas es mayor a 0 se ejecuta esta bloque if
       
                return true; //se retorna true
        }else{// si no se retorna false
            
            return false;//se retorna false
        }
    
            
    } catch (Exception $ex) { //se captura  el error que ocurra en el bloque try
    echo "Error". $ex;
    
    } finally {
       $this->conexion = null; //se cierra la conexión a la BD
    }
    }
	
	//método para actualizar los datos de  alumno 
	
    public function preinscripcion($matricula, $asignatura, $grupo, $profesor, $turno, $semestre, $estatus){
        try{
        
        
    $this->conexion = ConexionBD::getconexion();//se crea la conexión a la BD
               // se establece la sentencia de la consulta sql para actualizar datos de un registro
    $sql="INSERT INTO inscripcion (matricula, asignatura, grupo, profesor, turno, semestre, estatus) VALUES(:matricula, :asignatura, :grupo, :profesor, :turno,  :semestre, :estatus)";
    //se  prepara la sentencia de la  consulta sql
    $query = $this->conexion->prepare($sql);
    
    // se vinculan los parámetro de la consulta con las variables
    $query->bindParam(':matricula',$matricula);
    $query->bindParam(':asignatura',$asignatura);
    $query->bindParam(':grupo',$grupo);
    $query->bindParam(':profesor',$profesor);
    $query->bindParam(':turno',$turno);
    $query->bindParam(':semestre',$semestre);
    $query->bindParam(':estatus',$estatus);
    
    
    $query->execute(); //se ejecuta  la sentencia preparada 
    $resultado = $query->rowCount();//se devuelve el número de filas afectadas por la última consulta
        

if($resultado == true){//si se retorna true se eltra en este bloque if

        return true; //se retorna true
}else{//si no
    return false;//se retorna false
}        
    } catch (Exception $ex) { //se captura  el error que ocurra en el bloque try
    echo "Error". $ex;
    
    } finally {
       $this->conexion = null; //se cierra la conexión a la BD
    }
    }
    

    
}