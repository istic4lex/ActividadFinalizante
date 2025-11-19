<?php
$id = $_GET["id"];
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdn.simplecss.org/simple.css"/>
<title>Eliminar venta</title>
</head>
<body>

<h1>¿Desea eliminar la venta?</h1>

<button onclick="location.href='/ventas/borrar/procesar.php?id=<?= $id ?>'">Eliminar venta</button>
<button onclick="history.back()">Cancelar</button>

</body>
</html>

