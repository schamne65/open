<?php
$prueba=true;



if(isset($_POST['producto_vendido'])){
    require_once "../drivers/ventasDrivers.php";
    if(isset($_POST['producto_vendido'])){
        $ventas=new ventasDrivers();
        echo $ventas ->agregarVentaDrivers();
    }

}