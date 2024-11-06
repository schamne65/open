<?php
$prueba=true;
  require_once "../drivers/insumoDrivers.php";
  require_once "../drivers/productoDrivers.php";

  if (isset($_POST['id_insumo'])) {
    header('Content-Type: application/json'); 
    $id_insumo = $_POST['id_insumo'];

   
    $insumo = insumoModel::obtenerInsumoPorId($id_insumo);

    if ($insumo) {
       
       echo json_encode($insumo);
       exit();
    }else {
       
        echo json_encode(['error' => 'Insumo no encontrado']);
        exit();
    }

} elseif (isset($_POST['nombre_insumo'])) {
    header('Content-Type: application/json'); // Asegúrate de que PHP devuelva JSON
    $nombre_insumo = $_POST['nombre_insumo'];

    
    $insumo = insumoModel::obtenerInsumoPornombre($nombre_insumo);

    if ($insumo) {
     
       echo json_encode($insumo);
       exit();
    } else {
        
        echo json_encode(['error' => 'Insumo no encontrado']);
        exit();
    }
}

        //aca otra cosa

        if (isset($_POST['id_producto'])) {
           
            header('Content-Type: application/json');
            
            $id_producto = $_POST['id_producto'];
            $tipoDato="id_producto";
           $producto = productoModel::obtenerProductoPorId($id_producto,$tipoDato);
            
            if ($producto) {
                echo json_encode($producto);
             
            } else {
                echo json_encode(['error' => 'Producto no encontrado']);
            }
            exit();
        } elseif (isset($_POST['nombre_producto'])) {
            $nombre_producto=$_POST['nombre_producto'];
            $tipoDato="nombre_producto";
            $producto = productoModel::obtenerProductoPorId($nombre_producto,$tipoDato);
            
            if ($producto) {
                echo json_encode($producto);
             
            } else {
                echo json_encode(['error' => 'Producto no encontrado']);
            }
            exit();
        }




        //aca
        