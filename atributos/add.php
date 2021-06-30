<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    

    require('../class/atributosModel.php');
    require('../class/rutas.php');

    $atributos = new atributosModel;


    if (isset($_POST['confirm']) && $_POST['confirm'] == 1) 
    {
        $nombre = trim(strip_tags($_POST['nombre']));
        if (!$nombre) 
        {
            $msg = 'Debe ingresar un nombre.';
        }
        else 
        {
            $row = $atributos->getAtributosNombre($nombre);
            if ($row) 
            {
                $msg = 'El nombre ingresado ya existe.';
            }
            else 
            {
                $row = $atributos->setAtributos($nombre);
                if ($row) 
                {
                    $msg = 'ok';
                    header('Location: index.php?m=' . $msg);
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Atributo</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="../favicon.png.ico">
</head>

<body>

    <header>
        <?php include('../partials/menu.php'); ?>
    </header>

    <section>
        <h1>Nuevo Atributo</h1>
        <div class="contenido">
            <form action="" method="post">
                <div class="form-group">
                    <label for="atributo">Ingreso de Atributo</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre del atributo.">
                    <?php if(isset($msg)): ?>
                        <p class="text-danger">
                            <?php echo $msg; ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <input type="hidden" name="confirm" value="1">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="index.php" class="btn btn-link">Volver</a>
                </div>
            </form>
        </div>
    
    </section> 

    <footer>
        <?php include('../partials/footer.php'); ?>
    </footer> 
    
</body>

</html>