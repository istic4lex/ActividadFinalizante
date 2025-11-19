<?php
    session_start();
    $url = (object)$_GET;
    $base = new PDO( "sqlite:../../../bases/productos.db" );
    $reglaSQL = "SELECT * FROM TClientes WHERE id = $url->id;";
    $accion = $base->query( $reglaSQL );
    $reg = $accion->fetch( PDO::FETCH_OBJ );
?><html >
    
<head>
    <title >Eliminar cliente</title>
    <meta name="viewport" content="width=device-width,user-scalable=no" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css" />
    <style >[full]{ width: 100% }</style>
</head>

    <body >
        <header >
            <h1>Eliminar cliente</h1>
            <?php
                if( isset($_SESSION["error"]) ):
                    printf( "<p id='idMarcaError' >%s</p><script>setTimeout(x=>idMarcaError.outerHTML='',3000)</script>", $_SESSION["error"] ) ;
                    unset($_SESSION["error"]);
                endif;
            ?>
            <nav >
                <button onclick="history.back()">Volver al menú de clientes</button>
            </nav>
        </header>

        <p>¿Desea eliminar al cliente <strong><?= $reg->nombreCliente ?> <?= $reg->apellidoCliente ?></strong> ?</p>

        <form action='/clientes/borrar/procesar.php' method="get" >
            <input type="hidden" name="id" value="<?= $reg->id ?>" />
            <input type="submit" value="Confirmar" />
        </form>
    </body>
</html>
