<?php
    include 'includes/funciones/funciones.php'; 
    include 'includes/layouts/header.php';

    $id = filter_var($_GET['id'],FILTER_VALIDATE_INT);
    if (!$id) {
        die('no es valido el id');
    }
    $resultado = obtenerContacto($id);
    $contacto = $resultado->fetch_assoc();
?>
    <div class="contenedor-barra">
        <div class="contenedor barra">
            <a href="index.php" class="volver">Volver</a>
            <h1>Agenda de Contactos</h1>
        </div>
    </div>
    <div class="bg-amarillo contenedor sombra">
        <form id="contacto" action="#">
            <legend>Edite el Contacto <br><span></span></legend>
            <div class="campos">
            <div class="campo">
                <label for="nombre">Nombre:</label>
                <input 
                    type="text"
                    placeholder="Nombre Contacto" 
                    id="nombre"  
                    value="<?php if ($contacto['nombre']) {
                        echo $contacto['nombre'];
                    }else{
                        echo '';
                    }?>">
            </div>
            <div class="campo">
                <label for="empresa">Empresa:</label>
                <input type="text" placeholder="Nombre Empresa"  id="empresa" value="<?php echo ($contacto['empresa']) ? $contacto['empresa'] : ''; ?>">
            </div>
            <div class="campo">
                <label for="telefono">Telefono:</label>
                <input type="tel" placeholder="Numero Telefono" id="telefono"  value="<?php echo ($contacto['telefono']) ? $contacto['telefono'] : ''; ?>">
            </div>
        </div>
        <div class="campo enviar">
            <?php 
                $textoBtn = $contacto['empresa'] ? 'guardar': 'añadir';
                $accion = $contacto['empresa'] ? 'editar':'crear';
            ?>
            <input type="hidden" id="accion" value="<?php echo $accion?>">
            <input type="hidden" id="id" value="<?php echo $id?>">
            <input type="submit" value="<?php echo $textoBtn?>">
        </div>
        </form>
    </div>
<?php include 'includes/layouts/footer.php';?>