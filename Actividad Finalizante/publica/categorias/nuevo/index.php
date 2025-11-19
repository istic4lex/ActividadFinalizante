<?php
    session_start() ;
?><html >
    
<head>
    <title >Crear nueva categoría</title>
    <meta name="viewport" content="width=device-width,user-scalable=no" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css" />
    <style >[full]{ width: 100% }</style>
</head>

    <body >
        <header >
            <h1>Crear nueva categoría</h1>
            <?php
                if( isset($_SESSION["error"]) ):
                    printf( "<p id='idMarcaError' >%s</p><script>setTimeout(x=>idMarcaError.outerHTML='',3000)</script>", $_SESSION["error"] ) ;
                endif;
            ?>
            <nav >
                <button onclick="history.back()">Volver al menú de Categorías</button>
            </nav>
        </header>
        <form action='/categorias/nuevo/procesar.php' method="get" >
            
<article >
    <label for='idnombreCategoria'>Nombre de la categoria: </label><br>
	<input type="TEXT" id="idnombreCategoria" name="nmnombreCategoria"   required  />
</article>

            <input type="submit" value="Confirmar" />
        </form>
    </body>
</html>