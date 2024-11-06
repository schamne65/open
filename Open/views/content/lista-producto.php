
<a class="home" onclick="history.back()"><span class="icon-undo2"></span></a>
<?php

require_once "./drivers/insumoDrivers.php";

//$prueba=true;
$lista_insumo = new insumoDrivers();
echo $lista_insumo->listadoInsumos($pagina[1],9,$pagina[0]);



?>