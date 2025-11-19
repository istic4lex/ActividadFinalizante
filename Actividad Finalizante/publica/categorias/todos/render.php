<article id="idArticulo_<?= $cadaRegistro->id ?>" >
    <h2><?= $cadaRegistro->nombreCategoria ?></h2>
    <nav>
        <button onclick="location.href='/categorias/ver?id=<?= $cadaRegistro->id ?>'">Más información</button>
        <button onclick="location.href='/categorias/editar?id=<?= $cadaRegistro->id ?>'">Editar</button>
        <button onclick="location.href='/categorias/borrar?id=<?= $cadaRegistro->id ?>'">Eliminar</button>
    </nav>
</article>
