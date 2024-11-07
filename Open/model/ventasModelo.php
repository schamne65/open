<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
require_once "principal.php";

class ventasModelo extends  principalModel{
    protected static function agregarVentas($datos){
        $consulta=principalModel::conectar()->prepare("INSERT INTO ventas (id_venta,id_producto,nombre_producto,cantidad_vendida, precio) values(?,?,?,?,?)");
        $resultado=$consulta->execute([$datos['id_venta'],$datos['id_producto'],$datos['nombre_producto'],$datos['cantidad_vendida'],$datos['precio']] );
        return $consulta;
    }
}