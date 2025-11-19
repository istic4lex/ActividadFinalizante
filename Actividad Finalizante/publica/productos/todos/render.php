<article id="idArticulo_<?= $cadaRegistro->id ?>">
    <h2><?= $cadaRegistro->nombreProducto ?></h2>

    <?php if (!empty($cadaRegistro->foto)): ?>
        <img src="<?= $cadaRegistro->foto ?>" alt="Foto"
             style="max-width:120px; border-radius:6px; margin-bottom:10px;">
    <?php endif; ?>

    <p><strong>Marca:</strong> <?= $cadaRegistro->marca ?></p>
    <p><strong>Precio:</strong> $<?= $cadaRegistro->precio ?></p>

    <nav>
        <button onclick="location.href='/productos/ver?id=<?= $cadaRegistro->id ?>'">Más información</button>
        <button onclick="location.href='/productos/editar?id=<?= $cadaRegistro->id ?>'">Editar</button>
        <button onclick="location.href='/productos/borrar?id=<?= $cadaRegistro->id ?>'">Eliminar</button>
    </nav>
</article>

