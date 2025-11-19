<?php
    session_start();
    $url = (object)$_GET;
    $reglaSQL = "SELECT * FROM TProductos;";
    $base = new PDO("sqlite:../../../bases/productos.db");
    $accion = $base->query($reglaSQL);
?>
<html>
<head>
    <title>Productos</title>
    <meta name="viewport" content="width=device-width,user-scalable=no" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css" />
</head>

<body>
<header>
    <h1>Productos</h1>
    <nav>
        <button onclick="location.href='/'">Volver al menú</button>
        <button onclick="location.href='/productos/nuevo/'">Agregar nuevo producto</button>
    </nav>
</header>

<?php
    if (!$accion):
        printf("<p class='error'>%s</p><details>%s</details>", "No hay registros", $base->errorInfo()[2]);
    else:
        $todos = $accion->fetchAll(PDO::FETCH_OBJ);
        printf("<p>En total hay %d productos</p>", count($todos));

        foreach ($todos as $cadaRegistro):
            include "./render.php";
        endforeach;
    endif;
?>
</body>
</html>

