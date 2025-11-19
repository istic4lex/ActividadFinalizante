<?php
    session_start() ;
    $form = (object)$_GET ;
    $reglaSQL = "UPDATE TClientes SET 
        nombreCliente = '$form->nmnombreCliente'
        , apellidoCliente = '$form->nmapellidoCliente'
        , telefono = '$form->nmtelefono'
        , direccion = '$form->nmdireccion'
        , fechaAlta = '$form->nmfechaAlta'
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
