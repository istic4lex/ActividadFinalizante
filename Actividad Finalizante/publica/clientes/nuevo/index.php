<?php
    session_start() ;
?><html >
    
<head>
    <title >Agregar cliente</title>
    <meta name="viewport" content="width=device-width,user-scalable=no" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css" />
    <style >[full]{ width: 100% }</style>
</head>

    <body >
        <header >
            <h1>Agregar cliente</h1>
            <?php
                if( isset($_SESSION["error"]) ):
                    printf( "<p id='idMarcaError' >%s</p><script>setTimeout(x=>idMarcaError.outerHTML='',3000)</script>" ) ;
                endif;
            ?>
            <nav >
                <button onclick="history.back()">Volver al menú de clientes</button>
            </nav>
        </header>
        <form action='/clientes/nuevo/procesar.php' method="get" >
            
<article >
    <label for='idnombreCliente'>Nombre del cliente: </label><br>
	<input type="TEXT" id="idnombreCliente" name="nmnombreCliente"   required  />
</article>

<article >
    <label for='idapellidoCliente'>Apellido del cliente: </label><br>
	<input type="TEXT" id="idapellidoCliente" name="nmapellidoCliente"   required  />
</article>

<article >
    <label for='idtelefono'>Teléfono: </label><br>
	<input type="TEL" id="idtelefono" name="nmtelefono"   />
</article>

<article >
    <label for='iddireccion'>Dirección del correo electrónico: </label><br>
	<input type="EMAIL" id="iddireccion" name="nmdireccion"   />
</article>

<article >
    <label for='idfechaAlta'>Fecha: </label><br>
	<input type="DATE" id="idfechaAlta" name="nmfechaAlta"   />
</article>

            <input type="submit" value="Agregar nuevo ítem" />
        </form>
    </body>
</html>