<?php

session_start();
require_once("model/productos.php");

class home
{
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

  function contact()
  {
    require_once("view/contact.php");
  }
  function checkout()
  {
    require_once("view/checkout.php");
  }



  function login()
  {

    if (isset($_SESSION['username'])) {
      $this->inicio();
    } else {
      require_once("view/login.php");
    }
  }

  function register()
  {
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
