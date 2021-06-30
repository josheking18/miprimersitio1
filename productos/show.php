<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require('../class/productosModel.php');
    require('../class/rutas.php');
    //verificar la varaible id enviada desde index.php a ingresado a ingresado a esta seccion
    if(isset($_GET['id'])){
        #guardar la variable GET id en una variable manejable
        $id = (int) $_GET['id']; //parseamos la variable id obligando que sea un numero entero

        $productos = new ProductoModel;
        $producto = $productos->getProductoId($id);
        
        //print_r($id);exit;
    } 
    
    
    
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
        <div class= "formulario">
            <?php if (isset($_GET['m']) && $_GET ['m'] == 'ok'): ?>
                <p class= "alert-success">El producto se ha modificado correctamente</p>
            <?php endif;?> 
       

            <h1>Producto</h1> 
            <!--  verificar que el arreglo rol tenga datos -->
            <?php if($producto): ?>
                <table class="table">
                    <tr>
                        <th>Sku:</th>
                        <td><?php echo $producto['sku'];?></td>
                    </tr>
                    <tr>
                        <th>Nombre:</th>
                        <td><?php echo $producto['nombre'];?></td>
                    </tr>

                    <tr>
                        <th>Precio:</th>
                        <td><?php echo $producto['precio'];?></td>
                    </tr>

                    <tr>
                        <th>Estado:</th>
                        <td><?php echo $producto['activo'];?></td>
                    </tr>

                    <tr>
                        <th>Marca:</th>
                        <td><?php echo $producto['marca'];?></td>
                    </tr>

                    <tr>
                        <th>Tipo De Producto:</th>
                        <td><?php echo $producto['productoTipo'];?></td>
                    </tr>

                    <tr>
                        <th>Creado</th>
                    <td>    
                        <?php
                            
                            $created = new DateTime($producto['created_at']);
                            echo $created->format('d-m-Y H:i:s')
                        ?>
                    </td>
                    <tr>
                        <th>Actualizado:</th>
                        <td>
                            <?php
                                $created = new DateTime($producto['updated_at']);
                                echo $created->format('d-m-Y H:i:s');
                            ?>
                        </td>
                    </tr>
                </table>
                <p class ="enlace">
                    <a href="edit.php?id=<?php echo $id; ?>" class = "btn btn-primary">Editar</a>
                    <a href="index.php" class="btn btn-link">Volver</a>
                 </p>
                 <form action="delete.php" method="post">
                        <input type ="hidden" name = "confirm" value = "1">
                        <input type="hidden" name ="id" value="<?php echo $id ?>">
                        <button type="submit" class ="btn btn-warning">Eliminar</button>
                    </form>



            <?php else: ?>
                <p class ="text-info">El dato no existe</p>
            <?php endif;?>
        </div>
    </section>
    <footer>
        <?php  include('../partials/footer.php'); ?>
    </footer>


    
</body>
</html>
