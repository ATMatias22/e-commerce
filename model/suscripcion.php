<?php

require_once('./conexion.php');


class SuscripcionDAO{

  public static function suscribirUsuario($mail)
  {
    date_default_timezone_set('America/Argentina/Buenos_Aires'); // seteo hora local
    $fechaDePublicacion =  date('Y-m-d H:i:s');

    Conexion::conectar();
    Conexion::preparar("INSERT INTO Suscripcion (mail,fecha) VALUES (:mail,:fecha)");
    Conexion::statement()->bindParam(':mail', $mail, PDO::PARAM_STR);
    Conexion::statement()->bindParam(':fecha', $fechaDePublicacion);
    Conexion::statement()->execute();
    Conexion::desconectar();
  }

  public static function estaSuscripto($mail)
  {
    Conexion::conectar();
    Conexion::preparar("select * from Suscripcion where mail = :mail");
    Conexion::statement()->bindParam(':mail', $mail, PDO::PARAM_STR);
    Conexion::statement()->execute();
    $resultado = Conexion::statement()->rowCount();
    Conexion::desconectar();
    return $resultado > 0 ? true : false;
  }


}


?>