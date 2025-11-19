<?php
    session_start();
    $form = (object)$_GET;

    $base = new PDO("sqlite:../../../bases/productos.db");

    $reglaSQL = "DELETE FROM TVentas WHERE id = $form->id;";

    $accion = $base->query($reglaSQL);

    if( $accion ):
        header("location:../index.php");
    else:
        $_SESSION['error'] = $base->errorInfo()[2];
        header("location:./index.php?id=$form->id");
    endif;
?>
