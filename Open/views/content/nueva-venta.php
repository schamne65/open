<?php
$peticionAjax=true;
?>
<style>
    .boton-mas-venta{
        padding: 10px ;
        background: #f2f2f2;
        cursor: pointer;
        border: 1px solid ;
        border-radius: 5px;

    }
</style>
<div class="form-grid">
<div class="div-search" >
<h2>Vender Producto</h2>
    <div class="div-search">
        <h4>Seleccionar por </h4>
        <form  class="formularioAjax" action="<?php echo SERVERURL ; ?>ajax/cargaAjax.php" method="POST" data-form="update">
            <input type="hidden" name="producto_vendido" id="producto_vendido">
            <label for="nombre_insumo">Nombre</label>
            <input type="text" id="nombre_insumo" name="nombre_insumo">
            <label for="id_insumo">ID</label>
            <input type="text" id="id_insumo" name="id_insumo">
            <label for="precio_producto">Precio</label>
            <input type="text" id="precio_producto" name="precio_producto">
            <label for="cantidad_producto">Cantidad</label>
            <input type="text" id="cantidad_producto" name="cantidad_producto">
            <span class="boton-mas-venta">✔</span>
    </form>
</div>

        <div class="ventas">
        </div>
        <div id="total">

        </div>
</div>
<a class="home" onclick="history.back()"><span class="icon-undo2"></span></a>

<?php
?>
