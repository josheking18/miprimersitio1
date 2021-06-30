<?php
require_once('modelo.php');

class productoModel extends Modelo
{

	public function __construct(){
		parent::__construct();
	}

	public function getProductos(){
		$prod = $this->_db->query("SELECT p.id, p.sku, p.nombre, p.precio, p.activo, m.nombre as marca, tp.nombre as tipo FROM productos p INNER JOIN marcas m ON p.marca_id = m.id INNER JOIN producto_tipos tp ON p.producto_tipo_id = tp.id ORDER BY p.nombre");

		return $prod->fetchall();
	}

	public function getProductoId($id)
	{
		$id = (int) $id;
		
		$producto = $this->_db->prepare("SELECT p.id, p.sku,p.nombre,p.precio,activo,p.marca_id,p.producto_tipo_id,p.created_at, p.updated_at,m.nombre as marca,pt.nombre as productoTipo FROM productos p 
		INNER JOIN marcas m ON p.marca_id = m.id  
		INNER JOIN producto_tipos pt ON p.producto_tipo_id = pt.id WHERE p.id = ?");

		$producto->bindParam(1,$id);
		$producto->execute();

		return $producto->fetch();
	}

    public function getProductoNombre($nombre)
    {
        $prod = $this->_db->prepare("SELECT id FROM productos WHERE nombre = ?");
        $prod->bindParam(1, $nombre);
        $prod->execute();

        return $prod->fetch(); 
    }
	public function getMarcas()
    {
        $marcas = $this->_db->query("SELECT id, nombre FROM marcas ORDER BY nombre");

        return $marcas->fetchall();
    }
    public function getProducto()
    {
        $productos = $this->_db->query("SELECT id, nombre FROM producto_tipos ORDER BY nombre");

        return $productos->fetchall();
    }

	public function setProducto($sku, $nombre, $precio, $marcas, $productoTipo){
		$prod = $this->_db->prepare("INSERT INTO productos(sku,nombre,precio,activo,marca_id,producto_tipo_id,created_at,updated_at)VALUES(?,?,?,1,?,?,now(), now())");
        $precio = (int) $precio;
        $marcas = (int) $marcas;
        $productoTipo = (int) $productoTipo;
		//validamos por cada signo de ? el dato que intentamos enviar a la base de datos
		$prod->bindParam(1, $sku);
		$prod->bindParam(2, $nombre);
		$prod->bindParam(3, $precio);
		$prod->bindParam(4, $marcas);
		$prod->bindParam(5, $productoTipo);
		//se ejecuta la consulta de insercion de datos
		$prod->execute();

		//pregunte si hubo registros ingresados
		$row = $prod->rowCount();
		return $row;
	}

        //actualizar un producto
        public function updateProducto($id,$sku,$nombre,$precio,$activo,$marca,$productoTipo)
        {
            $id = (int) $id;
            $precio = (int) $precio;
            $marca = (int) $marca;
            $productoTipo = (int) $productoTipo;
    
            $producto = $this->_db->prepare("UPDATE productos SET sku = ?, nombre = ?, precio = ?, activo = ?,marca_id = ?, producto_tipo_id = ?, updated_at = now() WHERE id =? ");
            $producto->bindParam(1,$sku);
            $producto->bindParam(2,$nombre);
            $producto->bindParam(3,$precio);
            $producto->bindParam(4,$activo);
            $producto->bindParam(5,$marca);
            $producto->bindParam(6,$productoTipo);
            $producto->bindParam(7,$id);
            $producto->execute();
    
            $row = $producto->rowCount();
    
            return $row;
        }
	        //Eliminar un producto
			public function deleteProducto($id)
			{
	
				$id = (int) $id;
	
				$producto = $this->_db->prepare("DELETE FROM productos WHERE id=?");
				$producto->bindParam(1,$id);
				$producto->execute();
	
				$row = $producto->rowCount();
	
				return $row;
	
			}
}