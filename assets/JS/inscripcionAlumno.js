function consultarInscripcionAlumno() {
    fetch("modelo/consultaInscripcionAlumno.php")
    .then(response => response.json())
    .then(datos => {

        
        
        let tabla = `<thead><tr><th>Asignatura</th><th>Grupo</th><th>Profesor</th><th>turno</th><th>Semestre</th><th>Estatus</th></tr></thead>`;
        tabla += `<tbody>`;
        for (let x of datos){
            tabla += `<tr><td class="text-nowrap">${x.asignatura}</td>
            <td class="text-nowrap">${x.grupo}</td>
            <td class="text-nowrap">${x.profesor}</td>
            <td class="text-nowrap">${x.turno}</td>
            <td class="text-nowrap">${x.semestre}</td>
            <td class="text-nowrap">${x.estatus}</td>
            </tr>`;

        }
        tabla += `</tbody>`;
        document.getElementById("tabla1").innerHTML = tabla;
    });
}