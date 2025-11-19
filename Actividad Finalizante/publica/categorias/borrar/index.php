<?php
session_start();
$url = (object)$_GET;
$base = new PDO("sqlite:../../../bases/productos.db");

$reglaSQL = "SELECT * FROM TCategorias WHERE id=$url->id;";
$accion = $base->query($reglaSQL);
$reg = $accion->fetch(PDO::FETCH_OBJ);
?>
<html>

<head>
    <title>Eliminar categoría</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css" />
</head>

<body>

<header>
    <h1>Eliminar la categoría</h1>
    <nav>
        <button onclick="history.back()">Volver al menú de categorías</button>
    </nav>
</header>

<p>Categoria: <b><?= $reg->nombreCategoria ?></b></p>

<form action="/categorias/borrar/procesar.php" method="get">
    <input type="hidden" name="id" value="<?= $reg->id ?>">
    <input type="submit" value="Confirmar">
</form>

</body>
</html>
