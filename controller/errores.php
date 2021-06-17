<?php 


class errores
{
  function errorRuta()
  {
    $mensaje = "Esta ruta no existe";
    require_once("view/error.php");
  }

  function errorProducto(){
    $mensaje = "El producto {$_GET['productoID']} no existe en nuestro sitio ";
    require_once("view/error.php");
  }
}

?>