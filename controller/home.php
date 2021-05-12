<?php
require_once("model/productos.php");

class home
{
  function inicio()
  {

    $array_prod = productosDAO::productosNuevos();
     require_once("view/home.php"); 
  }

  function login()
  {
    require_once("view/login.php");
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
  function register()
  {
    require_once("view/register.php");
  }

  function cerrar_sesion()
  {
    require_once("view/cerrar_sesion.php");
  }
}
