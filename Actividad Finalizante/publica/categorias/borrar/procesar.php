<?php
session_start();
$form = (object)$_GET;

$reglaSQL = "DELETE FROM TCategorias WHERE id=$form->id;";
$base = new PDO("sqlite:../../../bases/productos.db");
$accion = $base->query($reglaSQL);

if ($accion):
    header("location:../index.php");
else:
    $_SESSION["error"] = $base->errorInfo()[2];
    header("location:./index.php?id=$form->id");
endif;
