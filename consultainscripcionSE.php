<?php
// Iniciamos la sesión
session_start();

// Comprobamos si hay un usuario en sesión
if(!isset($_SESSION['usuario'])){
  // Redirigimos al usuario a la página de inicio de sesión
  header("Location: login.php");
  exit;
}

if($_SESSION['usuario'] == "al"){ //si usuario en sesion es AL

  // Redirigimos al usuario a la página de consulta de inscripcion 
  header("Location: usuario.php");
  exit;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Preinscripcion</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link href="assets/estilos/style1.css" rel="stylesheet">
<!--  Se importar la funciones javaScript -->
<script languaje= "javascript" src="assets/JS/consultaSE.js"></script>
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
<div class="container-fluid d-flex justify-content-center mb-5">
		<div class="col-md-6 col-lg-4">
			<form id="form3">
				<div class="form-group">
					<label for="busqueda">Buscar por matricula:</label>
					<input type="text" class="form-control" id="matriculaA" name="matriculaA" oninput="consultarInscripcionSE()">
				</div>
			</form>
		</div>
	</div>

    <div class="d-flex align-items-center justify-content-center mb-3">
    <h5 id="alumno">Datos alumno</h5>
	</div>
  


<div class="container mb-3">
  <div class="row">
    
    <div class="col-lg-12">

      <div class="table-responsive">
        <table id="tablaSE" class="table table-bordered">
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

<script>
  window.addEventListener('load', function() {

    var datoGuardado = localStorage.getItem("matricula");
    
  if (datoGuardado !== null) {
    document.getElementById("matriculaA").value = datoGuardado;
    consultarInscripcionSE();
  }

});
</script>

 <!-- Incluir los scripts de Bootstrap 5 -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
 
 
 <footer class="bg-dark text-white">
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