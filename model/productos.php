<?php

require_once('./conexion.php');
class productosDAO
{


  /*FUNCION PARA PODER ORDENAR DE MANERA DESCENDENTE O ASCENDENTE POR ATRIBUTO ELEGIDO*/
  public static function array_sort_by(&$arrIni, $order = SORT_ASC)
  {
    $arrAux = array();
    foreach ($arrIni as $key => $row) {
      $arrAux[$key] = is_object($row) ? $arrAux[$key] = $row->getPrecio() : "";
      $arrAux[$key] = strtolower($arrAux[$key]);
    }
    array_multisort($arrAux, $order, $arrIni);
  }

  public static function all()
  {
    Conexion::conectar();
    Conexion::preparar('select * from Producto');
    Conexion::statement()->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Producto", ['id', 'nombre', 'precio', 'descripcion', 'nuevo', 'popular']);
    Conexion::statement()->execute();
    $arrayProductos = Conexion::statement()->fetchAll();
    Conexion::desconectar();
    return $arrayProductos;
  }


  public static function  productosNuevos()
  {
    Conexion::conectar();
    Conexion::preparar('select * from Producto where nuevo=1');
    Conexion::statement()->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Producto", ['id', 'nombre', 'precio', 'descripcion', 'nuevo', 'popular']);
    Conexion::statement()->execute();
    $arrayProductos = Conexion::statement()->fetchAll();
    Conexion::desconectar();
    return $arrayProductos;
  }


  public static function  productosOrdenadosPorPrecio()
  {
    $arrayProductos = self::all();
    self::array_sort_by($arrayProductos, SORT_DESC);
    return $arrayProductos;
  }

  public static function  productosPopulares()
  {
    $popular = 1;
    Conexion::conectar();
    Conexion::preparar("SELECT * FROM Producto where popular = :popular");
    Conexion::statement()->bindParam(':popular', $popular, PDO::PARAM_INT);
    Conexion::statement()->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Producto", ['id', 'nombre', 'precio', 'descripcion', 'nuevo', 'popular']);
    Conexion::statement()->execute();
    $arrayProductos = Conexion::statement()->fetchAll();
    Conexion::desconectar();
    return $arrayProductos;

  }


  public static function  mostrarProducto($id)
  {
    Conexion::conectar();
    Conexion::preparar("SELECT * FROM Producto where id = :id");
    Conexion::statement()->bindParam(':id', $id, PDO::PARAM_INT);
    Conexion::statement()->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Producto", ['id', 'nombre', 'precio', 'descripcion', 'nuevo', 'popular']);
    Conexion::statement()->execute();
    $objetoProducto = Conexion::statement()->fetch();
    Conexion::desconectar();
    return $objetoProducto;
  }

  public static function buscarProductoPorNombre($nombre)
  {
    Conexion::conectar();
    Conexion::preparar("SELECT * FROM Producto where nombre = :nombre");
    Conexion::statement()->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    Conexion::statement()->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Producto", ['id', 'nombre', 'precio', 'descripcion', 'nuevo', 'popular']);
    Conexion::statement()->execute();
    $objetoProducto = Conexion::statement()->fetch();
    Conexion::desconectar();
    return $objetoProducto;
  }
}

class Producto
{
  private $id;
  private $nombre;
  private $precio;
  private $descripcion;
  private $nuevo;
  private $popular;


  public function __construct($id, $nombre, $precio, $descripcion, $nuevo, $popular)
  {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->precio = $precio;
    $this->descripcion = $descripcion;
    $this->nuevo = $nuevo;
    $this->popular = $popular;
  }

  public function getId()
  {
    return $this->id;
  }
  public function getNombre()
  {
    return $this->nombre;
  }
  public function getPrecio()
  {
    return $this->precio;
  }
  public function getNuevo()
  {
    return $this->nuevo;
  }
  public function getPopular()
  {
    return $this->popular;
  }
  public function getDescripcion()
  {
    return $this->descripcion;
  }
}
