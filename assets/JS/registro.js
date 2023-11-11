document.getElementById('registro-form').addEventListener('submit', function(event) {
  event.preventDefault();

  let form = event.target;
  let recaptcha = form.querySelector('[name="recaptcha"]').value;
//alert("Enviando los datos"); 
  fetch('modelo/registro.php', {
    method: 'POST',
    body: new FormData(form)
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      if (typeof data.mgRecaptcha === 'string' && data.mgRecaptcha.trim() !== '') {
        alert(data.mgRecaptcha);
      }
         alert(data.message);
         form.reset();
         location.reload();
       } else {
        if (typeof data.mgRecaptcha === 'string' && data.mgRecaptcha.trim() !== '') {
          alert(data.mgRecaptcha);
        }
         alert(data.message);
       }
  })
  .catch(error => {
    console.error('Error:', error);
  });
});
