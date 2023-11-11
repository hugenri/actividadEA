<?php

// Iniciamos la sesión
session_start();

// Comprobamos si hay un usuario en sesión
if(!isset($_SESSION['usuario'])){
  // Redirigimos al usuario a la página de inicio de sesión
  header("Location: login.php");
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
              <a class="nav-link" href="consultainscripcionSE.php">Consulta inscripción</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="modelo/cerrarSesion.php">Salir</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
      <div class="container mt-7 mb-6"><!-- para crear un espacio -->
        <p class="mb-7">&nbsp &nbsp &nbsp</p>
      </div>
      <div class="container mt-7 mb-6">
        <p class="mb-9">&nbsp &nbsp &nbsp</p>
      </div>
<!--  Se importar la funciones javaScript -->
<script languaje= "javascript" src="assets/JS/actualizar.js"></script>
      <div class="container mt-9 mb-7">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-8 col-sm-8">
            <div class="card border-0 shadow-lg p-4">
              <h4 class="text-center mb-3">Formulario de preinscripcion</h4>
              <form id="formAct">
              <div>
                  <!-- campo oculto  -->  
                  <input type="hidden" class="form-control" id="matricula" name="id" value="<?php echo $_GET["id"];?>" readonly>
                </div>
                <div class="mb-1">
                  <label for="asignatura" class="form-label">Asignatura</label>
                  <input type="text" class="form-control" id="asignatura" name="asignatura" placeholder="Ingrese la asignatura">
                </div>
                <div class="mb-1">
                  <label for="grupo" class="form-label">Grupo</label>
                  <input type="text" class="form-control" id="grupo" name="grupo" placeholder="Ingrese el grupo: 200, 198...">
                </div>
                <div class="mb-1">
                  <label for="matricula" class="form-label">Profesor</label>
                  <input type="text" class="form-control" id="profesor" name="profesor" placeholder="Ingrese nombre del profesor">
                </div>
                
                <div class="mb-1">
                  <label for="turno" class="form-label">Turno</label>
                  <input type="text" class="form-control" id="turno" name="turno" placeholder="Ingrese turno: matutino/despertino">
                </div>
                <div class="mb-1">
                  <label for="turno" class="form-label">Estatus</label>
                  <input type="text" class="form-control" id="estatus" name="estatus" placeholder="estatus">
                </div>
                <div class="mb-3">
                  <label for="semestre" class="form-label">semestre</label>
                  <input type="text" class="form-control" id="semestre" name="semestre" placeholder="1, 2, 4...">
                </div>
                
               
                <button type="submit" id="miBoton" onclick="actualizar()" class="btn btn-primary w-100">Enviar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <script>
      window.addEventListener('load', function() {

             obtenerDatos();
});
</script>
  <!-- Incluir los scripts de Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <div class="container mt-7 mb-6"> <!-- para crear un espacio -->
        <p class="mb-7">&nbsp &nbsp &nbsp</p>
      </div>
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

