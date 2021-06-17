
<?php

require_once("model/suscripcion.php");

class suscripcion{

  function suscribir()
  {
    if (isset($_POST['suscripcionEnviar'])) {

      if (isset($_POST['suscripcion'])) {

        if (!empty($_POST['suscripcion'])) {

          if(!SuscripcionDAO::estaSuscripto($_POST['suscripcion'])){
            SuscripcionDAO::suscribirUsuario($_POST['suscripcion']);
            call('home','inicio');
            require_once("view/modal/modal_suscripcion.php");
          }else{
            call('home','inicio');
            require_once("view/modal/modal_suscripcion_error.php");
          }
        }
      }
    }
  }

}

?>