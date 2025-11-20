<article id="idArticulo_<?= $cadaRegistro->id ?>">
    <h2>
        Cliente: <?= $cadaRegistro->cliente ?><br>
        Producto: <?= $cadaRegistro->producto ?>
    </h2>

    <?php if (!empty($cadaRegistro->foto)): ?>
        <img src="<?= $cadaRegistro->foto ?>" alt="Foto del producto" style="max-width:200px; display:block; margin:10px 0;">
    <?php endif; ?>

    <p>Cantidad: <?= $cadaRegistro->cantidadProductos ?></p>
    <p>Pago: <?= $cadaRegistro->modoPago ?></p>

    <nav>
        <button onclick="location.href='/ventas/ver?id=<?= $cadaRegistro->id ?>'">Más información</button>
        <button onclick="location.href='/ventas/editar?id=<?= $cadaRegistro->id ?>'">Editar</button>
        <button onclick="location.href='/ventas/borrar?id=<?= $cadaRegistro->id ?>'">Eliminar</button>
    </nav>
</article>
