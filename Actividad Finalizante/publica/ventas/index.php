
<html >
    
<head>
    <title >Menú ventas</title>
    <meta name="viewport" content="width=device-width,user-scalable=no" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css" />
    <style >[full]{ width: 100% }</style>
</head>

    <body >
        <header >
            <h1>Subsistema de ventas</h1>
        </header>
        <a href="/ventas/nuevo" full ><button full>Agregar venta</button></a><br>
        <a href="/ventas/todos" full ><button full>Ver todas las ventas</button></a><br>
        <a href="/ventas/ver" full ><button full>Ver una venta</button></a><br>
        <a href="/ventas/editar" full ><button full>Editar venta</button></a><br>
        <a href="/ventas/borrar" full ><button full>Borrar venta</button></a><br>
        <script>
            location.href = "/ventas/todos/" ;
        </script>
    </body>
</html>
