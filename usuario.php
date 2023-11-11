<?php

session_start();
$usuario = "";
$nombre ="";
$apellidoP ="";
$apellidoM = "";

if(isset($_SESSION['usuario']))
{
	$usuario = $_SESSION['usuario'];
        $nombre = $_SESSION['nombre'];
$apellidoP = $_SESSION['apellidoP'];
$apellidoM = $_SESSION['apellidoM'];
	

}
else
{
	header('location:login.php');
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Registro de alumno</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link href="assets/estilos/style1.css" rel="stylesheet">
  <script languaje= "javascript" src="assets/JS/registro.js"></script>

</head>
<body>
 <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <div class="container">
       
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="preinscripcion.php">Preinscribir asignatura</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="controller/consultainscripcionController.php">Consultar inscripción</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="modelo/cerrarSesion.php">Salir</a></li>
            </li>
          </ul>
        </div>
      </div>
    </nav>
      
      
  	
  
  <div class="container mt-7 mb-6"><!-- para crear un espacio -->
    <p class="mb-9">&nbsp &nbsp &nbsp</p>
  </div>
  <div class="container mt-7 mb-6"><!-- para crear un espacio -->
    <p class="mb-9">&nbsp &nbsp &nbsp</p>
  </div>
  <div class="container mt-7">
    <h4><?php echo "¡Bienvenido" . " ". ucfirst($nombre). " " .ucfirst($apellidoP). " ". ucfirst($apellidoM). " " ."¡Has ingresado como". " ".strtoupper($usuario). " " . "!"  ?></h4>
    </div>
 <!-- Incluir los scripts de Bootstrap 5 -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  

  <footer class="bg-dark text-white mt-7 fixed-bottom">
  <div class="container py-3">
    <div class="row">
      <div class="col-md-6">
        <p>&copy; 2023 DPW2</p>
      </div>
     
    </div>
  </div>
</footer>

</body>
</html>
