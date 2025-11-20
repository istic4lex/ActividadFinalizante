<?php
session_start();
$url = (object)$_GET;

$reglaSQL = "
SELECT 
    V.id,
    C.nombreCliente AS cliente,
    P.nombreProducto AS producto,
    P.foto AS foto,
    V.cantidadProductos,
    V.modoPago
FROM TVentas V
INNER JOIN TClientes C ON V.idCliente = C.id
INNER JOIN TProductos P ON V.IdProducto = P.id;
";

$base = new PDO("sqlite:../../../bases/productos.db");
$accion = $base->query($reglaSQL);
?>
<html>
<head>
    <title>Ventas</title>
    <meta name="viewport" content="width=device-width,user-scalable=no"/>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css"/>
</head>

<body>
<header>
    <h1>Ventas</h1>
    <nav>
        <button onclick="location.href='/'">Volver al menú</button>
        <button onclick="location.href='/ventas/nuevo/'">Agregar nueva venta</button>
    </nav>
</header>

<?php
if(!$accion):
    printf("<p class='error'>%s</p>", "No hay registros");
else:
    $todos = $accion->fetchAll(PDO::FETCH_OBJ);
    printf("<p>En total hay %d ventas</p>", count($todos));
    foreach($todos as $cadaRegistro):
        include "./render.php";
    endforeach;
endif;
?>
</body>
</html>
