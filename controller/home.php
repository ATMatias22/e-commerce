<?php

session_start();
require_once("model/productos.php");

class home
{
  //esta ruta es utilizada en las vistas que muestran los productos
  public const RUTA_IMGS = "./public/assets/img/products/product";

  function inicio()
  {
   
    $array_prod = productosDAO::productosNuevos();
    require_once("view/home.php");

  }
  function about()
  {
    require_once("view/about.php");
  }

  function cart()
  {
    require_once("view/cart.php");
  }

  function login()
  {
    //EN CASO DE EXISTIR SESION QUE ME MANDE AL INICIO
    if (isset($_SESSION['username'])) {
      $this->inicio();
    } else {
      require_once("view/login.php");
    }
  }

  function register()
  {
    //EN CASO DE EXISTIR SESION QUE ME MANDE AL INICIO
    if (isset($_SESSION['username'])) {
      $this->inicio();
    } else {
      require_once("view/register.php");
    }
  }

  function cerrar_sesion()
  {
    require_once("view/cerrar_sesion.php");
  }
}
