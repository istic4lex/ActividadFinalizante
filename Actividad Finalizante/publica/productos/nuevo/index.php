<?php
    session_start() ;
?><html >
    
<head>
    <title >Crear producto</title>
    <meta name="viewport" content="width=device-width,user-scalable=no" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css" />
    <style >[full]{ width: 100% }</style>
</head>

    <body >
        <header >
            <h1>Crear producto</h1>
            <?php
                if( isset($_SESSION["error"]) ):
                    printf( "<p id='idMarcaError' >%s</p><script>setTimeout(x=>idMarcaError.outerHTML='',3000)</script>" ) ;
                endif;
            ?>
            <nav >
                <button onclick="history.back()">Volve al menú de producto</button>
            </nav>
        </header>
        <form action='/productos/nuevo/procesar.php' method="get" >
            
<article >
    <label for='idnombreProducto'>Nombre del producto: </label><br>
	<input type="TEXT" id="idnombreProducto" name="nmnombreProducto"   required  />
</article>

<article >
    <label for='idmarca'>Marca: </label><br>
	<input type="TEXT" id="idmarca" name="nmmarca"   required  />
</article>

<article >
    <label for='idprecio'>Precio: </label><br>
	<input type="number" id="idprecio" name="nmprecio" step="0.01" min="0"  required  />

</article>

<article >
    <label for='idcategoria'>Categoria: </label><br>
	<?php
                        $reglaSQL = "SELECT * FROM TCategorias" ;
                        $base = new PDO( "sqlite:../../../bases/productos.db" ) ;
                        $accion = $base->query( $reglaSQL ) ;
                        if( $accion ):
                            $todos = $accion->fetchAll( PDO::FETCH_OBJ ) ;
                            printf( "<select id='idcategoria' name='nmcategoria' required >" ) ;
                            printf( "<option selected disabled>Elegí un/a categoria</option>" ) ;
                            foreach( $todos as $cadaUno ):
                                printf( "<option value='%s' >%s</option>", "$cadaUno->id", "$cadaUno->nombreCategoria" ) ;
                            endforeach;
                            printf( "</select>" ) ;
                        else:
                        endif;
                    ?>
                    
</article>

<article >
    <label for='iddescripcion'>Descripción: </label><br>
	<input type="TEXT" id="iddescripcion" name="nmdescripcion"   />
</article>

<article >
    <label for='idfoto'>Foto: </label><br>
	<input type="URL" id="idfoto" name="nmfoto"   />
</article>

            <input type="submit" value="Agregar nuevo ítem" />
        </form>
    </body>
</html>