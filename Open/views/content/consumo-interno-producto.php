<?php
?>
<div class="form-grid">
    <h2>Consumo Interno</h2>
    <form  class="formularioAjax" action="<?php echo SERVERURL ; ?>ajax/cargaAjax.php" method="POST" data-form="save">
        <input type="hidden" id="quitar_insumo" name="quitar_insumo" value="quitar_insumo">
        <div class="div-input">
        <label for="nombre_insumo">Nombre</label>
        <input id="nombre_insumo" name="nombre_insumo" type="text" class="focus" pattern="[A-Za-z]{1,50}" maxlength="20">
        </div>
        <div class="div-input">
        <label for="id_insumo">ID</label>
        <input type="text" id="id_insumo" name="id_insumo">
        </div>
        <div class="div-input">
        <label for="stock_ingresado">Cantidad</label>
        <input type="number" id="stock_ingresado" name="stock_ingresado">
        </div>  
        <div class="div-input">
        <input type="submit" value="Cargar" class="submit">
        </div>
    </form>
</div>
<a class="home" onclick="history.back()"><span class="icon-undo2"></span></a>

<?php
?>