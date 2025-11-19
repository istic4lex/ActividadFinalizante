<?php
session_start();
$form = (object)$_GET;

$reglaSQL = "
UPDATE TVentas SET
    idCliente = '$form->nmidCliente',
    idProducto = '$form->nmIdProducto',
    cantidadProductos = '$form->nmcantidadProductos',
    modoPago = '$form->nmmodoPago'
WHERE id = $form->id
";

$base = new PDO("sqlite:../../../bases/productos.db");
$accion = $base->query($reglaSQL);

header("location:../index.php");
