<?php
    session_start();
    $url = (object)$_GET;
    $base = new PDO( "sqlite:../../../bases/productos.db" );
    $reglaSQL = "SELECT * FROM TProductos WHERE id = $url->id;";
    $accion = $base->query( $reglaSQL );
    $reg = $accion->fetch( PDO::FETCH_OBJ );
?><html >
    
<head>
    <title >Editar producto</title>
    <meta name="viewport" content="width=device-width,user-scalable=no" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css" />
    <style >[full]{ width: 100% }</style>
</head>

    <body >
        <header >
            <h1>Editar producto</h1>
            <?php
                if( isset($_SESSION["error"]) ):
                    printf( "<p id='idMarcaError' >%s</p><script>setTimeout(x=>idMarcaError.outerHTML='',3000)</script>", $_SESSION["error"] ) ;
                    unset($_SESSION["error"]);
                endif;
            ?>
            <nav >
                <button onclick="history.back()">Volver al menú de productos</button>
            </nav>
        </header>
        <form action='/productos/editar/procesar.php' method="get" >
            <input type="hidden" name="id" value="<?= $reg->id ?>" />

<article >
    <label for='idnombreProducto'>Nombre del producto: </label><br>
	<input type="TEXT" id="idnombreProducto" name="nmnombreProducto" value="<?= $reg->nombreProducto ?>" required  />
</article>

<article >
    <label for='idmarca'>Marca: </label><br>
	<input type="TEXT" id="idmarca" name="nmmarca" value="<?= $reg->marca ?>" required  />
</article>

<article >
    <label for='idprecio'>Precio: </label><br>
	<input type="number" id="idprecio" name="nmprecio" step="0.00001" value="<?= $reg->precio ?>" required  />
</article>

<article >
    <label for='idcategoria'>Categoría: </label><br>
	<?php
                        $reglaSQL = "SELECT * FROM TCategorias" ;
                        $base = new PDO( "sqlite:../../../bases/productos.db" ) ;
                        $accion = $base->query( $reglaSQL ) ;
                        if( $accion ):
                            $todos = $accion->fetchAll( PDO::FETCH_OBJ ) ;
                            printf( "<select id='idcategoria' name='nmcategoria' required >" ) ;
                            printf( "<option disabled>Elegí un/a categoria</option>" ) ;
                            foreach( $todos as $cadaUno ):
                                $sel = ($cadaUno->id == $reg->categoria) ? "selected" : "" ;
                                printf( "<option value='%s' %s >%s</option>", "$cadaUno->id", $sel, "$cadaUno->nombreCategoria" ) ;
                            endforeach;
                            printf( "</select>" ) ;
                        else:
                        endif;
                    ?>
</article>

<article >
    <label for='iddescripcion'>Descripción: </label><br>
	<input type="TEXT" id="iddescripcion" name="nmdescripcion" value="<?= $reg->descripcion ?>"  />
</article>

<article >
    <label for='idfoto'>Foto: </label><br>
	<input type="URL" id="idfoto" name="nmfoto" value="<?= $reg->foto ?>"  />
</article>

            <input type="submit" value="Confirmar" />
        </form>
    </body>
</html>
