<?php

session_start();
$usuario = "";
$nombre ="";
$apellidoP ="";
$apellidoM = "";

if(isset($_SESSION['usuario']))
{
	$usuario = $_SESSION['usuario'];
        if($usuario == "al"){
                header('location:../consultainscripcion.php');
        }elseif($usuario = "se"){

                header('location:../consultainscripcionSE.php');

        }
	

}
else
{
	header('location:login.php');
}
?>


