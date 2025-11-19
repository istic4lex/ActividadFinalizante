<?php
    session_start();
    $url = (object)$_GET;
    $base = new PDO( "sqlite:../../../bases/productos.db" );
    $reglaSQL = "SELECT * FROM TProductos WHERE id = $url->id;";
    $accion = $base->query( $reglaSQL );
    $reg = $accion->fetch( PDO::FETCH_OBJ );
?><html >
    
<head>
    <title >Eliminar Producto</title>
    <meta name="viewport" content="width=device-width,user-scalable=no" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css" />
    <style >[full]{ width: 100% }</style>
</head>

    <body >
        <header >
            <h1>Eliminar producto</h1>
            <?php
                if( isset($_SESSION["error"]) ):
                    printf( "<p id='idMarcaError' >%s</p><script>setTimeout(x=>idMarcaError.outerHTML='',3000)</script>", $_SESSION["error"] ) ;
                    unset($_SESSION["error"]);
                endif;
            ?>
            <nav >
                <button onclick="history.back()">Volver al menú de productos</button>
            </nav>
        </header>

        <p>¿Desea eliminar el producto <strong><?= $reg->nombreProducto ?></strong> ?</p>

        <form action='/productos/borrar/procesar.php' method="get" >
            <input type="hidden" name="id" value="<?= $reg->id ?>" />
            <input type="submit" value="Confirmar" />
        </form>
    </body>
</html>
