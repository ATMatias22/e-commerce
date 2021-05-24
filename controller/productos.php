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

    if (isset($_POST['in_enviar_pregunta'])) {
      $pregunta = $_POST['in_pregunta'];
      $idProducto = $_POST['id_producto'];
      $idUsuario = $_SESSION['id'];
      
?>
      <div class='modal' style='z-index:20000;top:20%' tabindex='-1' role='dialog' id='ventana-modal'>
        <div class='modal-dialog' role='document'>
          <div class='modal-content' style=' border-radius: 12px;'>
            <div class='modal-header justify-content-center text-white' style='background-color:red;'>
              <h5 class='modal-title text-center'>Gracias por su pregunta </h5>
            </div>
            <div class='modal-body ' style='background-color:#e0e0e0;'>
              <p class='text-center ' style='color:black;'>Su pregunta <br><?= $pregunta ?> <br>fue realizada con exito</p>
            </div>
            <div class='modal-footer border-0 p-2' data-dismiss="modal" style='background-color:#e0e0e0;'>
              <button type='button' class='btn '><a class='text-white' >Volver</a></button>
            </div>
          </div>
        </div>
      </div>

<?php
    }

    
    $idProducto = $_GET['productoID'];
    $producto = productosDAO::mostrarProducto($idProducto);
    if ($producto == null) {
      $mensaje = "El producto {$idProducto} no existe en nuestro sitio";
      require_once("view/error.php");
    } else {
      require_once("view/product_details.php");
    }
  }
}
