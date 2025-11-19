<?php
    session_start() ;
    $url = (object)$_GET ;
    $reglaSQL = "SELECT * FROM TClientes;" ;
    $base = new PDO( "sqlite:../../../bases/productos.db" ) ;
    $accion = $base->query( $reglaSQL ) ;
?>
<html >
    
<head>
    <title >Clientes</title>
    <meta name="viewport" content="width=device-width,user-scalable=no" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css" />
    <style >[full]{ width: 100% }</style>
</head>

    <body >
        <header >
            <h1>Clientes </h1>
            
            <nav>
                <button onclick="location.href='/';">Volver al menú</button>
                <button onclick="location.href='/clientes/nuevo/'">Agregar nuevo cliente</button>
            </nav>
        </header>
<?php
    if( !$accion ):
        printf( "<p class='error' >%s</p><details >%s</details>", "No hay ningún registro en la tabla", $base->errorInfo()[2] ) ;
    else:
        $todos = $accion->fetchAll( PDO::FETCH_OBJ ) ;
        printf( "<p>En total hay %d clientes</p>", count($todos) );
        foreach( $todos as $cadaRegistro ):
            include "./render.php" ;
        endforeach;
    endif;
?>
    </body>
</html>
