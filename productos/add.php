<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require('../class/productosModel.php');
    require('../class/rutas.php');

    $prod = new productoModel;

    $marcas = $prod->getMarcas();
    $productos = $prod->getProducto();

    if (isset($_POST['confirm']) && $_POST['confirm'] == 1) {
        

        $sku = trim(strip_tags($_POST['sku']));
        $nombre = trim(strip_tags($_POST['nombre']));
        $precio = (int) $_POST['precio'];
        $marcas = (int) $_POST['marca'];
        $productoTipo = (int) $_POST['tipo'];
        

        if (strlen($sku) < 5) {
            $msg = 'Debe ingresar el sku del producto';
        }elseif (!$nombre) {
            $msg = 'Ingrese el nombre del producto';
        }elseif ($precio <= 0) {
            $msg = 'Ingrese el precio del producto';
        }elseif ($marcas <= 0) {
            $msg = 'Seleccione la marca';
        }elseif ($productoTipo <= 0) {
            $msg = 'Seleccione el tipo de producto';
        }else{
             # verificar que el dato no este registrado en la tabla regiones
             $row = $prod->getProductoNombre($nombre);

             if ($row) {
                 $msg = 'El producto ingresado ya existe... intente con otra';
             }else {
                 //insertar la region en la base de datos
                 $row = $prod->setProducto($sku, $nombre, $precio, $marcas, $productoTipo);
            if ($row) 
            {
                $msg = 'El producto se a registrado correctamente';
                header('Location index.phpm=' . $msg);
            }
        }


    }    }

?>
<!-- aqui comienza el codigo del cliente -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="shortcut icon" href="favicon.png.ico">

</head>
<body>
    <header>
        <!-- llamada a navegador del sitio -->
        <?php include('../partials/menu.php'); ?>
    </header>
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center mt-3 text-primary">Nuevo Producto</h1>
            <!-- mostrar mensaje de error -->
            <?php if(isset($msg)): ?>
                <p class="alert alert-danger">
                    <?php echo $msg; ?>
                </p>
            <?php endif; ?>

            <form action="" method="post">
                <div class="form-group mb-3">
                    <label for="sku">SKU <span class="text-danger">*</span></label>
                    <input type="text" name="sku" value="<?php if(isset($_POST['sku'])) echo $_POST['sku'] ?>" class="form-control" placeholder="Ingrese SKU del producto">
                </div>
                <div class="form-group mb-3">
                    <label for="nombre">Nombre <span class="text-danger">*</span></label>
                    <input type="text" name="nombre" value="<?php if(isset($_POST['sku'])) echo $_POST['nombre'] ?>" class="form-control" placeholder="Ingrese nombre del producto">
                </div>
                <div class="form-group mb-3">
                    <label for="precio">Precio <span class="text-danger">*</span></label>
                    <input type="number" name="precio" value="<?php if(isset($_POST['sku'])) echo $_POST['precio'] ?>" class="form-control" placeholder="Ingrese precio del producto">
                </div>
                <div class="form-group mb-3">
                    <label for="marca">Marca <span class="text-danger">*</span></label>
                    <select name="marca" class="form-control">
                        <option value="">Seleccione...</option>
                        
                        <?php foreach($marcas as $marca): ?>
                            <option value="<?php echo $marca['id']; ?>">
                                <?php echo $marca['nombre']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="tipo">Producto tipo <span class="text-danger">*</span></label>
                    <select name="tipo" class="form-control">
                        <option value="">Seleccione...</option>
                        
                        <?php foreach($productos as $producto): ?>
                            <option value="<?php echo $producto['id']; ?>">
                                <?php echo $producto['nombre']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" name="confirm" value="1">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a href="index.php" class="btn btn-link">Volver</a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>