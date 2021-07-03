<?php
require_once("model/productos.php");
require_once("model/comentarios.php");
require_once("model/usuarios.php");
session_start();

class  productos
{
  //esta ruta es utilizada en las vistas que muestran los productos
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
    
    //el $producto del parametro es utilizado cuando se llaman a las vistas, ya que esa view/product_details.php pide un producto

    //GUARDAMOS EN UN ARRAY LOS COMENTARIOS DEL PRODUCTO INDIVIDUAL PARA MOSTRARLO EN LA VISTA
    $comentarios = ComentarioDAO::mostrarComentariosParaCadaProducto($idProducto);

    //VERIFICAMOS SI ALGUIEN MANDO UN COMENTARIO SINO MOSTRAMOS LA VISTA NORMALMENTE
    if (isset($_POST['in_enviar_comentario'])) {
      //VERIFICAMOS SI EL USUARIO ESTA LOGUEADO SINO LE PEDIMOS QUE SE LOGUEE PARA QUE PUEDA COMENTAR
      if (isset($_SESSION['username'])) {
        $idUsuario = $_SESSION['id'];
        $comentario = $_POST['in_comentario'];
        ComentarioDAO::crearComentario($idProducto, $idUsuario, $comentario);
        //VOLVEMOS A SOBREESCRIBIR EL ARRAY PERO CON EL NUEVO COMENTARIO AGREGADO
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
    //VERIFICAMOS QUE  EXISTA LA VARIABLE productoID EN CASO DE NO EXISTIR LA VARIABLE PRODUCTOID NOS MANDA UN ERROR DE RUTA
    if (isset($_GET['productoID'])) {
      $idProducto = (int) $_GET['productoID'];
      $producto = productosDAO::mostrarProducto($idProducto);
      //ESTO VERIFICA SI NO SE ENCONTRO PRODUCTO Y NOS MANDA ERROR DE ID PRODUCTO, EN CASO CONTRARIO NOS MUESTRA EL PRODUCTO INDIVIDUAL
      if ($producto == null) {
        header("Location: ./index.php?controller=errores&action=errorProducto&productoID={$idProducto}");
      } else {
        $this->mostrarProductoIndividual($producto, $idProducto);
      }
    } else {
      header("Location: ./index.php?controller=errores&action=errorRuta");
    }
  }










}
