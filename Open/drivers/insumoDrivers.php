<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
if($prueba){
    require_once "../model/insumoModel.php";
}else{
require_once "./model/insumoModel.php";}
class insumoDrivers extends insumoModel{
    public function agregarInsumoControlador(){
        $id=htmlspecialchars($_POST['id_insumo']);
        $nombre=htmlspecialchars($_POST['nombre_insumo']);
        $proveedor=htmlspecialchars($_POST['proveedor']);
        $presentacion=htmlspecialchars($_POST['presentacion']);
        $stock_min=htmlspecialchars($_POST['stock_min']);
        $actualizar_stock=htmlspecialchars($_POST['actualizar_stock']);
        $marca=htmlspecialchars($_POST['marca_insumo']);
        $costo=htmlspecialchars($_POST['costo']);
        $precio_venta=htmlspecialchars($_POST['precio_venta']);
        if ($_POST['proveedor']=="") {
            $proveedor=0;
        }
        if ($_POST['presentacion']=="") {
            $presentacion=0;
        }
        if ($_POST['stock_min']=="") {
            $stock_min=0;
        }
        if ($_POST['actualizar_stock']=="") {
            $actualizar_stock=0;
        }
        if ($_POST['marca_insumo']=="") {
            $actualizar_stock=0;
        }
       
        if($nombre=="" || $id==""){
            exit();
        }

        if(!preg_match("/^[a-zA-Z]{1,50}$/",$nombre) || !preg_match("/^[0-9]{1,30}$/",$id)){
            echo"no anda";
            exit();
        }
        $check_nombre = principalModel::consultasSimples("SELECT nombre_insumo FROM insumo WHERE nombre_insumo='$nombre'");
        $check_id = principalModel::consultasSimples("SELECT id_insumo FROM insumo WHERE id_insumo='$id'");
        if($check_nombre->rowCount()>0){
            
            exit();
        } elseif ($check_id->rowCount()>0){
           
            exit();
        };
        
        $datos_ingresar_principal=[
            "nombre"=>$nombre,
            "id"=>$id,
        ];
      

        $datos_ingresar_info=[
            "nombre"=>$nombre,
            "id"=>$id,
            "proveedor"=>$proveedor,
            "presentacion"=>$presentacion,
            "stock_min"=>$stock_min,
            "actualizar_stock"=>$actualizar_stock,
            "marca"=>$marca,
            "costo"=>$costo,
            "precio_venta"=>$precio_venta
        ];
        $agregar=insumoModel::agregarInsumo($datos_ingresar_principal);
        $agregar2=insumoModel::agregarInsumoInfo($datos_ingresar_info);

        if($agregar->rowCount()> 0 && $agregar2->rowCount()> 0){
            $alerta = [
                "respuesta" => true,
                "Alerta" => "limpiar",
                "Titulo" => "Genial",
                "Texto" => "El Insumo se agrego correctamente",
                "Tipo" => "success"
            ];
            header('Content-Type: application/json');
            echo json_encode($alerta);
    }
    }
    public function agregarStockControlador(){
        $id=htmlspecialchars($_POST['id_insumo']);
        $nombre=htmlspecialchars($_POST['nombre_insumo']);
        $stock_ingresado=htmlspecialchars($_POST['stock_ingresado']);
        $fecha=date("Y-m-d H:i:s");

        $check_nombre = principalModel::consultasSimples("SELECT nombre_insumo FROM insumo WHERE nombre_insumo='$nombre'");
        $check_id = principalModel::consultasSimples("SELECT id_insumo FROM insumo WHERE id_insumo='$id'");
        if($check_nombre->rowCount()!=1){
            
            exit();
        }elseif($check_id->rowCount()!=1){
          
            exit();
        };

        $datos_ingresar=[
            "id"=>$id,
            "nombre"=>$nombre,
            "fecha_ingreso"=>$fecha,
            "stock_ingresado"=>$stock_ingresado
        ];
        $agregar=insumoModel::agregarStockControl($datos_ingresar);
        
        if($agregar->rowCount()> 0){
            $alerta = [
                "respuesta" => true,
                "Alerta" => "limpiar",
                "Titulo" => "Genial",
                "Texto" => "El Insumo se agrego correctamente",
                "Tipo" => "success"
            ];
            header('Content-Type: application/json');
            echo json_encode($alerta);
    }
    }

    public function quitarStockControlador(){
        $id=htmlspecialchars($_POST['id_insumo']);
        $nombre=htmlspecialchars($_POST['nombre_insumo']);
        $stock_usado=htmlspecialchars($_POST['stock_ingresado']);
        $fecha=date("Y-m-d H:i:s");

        $check_nombre = principalModel::consultasSimples("SELECT nombre_insumo FROM insumo WHERE nombre_insumo='$nombre'");
        $check_id = principalModel::consultasSimples("SELECT id_insumo FROM insumo WHERE id_insumo='$id'");
        if($check_nombre->rowCount()!=1){
            echo '<script>
            alert("el insumo no existe");
            </script>';
            exit();
        }elseif($check_id->rowCount()!=1){
            echo '<script>
            alert("el id no existe");
            </script>';
            exit();

        };

        $datos_ingresar=[
            "id"=>$id,
            "nombre"=>$nombre,
            "fecha_usado"=>$fecha,
            "stock_usado"=>$stock_usado
        ];
        $agregar=insumoModel::quitarStockControl($datos_ingresar);
        if($agregar->rowCount()> 0){
            $alerta = [
                "respuesta" => true,
                "Alerta" => "limpiar",
                "Titulo" => "Genial",
                "Texto" => "El Insumo se quito correctamente",
                "Tipo" => "success"
            ];
            header('Content-Type: application/json');
            echo json_encode($alerta);
    }
    }

    public function actualizarInfoInsumoControlador(){
        if ($_POST['id_insumo']!="" && $_POST['nombre_insumo'] != "" ){
            $idAmodificar=htmlspecialchars($_POST['id_insumo']);
            $nombreAmodificar=htmlspecialchars($_POST['nombre_insumo']);
          
            $nombreNuevo=htmlspecialchars($_POST['nombre_insumo_modificado']);
            $proveedor=htmlspecialchars($_POST['proveedor_modificado']);
            $presentacion=htmlspecialchars($_POST['presentacion_modificado']);
            $stock_min=htmlspecialchars($_POST['stock_min_modificado']);
            $actualizar_stock=htmlspecialchars($_POST['actualizar_stock_modificado']);
            $marca=htmlspecialchars($_POST['marca_insumo']);
            $costo=htmlspecialchars($_POST['costo_modificado']);
            $precio_venta=htmlspecialchars($_POST['precio_venta_modificado']);
        }else{
            exit();
        }
        $check_nombre_existe = principalModel::consultasSimples("SELECT nombre_insumo FROM insumo WHERE nombre_insumo='$nombreAmodificar'");
        $check_id_existe = principalModel::consultasSimples("SELECT id_insumo FROM insumo WHERE id_insumo='$idAmodificar'");
        if($check_nombre_existe->rowCount()<1){
            echo '<script>
            alert("el insumo no existe");
            </script>';
            exit();
        }elseif($check_id_existe->rowCount()<1){
            echo '<script>
            alert("el id no existe");
            </script>';
            exit();
        } 

        $check_nombre = principalModel::consultasSimples("SELECT nombre_insumo FROM insumo WHERE nombre_insumo='$nombreNuevo'");
        $resultado=$check_nombre->fetchAll();
       if($resultado[0]['nombre_insumo']!=$nombreNuevo && $check_nombre->rowCount()==1){
            echo '<script>
            alert("el insumo ya existe y no es de este id");
            </script>';
            exit();
        } 

        $datos_ingresar_principal=[
            
            "nombre_actual"=>$nombreAmodificar,
            "id_actual"=>$idAmodificar,
            "nombre"=>$nombreNuevo,
           
        ];     

        $datos_ingresar_info=[
            "nombre"=>$nombreNuevo,
            "id"=>$idAmodificar,
            "proveedor"=>$proveedor,
            "presentacion"=>$presentacion,
            "stock_min"=>$stock_min,
            "actualizar_stock"=>$actualizar_stock,
            "marca"=>$marca,
            "costo"=>$costo,
            "precio_venta"=>$precio_venta
        ];
       
        $actualizar=insumoModel::actualizarInsumo($datos_ingresar_principal);
        $actualizar2=insumoModel::actualizarInsumoInfo($datos_ingresar_info);
        if($actualizar2->rowCount()> 0){
            $alerta = [
                "respuesta" => true,
                "Alerta" => "limpiar",
                "Titulo" => "Genial",
                "Texto" => "El Insumo se actualizo correctamente",
                "Tipo" => "success"
            ];
            header('Content-Type: application/json');
            echo json_encode($alerta);
    }else{
        $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Error inesperado aca",
            "Texto" => "No se pudo registrar el usuario",
            "Tipo" => "error"
        ];
        header('Content-Type: application/json');
        echo json_encode($alerta);
    }
    }
    public function listadoInsumos($pagina,$registro,$url){
       
        $pagina=htmlspecialchars($pagina);
        $registro=htmlspecialchars($registro);
        $url=htmlspecialchars($url);
        $url=SERVERURL.$url."/";
        $pagina=(isset($pagina) && $pagina > 0) ? (int)$pagina : 1;
        $inicio=($pagina>0)?($pagina * $registro - $registro):0;

      
        $tabla="";
        
        //$consulta="SELECT insumo_id.insumo, insumo.insumo_nombre, insumo_info.stock_min FROM insumo_info INNER JOIN insumo ON insumo_id.insumo=insumo_id.insumo_info";
        $consulta_total = "
        SELECT COUNT(*) as total_registros
        FROM 
            insumo
        INNER JOIN 
            insumo_info ON insumo.id_insumo = insumo_info.id_insumo";

        $conexion2=principalModel::conectar();
        $stmt_total = $conexion2->query($consulta_total);
        $total_registros = $stmt_total->fetch(PDO::FETCH_ASSOC)['total_registros'];
       
        
        $consulta = "
        SELECT  
            insumo.id_insumo, 
            insumo.nombre_insumo, 
            insumo_info.marca_insumo, 
            insumo_info.proveedor,
            insumo_info.presentacion_insumo,   
            insumo_info.stock_min,  
            insumo_info.precio_venta     
        FROM 
            insumo
        INNER JOIN 
            insumo_info ON insumo.id_insumo = insumo_info.id_insumo
            ORDER BY insumo.id_insumo ASC LIMIT $inicio,$registro";
        $conexion=principalModel::conectar();
        $datos=$conexion->query($consulta);
        $datos= $datos->fetchAll();
        $total= $conexion->query("SELECT FOUND_ROWS()");
        $total= (int)$total->fetchColumn();
        $nPaginas=ceil($total/$registro);

     
      
        //echo $tabla;
        $tabla.="   
        <article>
              <h4>Lista de Productos</h4>
            <div>
                <table class='table'>
            <tr>
                <th>Nombre</th>
               <th>ID</th>
                <th>Marca</th>          
                <th>Unidad</th>
                <th>Stock MIn</th>
                <th>Precio venta</th>
               
                                 
            <tr>";
        foreach ($datos as $rows) {
                $tabla.="<tr>
                <th>".$rows['nombre_insumo']."</th>
                <th>".$rows['id_insumo']."</th>
                <th>".$rows['marca_insumo']."</th>
                <th>".$rows['presentacion_insumo']."</th>
                <th>".$rows['stock_min']."</th>   
                <th>".$rows['precio_venta']."</th>              
            
                
            </tr>";
                     # code...
        }
        $tabla.="    </table>";

        if($total>=1 && $pagina <= $nPaginas){
            $tabla.=principalModel::paginador($pagina,$nPaginas,$url,3,$total_registros,$registro);
        }else{
            $tabla.="<a href=".$url.">volver</>";
        }

        $tabla.="      </div>
                </article>";
               
               
   
       return $tabla;

    }

    public function stockDisponibleInsumo($pagina,$registro,$url){

        $pagina=htmlspecialchars($pagina);
        $registro=htmlspecialchars($registro);
        $url=htmlspecialchars($url);
        $url=SERVERURL.$url."/";
        $pagina=(isset($pagina) && $pagina > 0) ? (int)$pagina : 1;
        $inicio=($pagina>0)?($pagina * $registro - $registro):0;
       $tabla="";

       $consulta_total = "
       SELECT COUNT(*) as total_registros
       FROM 
           insumo
       INNER JOIN 
           insumo_info ON insumo.id_insumo = insumo_info.id_insumo";

       $conexion2=principalModel::conectar();
       $stmt_total = $conexion2->query($consulta_total);
       $total_registros = $stmt_total->fetch(PDO::FETCH_ASSOC)['total_registros'];
        
        $consulta = "
        SELECT  
            insumo.id_insumo, 
            insumo.nombre_insumo, 
            insumo_info.marca_insumo, 
            insumo_info.proveedor,
            insumo_info.presentacion_insumo,   
            insumo_info.stock_min,
            insumo_info.stock_actual

        FROM 
            insumo
        INNER JOIN 
            insumo_info ON insumo.id_insumo = insumo_info.id_insumo
            ORDER BY insumo.id_insumo ASC LIMIT $inicio,$registro";
        $conexion=principalModel::conectar();
        $datos=$conexion->query($consulta);
        $datos= $datos->fetchAll();
        $total= $conexion->query("SELECT FOUND_ROWS()");
        $total= (int)$total->fetchColumn();
        $nPaginas=ceil($total/$registro);
             
       // echo $tabla;
        $tabla.="   
        <article>
              <h4>Lista de insumos</h4>
            <div>
                <table class='table'>
            <tr>
                <th>Nombre</th>
               <th>ID</th>
                <th>Marca</th>          
                <th>Stock MIn</th>
                <th>Stock Actual</th>
                <th>Generar compra</th>
               
                                 
            <tr>";
        foreach ($datos as $rows) {
                $tabla.="<tr>
                <th>".$rows['nombre_insumo']."</th>
                <th>".$rows['presentacion_insumo']."</th>
                <th>".$rows['marca_insumo']."</th>
                <th>".$rows['stock_min']."</th>    
                <th>".$rows['stock_actual']."</th>
                <th><a href=''>COMPRAR</a></th> 
                               
            
                
            </tr>";
                     # code...
        }
        $tabla.="    </table>";

        if($total>=1 && $pagina <= $nPaginas){
            $tabla.=principalModel::paginador($pagina,$nPaginas,$url,5,$total_registros,$registro);
        }else{
            $tabla.="<a href=".$url.">volver</>";
        }

        $tabla.="      </div>
                </article>";
               
               
   
       return $tabla;

    }
}

?>