<?php
    $prueba=false;
    require_once "./views/include/head.php";

    require_once "./drivers/viewsDrivers.php";
   
    $instancia_vista=new viewsControl();
    $vistas=$instancia_vista->obtener_vistas_controlador();
    if ($vistas=="login" || $vistas=="404") {
        require_once "./views/content/".$vistas.".php";
    } else {
        $pagina=explode("/", $_GET['views']);
        require_once "./views/include/header.php";
        require_once "./views/include/sidebar.php";?>
         <section class="main-container">
         <?php   
             include $vistas;
            ?>
        </section>
       <?php require_once "./views/include/footer.php";
    }
    
    require_once "./views/include/bottom.php";