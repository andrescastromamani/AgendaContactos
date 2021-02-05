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
    <input type="submit" value="<?php echo $textoBtn?>">
</div>