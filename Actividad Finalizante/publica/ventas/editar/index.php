<?php
session_start();
$id = $_GET["id"];

$base = new PDO("sqlite:../../../bases/productos.db");
$v = $base->query("SELECT * FROM TVentas WHERE id=$id")->fetch(PDO::FETCH_OBJ);
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdn.simplecss.org/simple.css"/>
<title>Editar venta</title>
</head>

<body>
<header>
    <h1>Editar venta</h1>
    <button onclick="history.back()">Volver al menú de ventas</button>
</header>

<form action="/ventas/editar/procesar.php" method="get">

<input type="hidden" name="id" value="<?= $v->id ?>">

<label>Cliente:</label><br>
<?php
$c = $base->query("SELECT * FROM TClientes")->fetchAll(PDO::FETCH_OBJ);
echo "<select name='nmidCliente'>";
foreach($c as $cli):
    $sel = ($cli->id == $v->idCliente) ? "selected" : "";
    echo "<option value='$cli->id' $sel>$cli->nombreCliente</option>";
endforeach;
echo "</select>";
?>

<label>Producto:</label><br>
<?php
$p = $base->query("SELECT * FROM TProductos")->fetchAll(PDO::FETCH_OBJ);
echo "<select name='nmIdProducto'>";
foreach($p as $pro):
    $sel = ($pro->id == $v->idProducto) ? "selected" : "";
    echo "<option value='$pro->id' $sel>$pro->nombreProducto</option>";
endforeach;
echo "</select>";
?>

<label>Cantidad:</label>
<input type="number" name="nmcantidadProductos" value="<?= $v->cantidadProductos ?>">

<label>Modo de pago:</label>
<input type="text" name="nmmodoPago" value="<?= $v->modoPago ?>">

<input type="submit" value="Confirmar">
</form>
</body>
</html>
