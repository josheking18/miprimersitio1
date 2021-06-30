<?php
require_once('modelo.php');

class productotipoModel extends Modelo
{
    public function __construct()
    {
        //utilizar el constructor de la clase Modelo 
        parent::__construct();
    }

    public function getProducto()
    {
        $productos = $this->_db->query("SELECT id, nombre FROM producto_tipos ORDER BY nombre");

        return $productos->fetchall();
    }

    public function getProductoId($id)
    {
        $id = (int) $id;

        $producto = $this->_db->prepare("SELECT id, nombre FROM producto_tipos WHERE id = ?");
        $producto->bindParam(1, $id);
        $producto->execute();

        return $producto->fetch();
    }

    public function getProductoNombre($nombre)
    {
        $producto = $this->_db->prepare("SELECT id FROM producto_tipos WHERE nombre = ?");
        $producto->bindParam(1, $nombre);
        $producto->execute();

        return $producto->fetch(); 
    }

    public function setProducto($nombre)
    {
        //consulta para insertar datos
        //el metodo prepare sirve para crear una sala de espera de sanitizacion de datos antes de ingresar DB
        $producto = $this->_db->prepare("INSERT INTO producto_tipos VALUES(null, ?)");
        //se realiza operacion de sanitizacion
        $producto->bindParam(1, $nombre);

        $producto->execute();

        //consultamos si los datos fueron ingresados, consultando el numero de filas que se ha ingresado
        $row = $producto->rowCount(); //nos devolvera el numero de filas insertadas

        return $row; //disponiblizamos la informacion solicitada para quien la consulte
    }

        public function updateProducto($id,$nombre)
        {
            $id = (int) $id;
    
            $producto= $this->_db->prepare("UPDATE producto_tipos SET nombre = ? WHERE id= ? ");
            $producto->bindParam(1, $nombre);
            $producto->bindParam(2, $id);
            
            
            $producto->execute();
    
            $row = $producto->rowCount();
    
            return $row;
        }

}