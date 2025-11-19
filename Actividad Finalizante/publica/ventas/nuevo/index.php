<?php session_start(); ?>
<html>
<head>
    <title>Crear venta</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css"/>
</head>

<body>
<header>
    <h1>Crear venta</h1>
    <nav>
        <button onclick="history.back()">Volver</button>
    </nav>
</header>

<form action="/ventas/nuevo/procesar.php" method="get">

<!-- CLIENTE -->
<article>
    <label for='ididCliente'>Cliente:</label><br>
    <?php
    $base = new PDO("sqlite:../../../bases/productos.db");
    $accion = $base->query("SELECT * FROM TClientes");

    echo "<select id='ididCliente' name='nmidCliente' required>";
    echo "<option selected disabled>Elegí un cliente</option>";

    foreach($accion->fetchAll(PDO::FETCH_OBJ) as $c):
        echo "<option value='$c->id'>$c->nombreCliente</option>";
    endforeach;

    echo "</select>";
    ?>
</article>

<article>
    <label for='idIdProducto'>Producto:</label><br>
    <?php
    $accion = $base->query("SELECT * FROM TProductos");

    echo "<select id='idIdProducto' name='nmIdProducto' required>";
    echo "<option selected disabled>Elegí un producto</option>";

    foreach($accion->fetchAll(PDO::FETCH_OBJ) as $p):
        echo "<option value='$p->id'>$p->nombreProducto</option>";
    endforeach;

    echo "</select>";
    ?>
</article>

<article>
    <label for='idcantidadProductos'>Cantidad:</label><br>
    <input type="number" id="idcantidadProductos" name="nmcantidadProductos" required>
</article>

<article>
    <label for='idmodoPago'>Modo de pago:</label><br>
    <input type="text" id="idmodoPago" name="nmmodoPago" required>
</article>

<input type="submit" value="Confirmar"/>

</form>
</body>
</html>

