document.addEventListener("DOMContentLoaded", function() {//con el submit se ejecuta el login
  document.getElementById("form2").addEventListener('submit', login); 
  });
  

  function login(evento) {
    evento.preventDefault();
  const datos = new URLSearchParams(new FormData(document.getElementById("form2")));

  fetch('modelo/login.php', {
      method: 'POST',
      body: datos
  })
      .then(response => response.json())
      .then(data => {
        if (data.success == true) {
        location.href = 'usuario.php';
        } else {
          alert(data.message);
        }
        
        }
      );
  }