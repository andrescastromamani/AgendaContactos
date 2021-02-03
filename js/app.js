const formularioContactos = document.querySelector('#contacto'),
      listadoContactos = document.querySelector('#lista-contactos tbody');
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
            console.log(JSON.parse(xhr.responseText));
            const respuesta = JSON.parse(xhr.responseText);
            //insertar un nuevo elemento en la Tabla
            const nuevoContacto = document.createElement('tr');
            nuevoContacto.innerHTML = `
                <td>${respuesta.datos.nombre}</td>
                <td>${respuesta.datos.empresa}</td>
                <td>${respuesta.datos.telefono}</td>
            `;

            //creamos el contenedor para los botones
            const contenedorAcciones = document.createElement('td');
            //creamos el icono de editar
            const iconoEditar = document.createElement('i');
            iconoEditar.classList.add('fas','fa-pen-square');
            //creamos el enlace para editar
            const btnEditar = document.createElement('a');
            btnEditar.appendChild(iconoEditar);
            btnEditar.href = `editar.php?id=${respuesta.datos.id_insertado}`;
            btnEditar.classList.add('btn','btn-editar');
            //Agregar al contenedor acciones
            contenedorAcciones.appendChild(btnEditar);

            //Creamos el icono eliminar
            const iconoEliminar = document.createElement('i');
            iconoEliminar.classList.add('fas','fa-trash');
            //creamos el btn eliminar
            const btnEliminar = document.createElement('button');
            btnEliminar.appendChild(iconoEliminar);
            btnEliminar.setAttribute('data-id',respuesta.datos.id_insertado);
            btnEliminar.classList.add('btn','btn-eliminar');
            //agregamos al contenedor de acciones
            contenedorAcciones.appendChild(btnEliminar);
            //Agregamos a nuevo contacto
            nuevoContacto.appendChild(contenedorAcciones);

            //agregamos a la lista de contactos
            listadoContactos.appendChild(nuevoContacto);

            //resetear formulario
            document.querySelector('form').reset();
            //mostrar notificacion
            mostrarNotificacion('Se Agrego correctamente','correcto');

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