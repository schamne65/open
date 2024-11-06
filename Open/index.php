<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');

    require_once "./drivers/viewsDrivers.php";
    $plantilla=new viewsControl();
    $plantilla->obtener_plantilla_controlador();