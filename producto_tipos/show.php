<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    require('../class/productotipoModel.php');
    require('../class/rutas.php');

    //verificar que la variable id enviada desde index.php ha ingresado en esta pagina
    if (isset($_GET['id'])) {
        # guardar la variable GET id en una variable manejable
        $id = (int) $_GET['id']; //parseamos la variable id obligandola a que sea un numero entero

        $productos_tipos = new productotipoModel;
        $producto_tipos = $productos_tipos->getProductoId($id);

       /*  echo '<pre>';
        print_r($producto_tipos);exit;
        echo '</pre>'; */
    }
?>

<!--Estructura del DOM (Document Object Model)-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto_tipos</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../favicon.png.ico">
</head>
<body>
    <!--Aqui se ve todo el codigo por el usuario-->
    <!-- cabecera del sitio y menu de navegacion -->
    <header>
        <h1>Cabecera</h1>
        <!-- llamada a sitio menu.php -->
        <?php include('../partials/menu.php'); ?>
    </header>
    <!-- cuerpo central de la pagina web -->
    <section>
        <div class="contenido">
            <?php if(isset($_GET['m']) && $_GET['m'] == 'ok'): ?>
                <p class="alert-success">El producto_tipos se ha modificado correctamente</p>
            <?php endif; ?>

            <h1>Producto_tipos</h1>
            
            <?php if($producto_tipos): ?>
                <table class="table">
                    <tr>
                        <th>Id:</th>
                        <td> <?php echo $producto_tipos['id']; ?> </td>
                    </tr>
                    <tr>
                        <th>Rol:</th>
                        <td> <?php echo $producto_tipos['nombre']; ?> </td>
                    </tr>
                </table>
                <p class="enlace">
                    <a href="edit.php?id=<?php echo $id; ?>" class="btn btn-primary">Editar</a>
                    <a href="index.php" class="btn btn-link">Volver</a>
                </p>
            <?php else: ?>
                <p class="text-info">El dato no existe</p>
            <?php endif; ?>
        </div>
    </section> 
    <!-- pie de pagina del sitio -->
    <footer>
        <?php include('../partials/footer.php'); ?>
    </footer> 
    
</body>
</html>