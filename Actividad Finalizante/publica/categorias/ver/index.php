<?php
    session_start() ;
    $url = (object)$_GET ;
    $id = $url->id ?? 1 ;
    $reglaSQL = "SELECT * FROM TCategorias WHERE id='$id';" ;
    $base = new PDO( "sqlite:../../../bases/productos.db" ) ;
    $accion = $base->query( $reglaSQL ) ;
    if( !$accion ):
        printf( "Hubo un error - %s", $base->errorInfo()[2] ) ;
        die() ;
    endif;
    $todos = $accion->fetchAll( PDO::FETCH_OBJ ) ;
?>
<html >
    
<head>
    <title >Tabla de categorías</title>
    <meta name="viewport" content="width=device-width,user-scalable=no" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css" />
    <style >[full]{ width: 100% }</style>
</head>

    <body >
        <header >
            <h1>Tabla de categorias</h1>
            <nav>
                <button onclick="history.back()">Volver al menú</button>
            </nav>
        </header>
        <section >
<?php
    if( count($todos) == 0 ):
        printf( "<p> No se encontró el registro %d </p>", $id );
    else:
        $encontrado = $todos[0] ;
        printf( "<details ><pre>%s</pre></details>", json_encode( $encontrado ) ) ;
            printf( "<p><strong>%s</strong>: <mark>%s</mark></p>", "id", $encontrado->id );
printf( "<p><strong>%s</strong>: <mark>%s</mark></p>", "nombreCategoria", $encontrado->nombreCategoria );

    endif;
?>
    </body>
</html>
