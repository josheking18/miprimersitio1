<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../class/marcaModel.php');
require('../class/rutas.php');

//creamos un objeto o instancia de la clase regionModel
$marcas = new marcaModel;

//disponibilizacion de todas las Marcas
$marcas = $marcas->getMarcas();

/* echo '<pre>';
print_r($marcas);exit;
echo '</pre>'; */


?>
<!--Estructura del DOM (Document Object Model)-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcas</title>
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
                <p class="alert-success">La marca se ha registrado correctamente</p>
            <?php endif; ?>

            <?php if(isset($_GET['e']) && $_GET['e'] == 'ok'): ?>
                <p class="alert-success">La marca se ha eliminado correctamente</p>
            <?php endif; ?>

            <h1>Marcas</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Marca</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($marcas as $marca): ?>
                        <tr>
                            <td> <?php echo $marca['id']; ?> </td>
                            <td> 
                                <a href="show.php?id=<?php echo $marca['id']; ?>">
                                    <?php echo $marca['nombre']; ?> 
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p class="enlace">
                <a href="add.php" class="btn btn-primary">Nueva marca</a>
            </p>
        </div>
    </section> 
    <!-- pie de pagina del sitio -->
    <footer>
        <?php include('../partials/footer.php'); ?>
    </footer> 
    
</body>
</html>