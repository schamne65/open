
   <?php
   require_once "./drivers/insumoDrivers.php";
    $prueba=true;
$lista_stock_disponible = new insumoDrivers();
echo $lista_stock_disponible->stockDisponibleInsumo($pagina[1],9,$pagina[0]);
?>

<a class="home" onclick="history.back()"><span class="icon-undo2"></span></a>
