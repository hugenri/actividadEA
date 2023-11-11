<?php

session_start();

if(isset($_SESSION['usuario']))
{
	
	header('location:usuario.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login</title>
<link href="assets/estilos/style1.css" rel="stylesheet">
	<!-- Importamos el archivo CSS de Bootstrap 5 -->
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- <script languaje= "javascript" src="assets/JS/login.js"></script> -->
   <script languaje= "javascript" src="assets/JS/login.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=clave_publica_recaptcha"></script>

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
              <a class="nav-link" href="registrarse.html">Registrarse</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Iniciar sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
   

	<div class="container-fluid bg-info">
		<div class="row justify-content-center align-items-center min-vh-100">
			<!-- Creamos el formulario con la clase "col-lg-4 col-md-6 col-sm-8" para que se adapte a pantallas grandes, medianas y pequeñas -->
			<form id="form2" class="col-lg-4 col-md-6 col-sm-8 bg-primary p-4 rounded shadow">
				<h2 class="text-center mb-4">Iniciar sesión</h2>
				<div class="mb-1">
					<label for="matricula" class="form-label">Matricula</label>
					<input type="text" class="form-control rounded-pill" id="matricula" name="matricula" placeholder="Ingrese su matricula" required>
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">Contraseña</label>
					<input type="password" class="form-control rounded-pill" id="password" name="passW" placeholder="Ingrese su contraseña" required>
				</div>
				<div class="mb-4">
					<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

				</div>
				  <div class="g-recaptcha mb-4" data-sitekey="RECAPTCHA_SITE_KEY">
				  <input type="hidden" name="recaptcha" id="recaptcha">

				  </div>
				<div class="text-center">
        <button type="submit"  onclick="login()" class="btn btn-success w-100 rounded-pill">Acceder</button>

				</div>
			</form>
		</div>
	</div>
<!--  el siguiente código JavaScript es
 para cargar el reCAPTCHA en el formulario y verificar la respuesta del usuario-->
  <script>
    grecaptcha.ready(function() {
      grecaptcha.execute('RECAPTCHA_SITE_KEY', {action: 'submit'}).then(function(token) {
        document.getElementsByName('recaptcha')[0].value = token;
      });
    });
  </script>
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

