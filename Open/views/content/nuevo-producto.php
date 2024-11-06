<?php
$peticionAjax=true;
?>
<div class="form-grid" >
    <h2>Nuevo Producto</h2>
    <form  class="formularioAjax" action="<?php echo SERVERURL ; ?>ajax/cargaAjax.php" method="POST" data-form="save">
   
        <input id="nuevo_insumo" name="nuevo_insumo" type="hidden" value="nuevo_insumo">
  
        <div class="div-input">
        <label for="nombre_insumo">Nombre</label>
        <input id="nombre_insumo" name="nombre_insumo" type="text" pattern="[a-zA-Z]{1,50}" class="focus" >
        </div>
        <div class="div-input">
        <label for="id_insumo_nuevo" >ID</label>
        <input type="text" id="id_insumo_nuevo" name="id_insumo">
        </div>
        <div class="div-input">
        <label for="marca_insumo">Marca</label>
        <input type="text" id="marca_insumo" name="marca_insumo">
        </div>
        <div class="div-input">
        <label for="proveedor">Proveedor</label>
        <input type="text" name="proveedor" id="proveedor">
        </div>
        <div class="div-input">
        <label for="presentacion">Presentacion</label>
        <select name="presentacion" id="presentacion">
            <option value="KG">Kg</option>
            <option value="L">L</option>
            <option value="UNIDAD">Unidad</option>
        </select>
        </div>
        <div class="div-input">
        <label for="stock_min">Stock Min</label>
        <input type="text" name="stock_min" id="stock_min">
        </div>
        <div class="div-input">
        <label for="actualizar_stock">Actualizar Stock</label>
        <input type="text" name="actualizar_stock" id="actualizar_stock">
        </div>
        <div class="div-input">
        <label for="costo">Costo</label>
        <input type="text" name="costo" id="costo">
        </div>
        <div class="div-input">
        <label for="precio_venta">Precio de Venta</label>
        <input type="text" name="precio_venta" id="precio_venta">
        </div>
        <div class="div-input">
        <input type="submit" value="Cargar" class="submit">
        </div>
    </form>
</div>
<a class="home" onclick="history.back()"><span class="icon-undo2"></span></a>

<?php
?>