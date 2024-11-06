<?php
$prueba=true;

if(isset($_POST['nuevo_producto']) || isset($_POST['producto_actualizar']) || isset($_POST['id_insumo_db'])){
    require_once '../drivers/productoDrivers.php';
   if(isset($_POST['nuevo_producto'])){
    $nuevo_producto=new productoDrivers();
    echo $nuevo_producto->agregarProductoControlar();
   };

   if(isset($_POST['id_insumo_db'])){
    $eliminarInsumo= new productoDrivers();
    echo $eliminarInsumo->eliminarInsumoDelProducto();
   }
   if (isset($_POST['producto_actualizar'])) {
    $actualizar_agregar_producto= new productoDrivers();
    echo $actualizar_agregar_producto->actualizarAgregarProducto();
    if(isset($_POST['id-producto-1'])){
        $actualizar_producto= new productoDrivers();
       echo $actualizar_producto->actualizarProducto();
        
    } 
  
   
  
   }
 
}