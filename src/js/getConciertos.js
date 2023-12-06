// Obtiene los datos del localStorage y los envía a un script PHP en el servidor
document.addEventListener("DOMContentLoaded", function(){
    if (this.location.pathname !== "/mis-conciertos") return;
// Obtener los datos del localStorage
var datosLocalStorage = localStorage.getItem('conciertos'); // Reemplaza 'nombre_de_tu_llave' por la clave utilizada para guardar los datos en localStorage
console.log(datosLocalStorage);
// Realizar una petición AJAX para enviar los datos a un script PHP en el servidor
// Obtener datos del localStorage
// Supongamos que 'nombre_del_array' es la clave donde has guardado tu array en el localStorage

// Hacer una solicitud POST al servidor PHP
url = "/mis-conciertos";
fetch(url, {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json'
    // Si necesitas enviar más encabezados, agrégalos aquí
  },
  body: JSON.stringify({ datos: datosLocalStorage })
})
.then(response => {
  if (response.ok) {
    console.log('Datos enviados correctamente al servidor');
    // Puedes realizar acciones adicionales si la solicitud fue exitosa
  } else {
    console.error('Hubo un problema al enviar los datos');
    // Manejar errores si la solicitud falla
  }
})
.catch(error => {
  console.error('Error en la solicitud:', error);
});


});
