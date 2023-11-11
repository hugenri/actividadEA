<?php

session_start();
$usuario = "";
$nombre ="";
$apellidoP ="";
$apellidoM = "";
$matricula = "";
if(isset($_SESSION['usuario']))
{
	$usuario = $_SESSION['usuario'];
        $nombre = $_SESSION['nombre'];
        $apellidoP = $_SESSION['apellidoP'];
        $apellidoM = $_SESSION['apellidoM'];
	$matricula= $_SESSION['matricula'];

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

<title>Preinscripcion</title>

<!--  Se importar la funciones javaScript -->
<script languaje= "javascript" src="assets/JS/inscripcionAlumno.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link href="assets/estilos/style1.css" rel="stylesheet">

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
              <a class="nav-link" href="usuario.php">Area usuario</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="modelo/cerrarSesion.php">Salir</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mb-5"><!-- para crear un espacio -->
    <p class="mb-9">&nbsp &nbsp &nbsp</p>
</div>

    <div class="d-flex align-items-center justify-content-center mb-3">
    <h5 class="datosAL class="text-nowrap"><?php echo "Alumno: " ." $matricula". "  ". " Nombre: " .ucfirst($nombre). " " .ucfirst($apellidoP). " ". ucfirst($apellidoM); ?></h5>
	</div>
  
    

<div class="container" style="margin-bottom: 30px;">
  <div class="row">
    
    <div class="col-lg-12">
<!--
<div class="col-lg-6 col-md-8 col-sm-8">
-->
      <div class="table-responsive">
        <table id="tabla1" class="table table-bordered">
</table>
</div>
</div>
</div>
</div>

<div class="d-flex justify-content-center mt-6 mb-6" style="margin-bottom: 50px;">
  <div class="col-lg-4 col-md-6 col-sm-12">
    <div class="card mx-auto" style="max-width: 18rem;">
      <img src="assets/imagenes/servicio.jpg" class="card-img-top" alt="Imagen de servicios escolares">
      <div class="card-body">
        <h5 class="card-title text-center">Periodo de inscripción</h5>
        <p class="card-text">Del 1 de abril al 30 de abril</p>
        <a href="#" class="btn btn-primary d-block mx-auto">Más información</a>
      </div>
    </div>
  </div>
</div>

    <!--
      
    <div class="table-responsive">
      <table id="tabla1" class="table table-striped table-hover">
</table>
</div>
-->
      <script>
         window.addEventListener('load', function() {

                consultarInscripcionAlumno();
});
 </script>
 <!-- Incluir los scripts de Bootstrap 5 -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  
<footer class="bg-dark text-white mt-7">
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