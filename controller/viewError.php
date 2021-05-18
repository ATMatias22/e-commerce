<?php 

session_start();

class viewError
{
  function errorRuta()
  {
    $mensaje = "Esta ruta no existe";
    require_once("view/error.php");
  }
}

?>