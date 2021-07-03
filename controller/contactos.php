<?php

session_start();
require_once("model/contactos.php");

class contactos
{
  function contact()
  {
    require_once("view/contact.php");

    //ESTA VALIDACION ES PARA VER SI SE MANDO EL FORMULARIO DE CONTACTO, EN CASO DE EXISTIR ESTA VARIABLE MANDARA UN MODAL
    if (isset($_POST['enviarContacto'])) {
      //SI NINGUNO DE LOS CAMPOS DEL FORMULARIO ESTA VACIO SE GUARDARA EN LA BASE DE DATOS
      if (!empty($_POST['name']) &&  !empty($_POST['message']) && !empty($_POST['email']) && !empty($_POST['subject'])) {
        ContactosDAO::crearContacto($_POST['name'], $_POST['message'], $_POST['email'], $_POST['subject']);
        require_once("view/modal/modal_contacto_recibido.php");
      } else {
        require_once("view/modal/modal_contacto_error.php");
      }
    }
  }
}
