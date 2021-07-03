<?php 


class errores
{
  function errorRuta()
  {
    $mensaje = "Esta ruta no existe";
    require_once("view/error.php");
  }

  function errorProducto(){
    //ESTE ERROR SOLO OCURRE CUANDO VAMOS AL PRODUCTO INDIVIDUAL Y PASAN UN ID INCORRECTO
    if(isset($_GET['productoID'])){
      $mensaje = "El producto {$_GET['productoID']} no existe en nuestro sitio ";
      require_once("view/error.php");
    }else{
      //EN CASO DE QUE VAYAN AL PRODUCTO INDIVIIDUAL Y NO EXISTA ESTA VARIABLE TIRARA ERROR DE RUTA
      $this->errorRuta();
    }

  }
}

?>