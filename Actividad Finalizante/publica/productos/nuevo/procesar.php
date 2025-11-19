<?php
    session_start() ;
    $form = (object)$_GET ;
    $reglaSQL = "INSERT INTO TProductos VALUES ( 
NULL, '$form->nmnombreProducto'
	, '$form->nmmarca'
	, '$form->nmprecio'
	, '$form->nmcategoria'
	, '$form->nmdescripcion'
	, '$form->nmfoto'
)" ;
    $base = new PDO( "sqlite:../../../bases/productos.db" ) ;
    $accion = $base->query( $reglaSQL ) ;
    if( $accion ):
        header( "location:../index.php" ) ;
    else:
        $_SESSION["error"] = $base->errorInfo()[2] ;
        header( "location:./index.php" ) ;
    endif;
