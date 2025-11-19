<?php
    session_start();
    $url = (object)$_GET;
    $base = new PDO( "sqlite:../../../bases/productos.db" );
    $reglaSQL = "SELECT * FROM TClientes WHERE id = $url->id;";
    $accion = $base->query( $reglaSQL );
    $reg = $accion->fetch( PDO::FETCH_OBJ );
?><html >
    
<head>
    <title >Editar cliente</title>
    <meta name="viewport" content="width=device-width,user-scalable=no" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css" />
    <style >[full]{ width: 100% }</style>
</head>

    <body >
        <header >
            <h1>Editar cliente</h1>
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
        <form action='/clientes/editar/procesar.php' method="get" >
            <input type="hidden" name="id" value="<?= $reg->id ?>" />
<article >
    <label for='idnombreCliente'>Nombre del cliente: </label><br>
	<input type="TEXT" id="idnombreCliente" name="nmnombreCliente" value="<?= $reg->nombreCliente ?>" required  />
</article>

<article >
    <label for='idapellidoCliente'>Apellido del cliente: </label><br>
	<input type="TEXT" id="idapellidoCliente" name="nmapellidoCliente" value="<?= $reg->apellidoCliente ?>" required  />
</article>

<article >
    <label for='idtelefono'>Teléfono: </label><br>
	<input type="TEL" id="idtelefono" name="nmtelefono" value="<?= $reg->telefono ?>"  />
</article>

<article >
    <label for='iddireccion'>Correo electrónico: </label><br>
	<input type="EMAIL" id="iddireccion" name="nmdireccion" value="<?= $reg->direccion ?>"  />
</article>

<article >
    <label for='idfechaAlta'>Fecha de alta: </label><br>
	<input type="DATE" id="idfechaAlta" name="nmfechaAlta" value="<?= $reg->fechaAlta ?>"  />
</article>

            <input type="submit" value="Confirmar" />
        </form>
    </body>
</html>
