<?php
require_once('modelo.php');

class atributosModel extends Modelo
{
    public function __construct()
    {
        //utilizar el constructor de la clase Modelo 
        parent::__construct();
    }

    //metodo que muestra todos los atributos de la tabla atributos
    public function getAtributos()
    {
        $atributos = $this->_db->query("SELECT id, nombre FROM atributos ORDER BY nombre");

        return $atributos->fetchall();
    }

    //metodo que consulta a la tabla atributos por un atributo usando el id
    public function getAtributosId($id)
    {
        $id = (int) $id;

        $atributo = $this->_db->prepare("SELECT id, nombre FROM atributos WHERE id = ?");
        $atributo->bindParam(1, $id);
        $atributo->execute();

        return $atributo->fetch();
    }

    //metodo que consulta a la tabla atributos por un atributo ingresado
    public function getAtributosNombre($nombre)
    {
        $atributo = $this->_db->prepare("SELECT id FROM atributos WHERE nombre = ?");
        $atributo->bindParam(1, $nombre);
        $atributo->execute();

        return $atributo->fetch(); //vamos a recuperar un atributo
    }

    //crear un metodo que inserte atributo en la tabla atributos
    public function setAtributos($nombre)
    {
        //consulta para insertar datos
        //el metodo prepare sirve para crear una sala de espera de sanitizacion de datos antes de ingresar DB
        $atributo = $this->_db->prepare("INSERT INTO atributos VALUES(null, ?)");
        //se realiza operacion de sanitizacion
        $atributo->bindParam(1, $nombre);

        //ejecutamos la consulta y se envian los datos a la tabla roles
        $atributo->execute();

        //consultamos si los datos fueron ingresados, consultando el numero de filas que se ha ingresado
        $row = $atributo->rowCount(); //nos devolvera el numero de filas insertadas

        return $row; //disponiblizamos la informacion solicitada para quien la consulte
    }

        //metodo que edita un atributo
        public function updateAtributos($id,$nombre)
        {
            $id = (int) $id;
    
            $atributo= $this->_db->prepare("UPDATE atributos SET nombre = ? WHERE id= ? ");
            $atributo->bindParam(1, $nombre);
            $atributo->bindParam(2, $id);
            
            
            $atributo->execute();
    
            $row = $atributo->rowCount();
    
            return $row;
        }

}