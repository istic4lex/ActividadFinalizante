<?php
session_start();
$id = $_GET["id"];

$base = new PDO("sqlite:../../../bases/productos.db");

$reglaSQL = "
SELECT 
    TVentas.id,
    TClientes.nombreCliente AS nombre,
    TClientes.apellidoCliente AS apellido,
    TProductos.nombreProducto AS producto
FROM TVentas
INNER JOIN TClientes ON TVentas.idCliente = TClientes.id
INNER JOIN TProductos ON TVentas.IdProducto = TProductos.id
WHERE TVentas.id = $id;
";

$accion = $base->query($reglaSQL);
$reg = $accion->fetch(PDO::FETCH_OBJ);
?>

<html>
    
    <title>Eliminar venta</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css" />
</head>

<body>

<header>
    <h1>Eliminar venta</h1>
    <nav>
        <button onclick="history.back()">Volver al menú de ventas</button>
    </nav>
</header>

<h1>
¿Desea eliminar la venta realizada por el cliente 
<strong><?= $reg->nombre . " " . $reg->apellido ?></strong> 
del producto 
<strong><?= $reg->producto ?></strong>?
</h1>

<button onclick="location.href='/ventas/borrar/procesar.php?id=<?= $id ?>'">Confirmar</button>

</body>
</html>
