<?php

    require_once './model/viewsModel.php';

    class viewsControl extends viewsModel{
        public function obtener_plantilla_controlador(){
            return require_once "./views/plantilla.php";
        }
        public function obtener_vistas_controlador(){
            if (isset($_GET['views'])) {
                 $ruta=explode("/", $_GET['views']);
                 $respuesta=viewsModel::obtener_vistas_modelo($ruta[0]);
            } else {
                $respuesta="login";
            }
            return $respuesta;
        }
    }