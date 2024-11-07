
<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
if($prueba){
    require_once "../model/ventasModelo.php";
}else{
require_once "./model/ventasModelo.php";}

class ventasDrivers extends ventasModelo{
    public function agregarVentaDrivers(){
        $i=1;
        while (isset($_POST['id-producto-'.$i]) && isset($_POST['nombre-producto-'.$i]) && isset($_POST['cantidad-vendida-'.$i])) {
        $id_venta=htmlspecialchars($_POST['id-venta-1']);
        $id=htmlspecialchars($_POST['id-producto-'.$i]);
        $nombre=htmlspecialchars($_POST['nombre-producto-'.$i]);
        $cantidad=htmlspecialchars($_POST['cantidad-vendida-'.$i]);
        $precio_venta=htmlspecialchars($_POST['precio-'.$i]);

        $ingresar=[
            "id_venta"=>$id_venta,
            "id_producto"=>$id,
            "nombre_producto"=>$nombre,
            "cantidad_vendida"=>$cantidad,
            "precio"=>$precio_venta
        ];
        $colocar=ventasModelo::agregarVentas($ingresar);
        $i++;

        if($colocar->rowCount()> 0 ){
            $alerta = [
                "respuesta" => true,
                "Alerta" => "recargar",
                "Titulo" => "Genial",
                "Texto" => "La venta se realizo correctamente",
                "Tipo" => "success"
            ];
            header('Content-Type: application/json');
            echo json_encode($alerta);
    }
        }
        
    }
}
