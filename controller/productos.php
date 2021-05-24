<?php
require_once("model/productos.php");
require_once("model/comentarios.php");
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
    if (isset($_POST['in_enviar_comentario'])) {
      if (isset($_SESSION['username'])) {

        $idUsuario = $_SESSION['id'];
        $comentario = $_POST['in_comentario'];
        $objetoComentario = new Comentario($idProducto, $idUsuario, $comentario);
        $objetoComentario->persistirComentario();

        require_once("view/modal/modal_comentario_recibido.php");
      } else {
        require_once("view/modal/modal_sesion_inactiva.php");
      }
    }



    if ($producto == null) {
      $mensaje = "El producto {$idProducto} no existe en nuestro sitio";
      require_once("view/error.php");
    } else {
      $comentarios = Comentario::mostrarComentariosParaCadaProducto($idProducto);
      require_once("view/product_details.php");
    }
  }
}
