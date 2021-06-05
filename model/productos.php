<?php


class productosDAO
{
  public static $FILE = "./json/productos.json";
  
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

    $content = file_get_contents(productosDAO::$FILE);

    $arr_productos = json_decode($content, true);
    $arr_productosNuevos = [];

    foreach ($arr_productos as $prod) {
      $ObjetoProducto = new Producto($prod['id'], $prod['nombre'], $prod['precio'],$prod['descripcion'], $prod['nuevo'], $prod['popular']);
      array_push($arr_productosNuevos, $ObjetoProducto);

    }

    return $arr_productosNuevos;
  }


  public static function  productosNuevos()
  {

    $content = file_get_contents(productosDAO::$FILE);

    $arr_productos = json_decode($content, true);
    /*array de Objetos Producto*/$arr_productosNuevos = [];

    foreach ($arr_productos as $prod) {
      if ($prod['nuevo'] === 1) {
        $ObjetoProducto = new Producto($prod['id'], $prod['nombre'], $prod['precio'],$prod['descripcion'], $prod['nuevo'], $prod['popular']);
        array_push($arr_productosNuevos, $ObjetoProducto);
      }
    }

    return $arr_productosNuevos;
  }


  public static function  productosOrdenadosPorPrecio()
  {
    $content = file_get_contents(productosDAO::$FILE);
    $arr_productos = json_decode($content, true);
    $arr_productosNuevos=[];
    foreach ($arr_productos as $prod) {
        $ObjetoProducto = new Producto($prod['id'], $prod['nombre'], $prod['precio'],$prod['descripcion'], $prod['nuevo'], $prod['popular']);
        array_push($arr_productosNuevos, $ObjetoProducto);
    }
    self::array_sort_by($arr_productosNuevos, SORT_DESC);
    return $arr_productosNuevos;
  }

  public static function  productosPopulares()
  {

    $content = file_get_contents(productosDAO::$FILE);

    $arr_productos = json_decode($content, true);
    /*array de Objetos Producto*/
    $arr_productosNuevos = [];

    foreach ($arr_productos as $prod) {
      if ($prod['popular'] === 1) {
        $ObjetoProducto = new Producto($prod['id'], $prod['nombre'], $prod['precio'],$prod['descripcion'], $prod['nuevo'], $prod['popular']);
        array_push($arr_productosNuevos, $ObjetoProducto);
      }
    }

    return $arr_productosNuevos;
  }


  public static function  mostrarProducto($id)
  {

    $content = file_get_contents(productosDAO::$FILE);
    $arr_productos = json_decode($content, true);
    $ObjetoProducto = null;
    $i = 0;
    while($i < sizeof($arr_productos) && $ObjetoProducto == null){
      $aux = $arr_productos[$i];
      if ($aux['id'] == $id) {
        $ObjetoProducto = new Producto($aux['id'], $aux['nombre'], $aux['precio'], $aux['descripcion'], $aux['nuevo'], $aux['popular']);
      }
      $i++;
    }
    return $ObjetoProducto;
  }

  public static function buscarProductoPorNombre($nombre){
    $content = file_get_contents(productosDAO::$FILE);
    $arr_productos = json_decode($content, true);
    $ObjetoProducto = null;
    $i = 0;
    while ($i < sizeof($arr_productos) && $ObjetoProducto == null) {
      $aux = $arr_productos[$i];
      if ($aux['nombre'] == $nombre) {
        $ObjetoProducto = new Producto($aux['id'], $aux['nombre'], $aux['precio'], $aux['descripcion'], $aux['nuevo'], $aux['popular']);
      }
      $i++;
    }

    
    return $ObjetoProducto;
  }

}

class Producto{
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