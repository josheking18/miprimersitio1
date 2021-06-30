<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require('../class/ProductosModel.php');
    require('../class/rutas.php');

    

    //creamos un objetivo o instancia de la clase ProductoModel
    $productos= new ProductoModel;
    //disponibilizacion de los productos
    $productos = $productos->getProductos();

    //echo '<pre>';
    //print_r($productos);exit;
    //echo '</pre>';
?>

<!--Estructura del DOM (Document Objetc Model)--->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <header>  
        <?php  include('../partials/menu.php'); ?>
    </header>

    <!-- cuerpo y central de la pagina web -->
    <section>
        <div class = "formulario">
            <?php if (isset($_GET['m']) && $_GET['m'] == 'ok'): ?>
                <p class= "alert-success">El producto se ha registrado correctamente</p>
            <?php endif;?>

            <?php if (isset($_GET['e']) && $_GET['e'] == 'ok'): ?>
                <p class= "alert-success">El producto se ha sido eliminado correctamente</p>
            <?php endif;?>


            <h1>Productos</h1>
            <table class ="table"> 
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Tipo de Producto</th>
                       

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($productos as $productos):?>
                        <tr>
                                <td><?php echo $productos ['id']; ?></td>
                            <td>
                                <a href="show.php?id=<?php echo $productos ['id']; ?>"> 
                                    <?php echo $productos ['nombre']; ?>
                                </a> 
                            </td>
                            <td><?php echo $productos ['marca']; ?></td>
                            <td><?php echo $productos ['tipo']; ?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table> 
            <p class="enlace"> 
                <a href="add.php" class="btn btn-primary">Nuevo Producto</a>
            </p>
        </div>      
    </section>
    <footer>
        <?php  include('../partials/footer.php'); ?>
    </footer> 
</body>
</html>