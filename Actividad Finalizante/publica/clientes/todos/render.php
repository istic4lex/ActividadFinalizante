<article id="idArticulo_<?= $cadaRegistro->id ?>" >
    <h2><?= $cadaRegistro->nombreCliente ?></h2>
    <nav>
        <button onclick="location.href='/clientes/ver?id=<?= $cadaRegistro->id ?>'">Más información</button>
        <button onclick="location.href='/clientes/editar?id=<?= $cadaRegistro->id ?>'">Editar</button>
        <button onclick="location.href='/clientes/borrar?id=<?= $cadaRegistro->id ?>'">Borrar</button>
    </nav>
</article>

