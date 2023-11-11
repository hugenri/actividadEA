
document.addEventListener("DOMContentLoaded", function() {//con el submit se ejecuta la valudacion
  document.getElementById("formAct").addEventListener('submit', actualizar); 
  });
  


  function actualizar(evento) {//metodo para validar datos del formulario
    evento.preventDefault();

  
  const datos = new URLSearchParams(new FormData(document.getElementById("formAct")));
 
  fetch('modelo/actualizarSE.php', {
      method: 'POST',
      body: datos
  })
      .then(response => response.json())
      .then(data => {
        if (data.success == true) {
          alert("Datos guardados!");
        //document.getElementById("formAct").reset();
        location.href="consultainscripcionSE.php"
        
        } else {
          alert(data.message);
        }
        
        }
      );
  }

  function obtenerDatos(){

    let id = obtenerParametroDeURL("id");
    let asignatura = obtenerParametroDeURL("asignatura");
    let grupo = obtenerParametroDeURL("grupo");
    let profesor = obtenerParametroDeURL("profesor");
    let turno = obtenerParametroDeURL("turno");
    let semestre = obtenerParametroDeURL("semestre");
    let estatus = obtenerParametroDeURL("estatus");


  
    document.getElementById("asignatura").value = asignatura;
    document.getElementById("grupo").value = grupo;
    document.getElementById("profesor").value = profesor;
    document.getElementById("turno").value = turno;
    document.getElementById("semestre").value = semestre;
    document.getElementById("estatus").value = estatus;
    document.getElementById("id").value = id;
  }
  
function obtenerParametroDeURL(nombre) {
    var url = window.location.search.substring(1);
    var variables = url.split("&");
    for (var i = 0; i < variables.length; i++) {
      var nombreVariable = variables[i].split("=");
      if (nombreVariable[0] == nombre) {
        return decodeURIComponent(nombreVariable[1]);
      }
    }
    return null;
  }

