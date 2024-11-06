<?php
class viewsModel{
protected static function obtener_vistas_modelo($vistas){
        $listsViews=['home','productos','ventas','proveedores','clientes','usuarios','tareas','lista-producto','nuevo-producto','actualizar-producto','ingresar-producto','producto-disponible','consumo-interno-producto','nueva-venta'];
        if(in_array($vistas,$listsViews)){
            if(file("./views/content/".$vistas.".php")){
                $contenido="./views/content/".$vistas.".php";
            } else{
                $contenido="404";
                } 
             }elseif($vistas=="login" || $vistas=="index"){
                $contenido="login";
            }else{
                $contenido="404";
            }

            return $contenido;
        }
    };
