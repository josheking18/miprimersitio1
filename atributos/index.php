<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('../class/atributosModel.php');
require('../class/rutas.php');

//creamos un objeto o instancia de la clase atributosModel
$atributos = new atributosModel;

//disponibilizacion de todo los atributos
$atributos = $atributos->getAtributos();

/* echo '<pre>';
print_r($atributos);exit;
echo '</pre>'; */


?>
<!--Estructura del DOM (Document Object Model)-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atributos</title>
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
                <p class="alert-success">El atributo se ha registrado correctamente</p>
            <?php endif; ?>

            <?php if(isset($_GET['e']) && $_GET['e'] == 'ok'): ?>
                <p class="alert-success">El atributo se ha eliminado correctamente</p>
            <?php endif; ?>

            <h1>Atributos</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Atributos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($atributos as $atributo): ?>
                        <tr>
                            <td> <?php echo $atributo['id']; ?> </td>
                            <td> 
                                <a href="show.php?id=<?php echo $atributo['id']; ?>">
                                    <?php echo $atributo['nombre']; ?> 
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p class="enlace">
                <a href="add.php" class="btn btn-primary">Nuevo Atributos</a>
            </p>
        </div>
    </section> 
    <!-- pie de pagina del sitio -->
    <footer>
        <?php include('../partials/footer.php'); ?>
    </footer> 
    
</body>
</html>