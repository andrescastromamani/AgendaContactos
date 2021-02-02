<?php include('includes/layouts/header.php');?>
    <div class="contenedor-barra">
        <h1>Agenda de Contactos</h1>
    </div>
    <div class="bg-amarillo contenedor sombra">
        <form action="#" id="contacto">
            <legend>Añada Un Contacto <br><span>Todos los campos son obligatorios</span></legend>
            <?php include('includes/layouts/formulario.php');?>
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
                        <tr>
                            <td>Andres</td>
                            <td>acmsoft</td>
                            <td>67425949</td>
                            <td>
                                <a class="btn btn-editar" href="editar.php?id=1">
                                    <i class="fas fa-pen-square"></i>
                                </a>
                                <button class="btn btn-eliminar" type="button" data-id="1">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Andres</td>
                            <td>acmsoft</td>
                            <td>67425949</td>
                            <td>
                                <a class="btn btn-editar" href="editar.php?id=1">
                                    <i class="fas fa-pen-square"></i>
                                </a>
                                <button class="btn btn-eliminar" type="button" data-id="1">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>Andres</td>
                            <td>acmsoft</td>
                            <td>67425949</td>
                            <td>
                                <a class="btn btn-editar" href="editar.php?id=1">
                                    <i class="fas fa-pen-square"></i>
                                </a>
                                <button class="btn btn-eliminar" type="button" data-id="1">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php include('includes/layouts/footer.php');?>