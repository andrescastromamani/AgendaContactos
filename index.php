<?php include('includes/layouts/header.php');?>
    <div class="contenedor-barra">
        <h1>Agenda de Contactos</h1>
    </div>
    <div class="bg-amarillo contenedor sombra">
        <form action="#" id="contacto">
            <legend>Añada Un Contacto <br><span>Todos los campos son obligatorios</span></legend>
            <div class="campos">
                <div class="campo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" placeholder="Nombre Contacto">
                </div>
                <div class="campo">
                    <label for="empresa">Empresa:</label>
                    <input type="tel" id="empresa" placeholder="Nombre Empresa">
                </div>
                <div class="campo">
                    <label for="telefono">Telefono:</label>
                    <input type="tel" id="telefono" placeholder="Numero Telefono">
                </div>
                <div class="campo enviar">
                    <input type="submit" value="Añadir">
                </div>
            </div>
        </form>
    </div>
<?php include('includes/layouts/footer.php');?>