<?php
//se hace una llamada obligatoria al archivo conexion.php para disponer de sus intancias de conexion
require('conexion.php');

class Modelo
{
    //se declara un atributo protegido 
    protected $_db; 

    //se declara el contructor de la clase 
    public function __construct()
    { 
        //crear una instancia u objeto de la clase conexion
        $this->_db = new Conexion; 
    }
}
//private= en donde el objeto solo es accesible dentro de la clase donde es declarado 
//protected= el objeto se puede acceder desde una clase que herede de la clase que declara el objeto 
//public= se hacen visible para cualquier clase que herede de la clase donde se declara el objeto 
//static=se pueden usar sin necesidad de heredad de la clase que la crea, con solo mensionar la clase