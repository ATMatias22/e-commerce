<?php
require_once("model/productos.php");
session_start();

class productos
{


  public function shop()
  {
    $array_prod = productosDAO::all();
    require_once("view/shop.php");
  }

  public function productosNuevos()
  {

    $array_prod = productosDAO::productosNuevos();
    require_once("view/shop.php");
  }

  public function productosOrdenadosPorPrecio()
  {
    $array_prod = productosDAO::productosOrdenadosPorPrecio();
    require_once("view/shop.php");
  }

  public function productosPopulares()
  {
    $array_prod = productosDAO::productosPopulares();
    require_once("view/shop.php");
  }


  public function mostrarProducto()
  {
    $idProducto = $_GET['productoID'];
    $producto = productosDAO::mostrarProducto($idProducto);
    if($producto == null){
      $mensaje = "El producto {$idProducto} no existe en nuestro sitio";
      require_once("view/error.php");
    }else{
      require_once("view/product_details.php");
    }
  }
}
