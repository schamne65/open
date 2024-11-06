<?php


include_once './config/primary.php';
$body['class'] = "";


if (isset($_GET['views']) && $_GET['views'] != "home/") {
    $body['class'] .= "interior";
}

if (isset($_GET['views']) && (
    preg_match('/^lista-/', $_GET['views']) ||
    preg_match('/^insumo-disponible/', $_GET['views']) ||
    preg_match('/^info-/', $_GET['views'])
)) {
    $body['class'] .= " lists";
}

if (isset($_GET['views']) && (
    preg_match('/^new-product/', $_GET['views']) ||
    preg_match('/^modific/', $_GET['views'])
)) {
    $body['class'] .= " products";
}

if (isset($_GET['views']) && (
    preg_match('/^nueva-venta/', $_GET['views']) 

)) {
    $body['class'] .= " ventas";
}


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/icon/style.css">
    <title>Sistema</title>
</head>
<body class="grid-container <?php echo $body['class']; ?>">
    