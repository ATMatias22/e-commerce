
<?php

require_once("model/suscripcion.php");

class suscripcion
{

  function suscribir()
  {
    //ESTA VERIFICACION SIRVE PARA VER QUE HAYAN TOCADO EL BOTON SUSCRIBIR Y NO HAYAN ENTRADO POR RUTA
    if (isset($_POST['suscripcionEnviar'])) {
      if (isset($_POST['suscripcion'])) {
        if (!empty($_POST['suscripcion'])) {

          //COMPROBAMOS SI EL MAIL YA ESTABA SUSCRIPTO
          if (!SuscripcionDAO::estaSuscripto($_POST['suscripcion'])) {
            SuscripcionDAO::suscribirUsuario($_POST['suscripcion']);
            //USE CALL DEBIDO A QUE QUERIA QUE ME SALGA EL MODAL CON EL REQUIRE, SI USABA HEADER NO ME IBA A SALIR EL REQUIRE
            call('home', 'inicio');
            require_once("view/modal/modal_suscripcion.php");
          } else {
            call('home', 'inicio');
            require_once("view/modal/modal_suscripcion_error.php");
          }
        } else {
          call('home', 'inicio');
          require_once("view/modal/modal_suscripcion_vacio.php");
        }
      }
    } else {
      call('home', 'inicio');
    }
  }
}


?>