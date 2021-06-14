<?php
require_once("model/productos.php");
require_once("model/comentarios.php");
require_once("model/usuarios.php");
session_start();

class  productos
{

  public const RUTA_IMGS = "./public/assets/img/products/product";


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

  private function mostrarProductoIndividual($producto, $idProducto)
  {

    //RUTA DONDE ESTAN LAS IMAGENES
    //ESTO FUNCIONA SI ALGUIEN COMENTA ALGO SOBRE EL PRODUCTO
    //VERIFICAMOS SI SE ENVIO EL COMENTARIO
    $comentarios = ComentarioDAO::mostrarComentariosParaCadaProducto($idProducto);

    if (isset($_POST['in_enviar_comentario'])) {
      //VERIFICAMOS SI EL USUARIO ESTA LOGUEADO
      if (isset($_SESSION['username'])) {
        $idUsuario = $_SESSION['id'];
        $comentario = $_POST['in_comentario'];
        ComentarioDAO::crearComentario($idProducto, $idUsuario, $comentario);
        $comentarios = ComentarioDAO::mostrarComentariosParaCadaProducto($idProducto);
        require_once("view/product_details.php");
        require_once("view/modal/modal_comentario_recibido.php");
      } else {
        require_once("view/product_details.php");
        require_once("view/modal/modal_sesion_inactiva.php");
      }
    } else {

      require_once("view/product_details.php");
    }
  }

  public function mostrarProducto()
  {
    $idProducto = (int) $_GET['productoID'];
    $producto = productosDAO::mostrarProducto($idProducto);


    //ESTO VERIFICA QUE HAYAN PASADO UN ID DE PRODUCTO EXISTENTE
    if ($producto == null) {
      $mensaje = "El producto {$idProducto} no existe en nuestro sitio";
      require_once("view/error.php");
    } else {
      $this->mostrarProductoIndividual($producto, $idProducto);
    }
  }
  /* 
  private function estaEncontrado($producto, $idProducto)
  {
   
  }

  public function buscarProductoPorNombre()
  {
    $nombreProducto = $_GET['searchProduct'];
    $producto = productosDAO::buscarProductoPorNombre($nombreProducto);
    if ($producto == null) {
      $mensaje = "El producto de nombre {$nombreProducto} no existe en nuestro sitio";
      require_once("view/error.php");
    }
    $idProducto = $producto->getId();
    $this->estaEncontrado($producto, $idProducto);
   
  } */
}
