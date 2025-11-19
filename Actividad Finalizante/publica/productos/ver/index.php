<?php
    session_start();
    $url = (object)$_GET;
    $id = $url->id ?? 1;
    $reglaSQL = "SELECT * FROM TProductos WHERE id='$id';";
    $base = new PDO("sqlite:../../../bases/productos.db");
    $accion = $base->query($reglaSQL);

    if (!$accion):
        printf("Hubo un error - %s", $base->errorInfo()[2]);
        die();
    endif;

    $todos = $accion->fetchAll(PDO::FETCH_OBJ);
?>
<html>
<head>
    <title>Producto</title>
    <meta name="viewport" content="width=device-width,user-scalable=no" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css" />
</head>

<body>
<header>
    <h1>Viendo un producto</h1>
    <nav>
        <button onclick="history.back()">Volver</button>
    </nav>
</header>

<section>
<?php
    if (count($todos) == 0):
        printf("<p>No se encontró el registro %d</p>", $id);
    else:
        $encontrado = $todos[0];
?>

    <!-- Imagen -->
    <?php if (!empty($encontrado->foto)): ?>
        <img src="<?= $encontrado->foto ?>" alt="Imagen del producto"
             style="max-width:300px; border-radius:8px; margin-bottom:15px;">
    <?php endif; ?>

    <p><strong>ID:</strong> <?= $encontrado->id ?></p>
    <p><strong>Nombre del producto:</strong> <?= $encontrado->nombreProducto ?></p>
    <p><strong>Marca:</strong> <?= $encontrado->marca ?></p>
    <p><strong>Precio:</strong> $<?= $encontrado->precio ?></p>
    <p><strong>Categoría:</strong> <?= $encontrado->categoria ?></p>

    <p><strong>Descripción:</strong><br>
        <?= nl2br($encontrado->descripcion) ?>
    </p>

<?php endif; ?>
</section>

</body>
</html>
