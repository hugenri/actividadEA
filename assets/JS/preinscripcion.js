
document.addEventListener("DOMContentLoaded", function() {//con el submit se ejecuta la valudacion
    document.getElementById("formPre").addEventListener('submit', crearpreinscripcion); 
    });
    


    function crearpreinscripcion(evento) {//metodo para validar datos del formulario
      evento.preventDefault();
  
    
    const datos = new URLSearchParams(new FormData(document.getElementById("formPre")));
  
    fetch('modelo/crearpreinscripcion.php', {
        method: 'POST',
        body: datos
    })
        .then(response => response.json())
        .then(data => {
          if (data.success == true) {
            alert("Datos guardados!");
          document.getElementById("formPre").reset();

          
          } else {
            alert(data.message);
          }
          
          }
        );
    }