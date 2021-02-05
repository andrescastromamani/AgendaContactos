<?php 
    include 'includes/layouts/header.php';
    include 'includes/funciones/funciones.php';
?>
    <div class="contenedor-barra">
        <h1>Agenda de Contactos</h1>
    </div>
    <div class="bg-amarillo contenedor sombra">
        <form action="#" id="contacto">
            <legend>Añada Un Contacto <br><span>Todos los campos son obligatorios</span></legend>
            <div class="campos">
            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input 
                    type="text"
                    placeholder="Nombre Contacto" 
                    id="nombre"  
                    value="">
            </div>
            <div class="campo">
                <label for="empresa">Empresa:</label>
                <input type="text" placeholder="Nombre Empresa"  id="empresa" value="">
            </div>
            <div class="campo">
                <label for="telefono">Telefono:</label>
                <input type="tel" placeholder="Numero Telefono" id="telefono"  value="">
            </div>
        </div>
        <div class="campo enviar">
            <input type="hidden" id="accion" value="crear">
            <input type="submit" value="Añadir">
        </div>
        </form>
    </div>
    <div class="bg-blanco contenedor sombra contactos">
        <div class="contenedor-contactos">
            <h2>Contactos</h2>
            <input type="text" id="buscar" class="buscador sombra" placeholder="Buscar Contactos...">
            <p class="total-contactos"><span>2</span>Contactos</p>
            <div class="contenedor-tabla">
                <table class="lista-contactos" id="lista-contactos">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Empresa</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $contactos = obtenerContactos();
                        if($contactos->num_rows){ 
                            foreach ($contactos as $contacto) {?>
                                <tr>
                                    <td><?php echo $contacto['nombre']; ?></td>
                                    <td><?php echo $contacto['empresa']; ?></td>
                                    <td><?php echo $contacto['telefono']; ?></td>
                                    <td>
                                        <a class="btn btn-editar" href="editar.php?id=<?php echo $contacto['id']; ?>">
                                            <i class="fas fa-pen-square"></i>
                                        </a>
                                        <button data-id="<?php echo $contacto['id']; ?>" class="btn btn-eliminar" type="button">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php }
                    } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include 'includes/layouts/footer.php';?>