const formularioContactos = document.querySelector('#contacto');
 eventLinteners();
function eventLinteners(){
    //cuando el formulario de editar o crear se ejecuta
    formularioContactos.addEventListener('submit',leerFormulario);
}

function leerFormulario(e){
    e.preventDefault();

    //leer los datos de los inputs
    const nombre = document.querySelector('#nombre').value,
          empresa = document.querySelector('#empresa').value,
          telefono = document.querySelector('#telefono').value,
          accion = document.querySelector('#accion').value;
    if(nombre === '' || telefono === '' || empresa === ''){
        mostrarNotificacion('Todos los campos son Obligatorios','error');
    }else{
        //pasa la validacion, crear llamado a AJAX
        const infoConctacto = new FormData();
        infoConctacto.append('nombre',nombre);
        infoConctacto.append('empresa',empresa);
        infoConctacto.append('telefono',telefono);
        infoConctacto.append('accion',accion);
        //console.log(...infoConctacto);

        if(accion === 'crear'){
            //creamos nuevo contacto
            insertarBD(infoConctacto);
        }
        else{
            //editamos

        }
    }
}

//inserta en la base de datos con AJAX
function insertarBD(datos){
    //llamdo a Ajax
    
    //crear el ebjeto
    const xhr = new XMLHttpRequest();
    //abrir la conexion
    xhr.open('POST','includes/modelos/modeloContactos.php',true);
    //pasar los datos 
    xhr.onload = function(){
        if(this.status === 200){
            console.log(xhr.responseText);
            const respuesta = JSON.parse(xhr.responseText);
            console.log(respuesta.empresa);
        }
    }
    //enviar los datos
    xhr.send(datos);
}
function mostrarNotificacion(mensaje,clase){
    const notificacion = document.createElement('div');
    notificacion.classList.add(clase, 'notificacion','sombra');//agregamos la clase al div
    notificacion.textContent= mensaje;

    //formulario
    formularioContactos.insertBefore(notificacion,document.querySelector('form legend'));
    //ocultar o mostrar la notificacion
    setTimeout(() => {
        notificacion.classList.add('visible');
        setTimeout(() => {
            notificacion.classList.remove('visible');
            setTimeout(() => {
                notificacion.remove();
            }, 500);
        }, 3000);
    }, 100);
}