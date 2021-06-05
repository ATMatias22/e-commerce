<?php

function call($controller, $action)
{

  require_once("controller/$controller.php");

  $controller = new $controller;
  $controller->{$action}();
}

// Aca se configuran los controlares y actions disponibles
$controllers = array(
  'home' => ['inicio','login','about','cart','contact','register', 'checkout','cerrar_sesion'],
  "usuarios" => ["login", "registrar"],
  "productos" => ["shop","productosNuevos", "productosOrdenadosPorPrecio","productosPopulares","mostrarProducto", "buscarProductoPorNombre"]
);

if (array_key_exists($controller, $controllers)) {
  if (in_array($action, $controllers[$controller])) {
    call($controller, $action);
  } else {
    call('viewError', 'errorRuta');
  }
} else {
  call('viewError', 'errorRuta');
}
