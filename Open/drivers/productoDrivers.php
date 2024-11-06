<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
if($prueba){
    require_once "../model/productoModel.php";
}else{
require_once "./model/productoModel.php";}

class productoDrivers extends productoModel{
    public function agregarProductoControlar(){
      

        $id=htmlspecialchars($_POST['id_producto_nuevo']);
        $nombre=htmlspecialchars($_POST['nombre_producto']);
        

        $check_nombre= principalModel::consultasSimples('SELECT nombre_producto FROM producto WHERE nombre_producto="$nombre"');
        if($check_nombre->rowCount()>0){
            
            exit();
        }

        $datos_ingresar=[
            "id"=>$id,
            "nombre"=>$nombre
        ];
        $agregar=productoModel::agregar_producto($datos_ingresar);
        $i=1;
        while (isset($_POST['id-insumo-'.$i]) && isset($_POST['nombre-insumo-'.$i]) && isset($_POST['cantidad-necesaria-'.$i])) {

            $insumoID1=htmlspecialchars($_POST['id-insumo-'.$i]);
            $insumoNombre1=htmlspecialchars($_POST['nombre-insumo-'.$i]);
            $insumoCantidad1=htmlspecialchars($_POST['cantidad-necesaria-'.$i]);
            $datos_ingresar2=[
                "id"=>$id,
                "nombre"=>$nombre,
                "insumo-id-1"=>$insumoID1,
                "insumo-nombre-1"=>$insumoNombre1,
                "insumo-cantidad-1"=>$insumoCantidad1
            ];
            $agregar2=productoModel::agregar_producto_info($datos_ingresar2);

            $i++;
        }
       

        
       
        

        if($agregar->rowCount()> 0 ){
            $alerta = [
                "respuesta" => true,
                "Alerta" => "limpiar",
                "Titulo" => "Genial",
                "Texto" => "El Producto se agrego correctamente",
                "Tipo" => "success"
            ];
            header('Content-Type: application/json');
            echo json_encode($alerta);
    }
      
    }
    public function eliminarInsumoDelProducto(){
        $id_producto=htmlspecialchars($_POST['id_producto']);
        $id=htmlspecialchars($_POST['id_insumo_db']);
        $nombre=htmlspecialchars($_POST['nombre_insumo_db']);

        $datosEliminar=[
            "id-producto"=>$id_producto,
            "id"=>$id,
            "nombre"=>$nombre
        ];
        $eliminar=productoModel::eliminarInsumo($datosEliminar);

        if($eliminar=true ){
            $alerta = [
                "respuesta" => true,
                "Alerta" => "limpiar",
                "Titulo" => "Genial",
                "Texto" => "El insumo se elimino correctamente",
                "Tipo" => "success"
            ];
            header('Content-Type: application/json');
            echo json_encode($alerta);
            exit();
    }
    }

    public function actualizarAgregarProducto(){
       $id=htmlspecialchars($_POST['id_producto']);
       $nombre=htmlspecialchars($_POST['nombre_producto']);
       
    
    $i=1;
    while (isset($_POST['id-insumo-'.$i]) && isset($_POST['nombre-insumo-'.$i]) && isset($_POST['cantidad-necesaria-'.$i])) {
      
        $insumoID1=htmlspecialchars($_POST['id-insumo-'.$i]);
        $insumoNombre1=htmlspecialchars($_POST['nombre-insumo-'.$i]);
        $insumoCantidad1=htmlspecialchars($_POST['cantidad-necesaria-'.$i]);
        $datos_ingresar2=[
            "id"=>$id,
            "nombre"=>$nombre,
            "insumo-id-1"=>$insumoID1,
            "insumo-nombre-1"=>$insumoNombre1,
            "insumo-cantidad-1"=>$insumoCantidad1
        ];
        $agregar3=productoModel::agregar_producto_info($datos_ingresar2);

        if($agregar3==true ){
            $alerta = [
                "respuesta" => true,
                "Alerta" => "recargar",
                "Titulo" => "Genial",
                "Texto" => "El Producto actualizo correctamente",
                "Tipo" => "success"
            ];
            header('Content-Type: application/json');
            echo json_encode($alerta);
            exit();
    }

        $i++;
    }    
    }

    public function actualizarProducto(){

        $id=htmlspecialchars($_POST['id_producto']);
        $nombre=htmlspecialchars($_POST['nombre_producto']);
        
     
     $i=1;
     while (isset($_POST['id-insumo-db-'.$i]) && isset($_POST['nombre-insumo-db-'.$i]) && isset($_POST['cantidad-insumo-db-'.$i])) {
       
         $insumoID1=htmlspecialchars($_POST['id-insumo-db-'.$i]);
         $insumoNombre1=htmlspecialchars($_POST['nombre-insumo-db-'.$i]);
         $insumoCantidad1=htmlspecialchars($_POST['cantidad-insumo-db-'.$i]);
         $datos_ingresar2=[
             "id"=>$id,
             "nombre"=>$nombre,
             "insumo-id-1"=>$insumoID1,
             "insumo-nombre-1"=>$insumoNombre1,
             "insumo-cantidad-1"=>$insumoCantidad1
         ];
         $agregar2=productoModel::actualizar_producto_info($datos_ingresar2);
   
         $i++;

         if($agregar2==true ){
            $alerta = [
                "respuesta" => true,
                "Alerta" => "recargar",
                "Titulo" => "Genial",
                "Texto" => "El Producto actualizo correctamente",
                "Tipo" => "success"
            ];
            header('Content-Type: application/json');
            echo json_encode($alerta);
            exit();
    }else{
        $alerta = [
            "respuesta" => false,
            "Alerta" => "recargar",
            "Titulo" => "Precaución",
            "Texto" => "El Producto no se actualizo",
            "Tipo" => "warning"
        ];
        header('Content-Type: application/json');
        echo json_encode($alerta);
        exit();
    }
     }    

    }
}
