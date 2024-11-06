
const formularios_ajax = document.querySelectorAll(".formularioAjax");

function enviar_formulario_ajax(e) {
    
  e.preventDefault(); // Evita el comportamiento por defecto del formulario
  let data = new FormData(this);
  let method = this.getAttribute("method");
  let action = this.getAttribute("action");
  let tipo = this.getAttribute("data-form");
 
  let encabezado = new Headers();
  let config = {
    method: method,
    headers: encabezado,
    mode: 'cors',
    cache: 'no-cache',
    body: data
  }

  let texto_alerta;

  switch(tipo) {
    case "save":
      texto_alerta = "Los datos seran guardados.";
      break;
    case "delete":
      texto_alerta = "Se eliminara el usuario de forma definitiva ";
      break;
    case "update":
      texto_alerta = "Datos actualizados.";
      break;
    case "search":
      texto_alerta = "Se eliminará el término de búsqueda y deberá escribir de nuevo.";
      break;
    case "loans":
      texto_alerta = "Borrar datos.";
      break;
    default:
      texto_alerta = "¿Qué pasó?";
  }

  Swal.fire({
    title: "¿Estás seguro?",
    text: texto_alerta,
    icon: 'question',
    confirmButtonText: "Aceptar",
    showCancelButton: true,
    cancelButtonText: "Cancelar"
  }).then((result) => {
    if (result.value) {
      fetch(action, config)
        .then(respuesta => respuesta.json())
        .then(respuesta => alertas_ajax(respuesta))
        .catch(error => {
          console.error('Error:', error);
          Swal.fire({
            title: "Error",
            text: "Ocurrió un error al procesar la solicitud.",
            icon: "error",
            confirmButtonText: "Aceptar"
          });
        });
    }
  });
}

formularios_ajax.forEach(formulario => {
  formulario.addEventListener("submit", enviar_formulario_ajax);
});

function alertas_ajax(alerta) {
  switch(alerta.Alerta) {
    case "simple":
      Swal.fire({
        title: alerta.Titulo,
        text: alerta.Texto,
        icon: alerta.Tipo,
        confirmButtonText: "Aceptar"
      });
      break;
    case "recargar":
      Swal.fire({
        title: alerta.Titulo,
        text: alerta.Texto,
        icon: alerta.Tipo,
        confirmButtonText: "Aceptar"
      }).then((result) => {
        if (result.isConfirmed) {
          location.reload();
        }
      });
      break;
    case "limpiar":
      Swal.fire({
        title: alerta.Titulo,
        text: alerta.Texto,
        icon: alerta.Tipo,
        confirmButtonText: "Aceptar"
      }).then((result) => {
        if (result.isConfirmed) {
          document.querySelector(".formularioAjax").reset(); // Limpiar el formulario
        }
      });
      break;
    case "redireccionar":
      window.location.href = alerta.URL;
      break;
    default:
      Swal.fire({
        title: "Error",
        text: "Acción no reconocida.",
        icon: "error",
        confirmButtonText: "Aceptar"
      });
  }
}