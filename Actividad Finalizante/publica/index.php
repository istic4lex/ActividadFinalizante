<html >
    <head >
        <link href="https://cdn.simplecss.org/simple.css" rel="stylesheet" />
    </head>
    <body >
        <?php
            $archivos = scandir( "." );
            foreach( $archivos as $cadaArchivo ):
                if( $cadaArchivo == "." ) continue ;
                if( $cadaArchivo == ".." ) continue ;
                if( !is_dir($cadaArchivo) ) continue ;
                print "<button onclick='location.href=`$cadaArchivo`'>Abrir $cadaArchivo</button>
" ;
            endforeach;  
        ?>
    </body>
</html>