<?php
?>
<div class="form-grid">
<h2>Modificar Producto</h2>
    <div class="div-search">
        <h4>Seleccionar por </h4>
        <form  class="formularioAjax" action="<?php echo SERVERURL ; ?>ajax/cargaAjax.php" method="POST" data-form="update">
            <input type="hidden" name="insumo_actualizar" id="insumo_actualizar">
            <label for="nombre_insumo">Nombre</label>
            <input type="text" id="nombre_insumo" name="nombre_insumo">
            <h4>o</h4>
            <label for="id_insumo">ID</label>
            <input type="text" id="id_insumo" name="id_insumo">
            <span>🔍</span>
        

      

  

<span class="span-separator">-----------------------------------------------------</span>
       
        <input type="hidden" name="insumo_actualizado" id="insumo_actualizado">
        <div class="div-input">
        <label for="nombre_insumo_modificado">Nombre</label>
        <input type="text" id="nombre_insumo_modificado" name="nombre_insumo_modificado" >
        </div>
        <div class="div-input">
        <label for="marca_insumo">Marca</label>
        <input type="text" id="marca_insumo" name="marca_insumo">
        </div>
        <div class="div-input">
        <label for="proveedor_modificado">Proveedor</label>
        <input type="text" id="proveedor_modificado" name="proveedor_modificado">
        </div>
        <div class="div-input">
        <label for="presentacion_modificado">Presentacion</label>
        <select id="presentacion_modificado" name="presentacion_modificado">
            <option value="KG">Kg</option>
            <option value="L">L</option>
            <option value="UNIDAD">Unidad</option>
        </select>
        </div>
        <div class="div-input">
        <label for="stock_min_modificado">Stock Min</label>
        <input type="text" id="stock_min_modificado" name="stock_min_modificado">
        </div>
        <div class="div-input">
        <label for="actualizar_stock_modificado">Actualizar Stock</label>
        <input type="text" id="actualizar_stock_modificado" name="actualizar_stock_modificado">
        </div>
        <div class="div-input">
        <label for="costo_modificado">Actualizar Costo</label>
        <input type="text" id="costo_modificado" name="costo_modificado">
        </div>
        <div class="div-input">
        <label for="precio_venta_modificado">Actualizar Precio Venta</label>
        <input type="text" id="precio_venta_modificado" name="precio_venta_modificado">
        </div>
        
        <div class="div-input">
        <input type="submit" value="Cargar" class="submit">
        </div>
    </form>
</div>
<a class="home" onclick="history.back()"><span class="icon-undo2"></span></a>
<script>

</script>

<?php
?>