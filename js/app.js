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
          telefono = document.querySelector('#telefono').value;
    if(nombre === '' || telefono === '' || empresa === ''){
        mostrarNotificacion('Todos los campos son Obligatorios','error');
    }else{
        console.log(nombre);
        console.log(empresa);
        console.log(telefono);
    }
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