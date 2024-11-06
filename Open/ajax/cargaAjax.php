<?php
$prueba=true;
if(isset($_POST['nuevo_insumo']) || (isset($_POST['ingreso_insumo'])) || (isset($_POST['quitar_insumo'])) || (isset($_POST['insumo_actualizar'])) || (isset($_POST['insumo_actualizado'])) || (isset($_POST['id_insumo']))){
    require_once "../drivers/insumoDrivers.php";
    $carga_insumo=new insumoDrivers();
    if(isset($_POST['nuevo_insumo'])){
        echo $carga_insumo->agregarInsumoControlador();
     
    }
    if(isset($_POST['ingreso_insumo'])){
    $cargar_insumo=new insumoDrivers();
    echo   $carga_insumo->agregarStockControlador();    
    }
    if(isset($_POST['quitar_insumo'])){
        $sacar_insumo= new insumoDrivers();
        echo $sacar_insumo->quitarStockControlador();
    }
    if (isset($_POST['insumo_actualizar']) ) {
        $actualizar_insumo=new insumoDrivers();
        echo $actualizar_insumo-> actualizarInfoInsumoControlador();
       
          
    }
}
    
   
