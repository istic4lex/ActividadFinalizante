<?php
    session_start() ;
    $form = (object)$_GET ;
    $reglaSQL = "INSERT INTO TClientes VALUES ( 
NULL, '$form->nmnombreCliente'
	, '$form->nmapellidoCliente'
	, '$form->nmtelefono'
	, '$form->nmdireccion'
	, '$form->nmfechaAlta'
)" ;
    $base = new PDO( "sqlite:../../../bases/productos.db" ) ;
    $accion = $base->query( $reglaSQL ) ;
    if( $accion ):
        header( "location:../index.php" ) ;
    else:
        $_SESSION["error"] = $base->errorInfo()[2] ;
        header( "location:./index.php" ) ;
    endif;
