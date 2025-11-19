<?php
    session_start() ;
    $form = (object)$_GET ;
    $reglaSQL = "UPDATE TProductos SET 
NULL, 
    nombreProducto = '$form->nmnombreProducto'
    , marca = '$form->nmmarca'
    , precio = '$form->nmprecio'
    , categoria = '$form->nmcategoria'
    , descripcion = '$form->nmdescripcion'
    , foto = '$form->nmfoto'
WHERE id = $form->id
" ;

$reglaSQL = "UPDATE TProductos SET 
    nombreProducto = '$form->nmnombreProducto'
    , marca = '$form->nmmarca'
    , precio = '$form->nmprecio'
    , categoria = '$form->nmcategoria'
    , descripcion = '$form->nmdescripcion'
    , foto = '$form->nmfoto'
WHERE id = $form->id
" ;

    $base = new PDO( "sqlite:../../../bases/productos.db" ) ;
    $accion = $base->query( $reglaSQL ) ;
    if( $accion ):
        header( "location:../index.php" ) ;
    else:
        $_SESSION["error"] = $base->errorInfo()[2] ;
        header( "location:./index.php?id=$form->id" ) ;
    endif;
