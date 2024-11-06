<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
require_once "principal.php";
class insumoModel extends principalModel{
    protected static function agregarInsumo($datos){
    
        $consulta=principalModel::conectar()->prepare("INSERT INTO insumo (id_insumo,nombre_insumo) VALUES (?, ?)");
        $resultado=$consulta->execute([$datos['id'],$datos['nombre']]);
        return $consulta;
        

    }
    protected static function agregarInsumoInfo($datos2){
 
        $consulta2=principalModel::conectar()->prepare("INSERT INTO insumo_info (id_insumo,proveedor,presentacion_insumo,stock_min,stock_actual,nombre_insumo,marca_insumo,costo,precio_venta) VALUES ( ?,?, ?, ?, ?, ?, ?,?,?)");
        $resultado2=$consulta2->execute([$datos2['id'],$datos2['proveedor'],$datos2['presentacion'],$datos2['stock_min'],$datos2['actualizar_stock'],$datos2['nombre'],$datos2['marca'],$datos2['costo'],$datos2['precio_venta']]);
        return $consulta2;
    }

    protected static function agregarStockControl($datos3){
       
        $consulta=principalModel::conectar()->prepare("INSERT INTO insumo_ingreso (id_insumo,stock_insumo_ingresado,fecha_ingreso) VALUES (?, ?, ?)");
        $resultado=$consulta->execute([$datos3['id'],$datos3['stock_ingresado'],$datos3['fecha_ingreso']]);
        

        $consulta2=principalModel::conectar()->prepare("SELECT stock_actual FROM insumo_info WHERE id_insumo=?");
        $consulta2->execute([$datos3['id']]);
        $fila=$consulta2->fetch(PDO::FETCH_ASSOC);
        $stock_actual=$fila['stock_actual'];
        
        
        $stock_actualizado=$stock_actual+$datos3['stock_ingresado'];

        $consulta3=principalModel::conectar()->prepare("UPDATE insumo_info SET stock_actual=? WHERE id_insumo=?");
        $resultado3=$consulta3->execute([$stock_actualizado,$datos3['id']]);
        
        return $consulta;
        }

    protected static function quitarStockControl($datos4){
            
            $consulta=principalModel::conectar()->prepare("INSERT INTO insumo_usado (id_insumo,stock_insumo_usado,fecha_usado) VALUES (?, ?, ?)");
            $resultado=$consulta->execute([$datos4['id'],$datos4['stock_usado'],$datos4['fecha_usado']]);
            
    
            $consulta2=principalModel::conectar()->prepare("SELECT stock_actual FROM insumo_info WHERE id_insumo=?");
            $consulta2->execute([$datos4['id']]);
            $fila=$consulta2->fetch(PDO::FETCH_ASSOC);
            $stock_actual=$fila['stock_actual'];
            
            
            $stock_actualizado=$stock_actual-$datos4['stock_usado'];
    
            $consulta3=principalModel::conectar()->prepare("UPDATE insumo_info SET stock_actual=? WHERE id_insumo=?");
            $resultado3=$consulta3->execute([$stock_actualizado,$datos4['id']]);
            
            return $consulta;
        }
    
     public static function obtenerInsumoPorId($id) {
                $consulta = principalModel::conectar()->prepare("SELECT * FROM insumo WHERE id_insumo = ?");
                $consulta->execute([$id]);
        
                $insumo2 = $consulta->fetch(PDO::FETCH_ASSOC);
                if($insumo2){
                $consulta = principalModel::conectar()->prepare("SELECT * FROM insumo_info WHERE id_insumo = ?");
                $consulta->execute([$id]);
        
                $insumo = $consulta->fetch(PDO::FETCH_ASSOC);
                if ($insumo) {
                    return $insumo;
                } else {
                    return false; // Asegúrate de manejar este caso en la lógica del controlador
                }}else{
                    return false;
                }
        }
        
    public static function obtenerInsumoPornombre($id) {
                $consulta = principalModel::conectar()->prepare("SELECT * FROM insumo WHERE nombre_insumo = ?");
                $consulta->execute([$id]);
        
                $insumo2 = $consulta->fetch(PDO::FETCH_ASSOC);
                if($insumo2){
                $consulta = principalModel::conectar()->prepare("SELECT * FROM insumo_info WHERE nombre_insumo = ?");
                $consulta->execute([$id]);
        
                $insumo = $consulta->fetch(PDO::FETCH_ASSOC);
                if ($insumo) {
                    return $insumo;
                } else {
                    return false; // Asegúrate de manejar este caso en la lógica del controlador
                }}else{
                    return false;
                }            
        }
        
    
        protected static function actualizarInsumo($datos4){          
         
                  
            $consulta=principalModel::conectar()->prepare("UPDATE insumo SET nombre_insumo=? WHERE id_insumo=? and nombre_insumo=?");
            $resultado=$consulta->execute([$datos4['nombre'],$datos4['id_actual'],$datos4['nombre_actual']]);
           
            return $consulta;          
    
        }
        protected static function actualizarInsumoInfo($datos5){
      
            $consulta=principalModel::conectar()->prepare("UPDATE insumo_info SET proveedor=?,presentacion_insumo=?,stock_min=?,stock_actual=?,nombre_insumo=?, marca_insumo=? ,costo=?,precio_venta=? WHERE id_insumo=?");
            $resultado2=$consulta->execute([$datos5['proveedor'],$datos5['presentacion'],$datos5['stock_min'],$datos5['actualizar_stock'],$datos5['nombre'],$datos5['marca'],$datos5['costo'],$datos5['precio_venta'],$datos5['id']]);
            return $consulta;
        }    
            

    }


?>