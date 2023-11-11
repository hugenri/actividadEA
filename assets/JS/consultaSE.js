function consultarInscripcionSE() {
    const datos = new URLSearchParams(new FormData(document.getElementById("form3")));
    localStorage.removeItem("matricula");

    fetch("modelo/consultaInscripcionSE.php", {
        method: 'POST',
        body: datos})
    .then(response => response.json())
    .then(datos => {
    let titulo = document.getElementById("alumno");
    let nombre = "";
    let matricula = "";
    let apellidoP = "";
    let apellidoM = "";
    datos.forEach((data) =>  {
        nombre = data.nombre;
        matricula =data.matricula;
        apellidoP = data.apellidoPaterno;
        apellidoM = data.apellidoMaterno;
 });
              guardarDatos(matricula);
		// Agrega texto al contenido del elemento
        titulo.innerHTML = "Alumno : "+ matricula + " "+ "Nombre : " + nombre + " "+ apellidoP + " "+apellidoM;
        
        let tabla = `<thead><tr><th>Asignatura</th><th>Grupo</th><th>Profesor</th><th>turno</th><th>Semestre</th><th>Estatus</th><th></th><th></th></tr></thead>`;
        tabla += `<tbody>`;

            for (let x of datos){
            // Crear las filas de la tabla con los datos obtenidos

                tabla += `<tr data-id="${x.id_inscripcion}"><td class="text-nowrap">${x.asignatura}</td>
                <td class="text-nowrap">${x.grupo}</td>
                <td class="text-nowrap">${x.profesor}</td>
                <td class="text-nowrap">${x.turno}</td>
                <td class="text-nowrap">${x.semestre}</td>
                <td class="text-nowrap">${x.estatus}</td>
                <td class="text-nowrap"><button class="bEliminar btn btn-danger btn-sm" data-id="${x.id_inscripcion}" onclick="eliminar()">Eliminar</button></td>
                <td class="text-nowrap"><button class="bActualizar btn btn-primary btn-sm" data-id="${x.id_inscripcion}" onclick="redireccionar()">Editar</button></td></tr>`;
    
            }
            tabla += `</tbody>`;

            document.getElementById("tablaSE").innerHTML = tabla;
});

}


function eliminar( ){

    const botones = document.querySelectorAll(".bEliminar");

botones.forEach(boton => {

    boton.addEventListener("click", function(){
        const id = this.dataset.id;
        
        const confirm = window.confirm("¿Deseas eliminar el  registro?");

        if(confirm){
        fetch('modelo/borrarInscripcion.php?id=' + id)
        .then(response => response.json())
        .then(data => {
            if (data.success == true) {
            /*
               const row = document.querySelector(`#tb1 tr[data-id='${id}']`);
               if (row) {
                     row.remove();
                  }
                  */
            alert("Registro eliminado")
            location.reload();
            }else {
                alert(data.message);
              }
    });
}
    });
});

}


function redireccionar( ){
    
    const botones = document.querySelectorAll(".bActualizar");
botones.forEach(boton => {

    boton.addEventListener("click", function(){
        const id = this.dataset.id;
        
        let fila = document.querySelector(`#tablaSE tr[data-id='${id}']`);
        let celdas = fila.getElementsByTagName("td");


let asignatura= celdas[0].innerHTML;
let grupo= celdas[1].innerHTML;
let profesor = celdas[2].innerHTML;
let turno = celdas[3].innerHTML;
let semestre = celdas[4].innerHTML;
let estatus = celdas[5].innerHTML;
let ID = id;
location.href = "actualizar.php?asignatura=" + asignatura + "&grupo=" + grupo + "&profesor=" + 
profesor + "&turno=" + turno + "&semestre=" + semestre + "&estatus=" + estatus + "&id="+ID;

    });
});
}


function guardarDatos(dato) {
    
    localStorage.setItem("matricula", dato);
  }