<?php
require('modelo.php');

class marcaModel extends Modelo
{
    public function __construct()
    {
        //utilizar el constructor de la clase Modelo 
        parent::__construct();
    }

    //metodo que muestra todos las regiones de la tabla regiones
    public function getMarcas()
    {
        $marcas = $this->_db->query("SELECT id, nombre FROM marcas ORDER BY nombre");

        return $marcas->fetchall();
    }

    //metodo que consulta a la tabla regiones por una region usando el id
    public function getMarcasId($id)
    {
        $id = (int) $id;

        $marca = $this->_db->prepare("SELECT id, nombre, created_at, updated_at FROM marcas WHERE id = ?");
        $marca->bindParam(1, $id);
        $marca->execute();

        return $marca->fetch();
    }

    //metodo que consulta a la tabla regiones por una region ingresado
    public function getMarcasNombre($nombre)
    {
        $marca = $this->_db->prepare("SELECT id FROM marcas WHERE nombre = ?");
        $marca->bindParam(1, $nombre);
        $marca->execute();

        return $marca->fetch(); //vamos a recuperar una region
    }

    //crear un metodo que inserte regiones en la tabla regiones
    public function setMarcas($nombre)
    {
        //consulta para insertar datos
        //el metodo prepare sirve para crear una sala de espera de sanitizacion de datos antes de ingresar DB
        $marca = $this->_db->prepare("INSERT INTO marcas VALUES(null, ?, now(), now() )");
        //se realiza operacion de sanitizacion
        $marca->bindParam(1, $nombre);
        //ejecutamos la consulta y se envian los datos a la tabla roles
        $marca->execute();

        //consultamos si los datos fueron ingresados, consultando el numero de filas que se ha ingresado
        $row = $marca->rowCount(); //nos devolvera el numero de filas insertadas

        return $row; //disponiblizamos la informacion solicitada para quien la consulte
    }

    //metodo que edita una region
    public function updateMarcas($id, $nombre)
    {
        $id = (int) $id;

        $marca = $this->_db->prepare("UPDATE marcas SET nombre = ?, updated_at = now() WHERE id = ? ");
        $marca->bindParam(1, $nombre);
        $marca->bindParam(2, $id);
        $marca->execute();

        $row = $marca->rowCount();

        return $row;
    }

    //metodo par eliminar regiones
    public function deleteMarcas($id)
    {
        $id = (int) $id;

        $marca = $this->_db->prepare("DELETE FROM marcas WHERE id = ?");
        $marca->bindParam(1, $id);
        $marca->execute();

        $row = $marca->rowCount();

        return $row;
    }
}