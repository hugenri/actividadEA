<?php

class ConexionBD{
  
 
  
  public static function getconexion(){
    $conexion = null;
try{
  $conexion = new PDO("mysql:host=sql105.epizy.com;dbname=epiz_33770101_AC", 'epiz_33770101', 'stPMmZ0rd7e');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // Caracteres utf8
 $conexion->exec("SET CHARACTER SET utf8");
}catch(PDOException $ex){
    echo 'Error en conexion: ' . $ex->getMessage();
}

return $conexion;
}
}
?>