<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
require_once "principal.php";

class productoModel extends principalModel{
    protected static function agregar_producto($datos){
    $consulta=principalModel::conectar()->prepare("INSERT INTO producto (id_producto,nombre_producto) VALUES (?, ?)");
    $resultado=$consulta->execute([$datos['id'],$datos['nombre']]);
    return $consulta;
    }

    protected static function agregar_producto_info($datos1){
        $consulta=principalModel::conectar()->prepare("INSERT INTO producto_info (id_producto,nombre_producto,id_insumo,nombre_insumo,cantidad_insumo,insumo_cancelado) VALUES (?, ?, ?, ?, ?, ?)");
        $resultado=$consulta->execute([$datos1['id'],$datos1['nombre'],$datos1['insumo-id-1'],$datos1['insumo-nombre-1'],$datos1['insumo-cantidad-1'],0]);
        return $consulta;
        }
    protected static function traerdatosproducto($datos2){
        $consulta=principalModel::conectar()->prepare(" SELECT * FROM producto_info
        WHERE id_producto= ? AND nombre_producto= ?");
        $resultado=$consulta->execute([$datos2['id'],$datos2['nombre']]);
        return $consulta;
    }    

    public static function obtenerProductoPorId($id,$tipoDato) {
        $consulta = principalModel::conectar()->prepare("SELECT    
    p.id_producto, 
    p.nombre_producto, 
    pi.id_insumo, 
    pi.nombre_insumo, 
    pi.cantidad_insumo,
    pi.insumo_cancelado
    FROM
    producto p
    JOIN
    producto_info pi ON p.id_producto=pi.id_producto
      WHERE p.$tipoDato= ?" );
        $consulta->execute([$id]);

        $insumo2 = $consulta->fetchAll(PDO::FETCH_ASSOC);
      
        if($insumo2){
    return $insumo2;
    }else{
            return false;
        }
}
public static function obtenerNombrePorId($id) {
    $consulta3 = principalModel::conectar()->prepare("SELECT nombre_producto FROM producto  WHERE id_producto = ?");
    $consulta3->execute([$id]);
    
    $insumo4 = $consulta3->fetchAll(PDO::FETCH_ASSOC);
 
    if($insumo4){
return $insumo4;
}else{
        return false;
    }
}

    protected static function eliminarInsumo($datos3){
       
        $consulta=principalModel::conectar()->prepare("UPDATE producto_info SET insumo_cancelado = 1 WHERE id_producto= ? AND id_insumo=?");
        $resultado=$consulta->execute([$datos3['id-producto'],$datos3['id']]);
        return $consulta;
    }
protected static function actualizar_producto_info($datos4){
    $consulta1=principalModel::conectar()->prepare("SELECT cantidad_insumo FROM producto_info WHERE id_producto= ? AND id_insumo=? AND insumo_cancelado=0");
    $consulta1->execute([$datos4['id'], $datos4['insumo-id-1']]);
    $insumo=$consulta1->fetch(PDO::FETCH_ASSOC);
   
   if($insumo['cantidad_insumo'] != $datos4['insumo-cantidad-1']){
 
  $consulta=principalModel::conectar()->prepare("UPDATE producto_info SET cantidad_insumo=? WHERE id_producto= ? AND id_insumo=? AND insumo_cancelado=0");
    $resultado=$consulta->execute([$datos4['insumo-cantidad-1'],$datos4['id'], $datos4['insumo-id-1']]);
    return $consulta;
   }else{ 
    $consulta=false;
   return $consulta;
   }  

}    
}
