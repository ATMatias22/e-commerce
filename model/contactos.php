<?php
require_once('./conexion.php');


class ContactosDAO
{
  public static function crearContacto($name,$message,$email,$subject)
  {

    date_default_timezone_set('America/Argentina/Buenos_Aires'); // seteo hora local
    $fecha =  date('Y-m-d H:i:s');
    Conexion::conectar();
    Conexion::preparar("INSERT INTO contacto (nombre,sujeto,mail,mensaje,fecha) VALUES (:nombre,:sujeto,:mail,:mensaje,:fecha)");
    Conexion::statement()->bindParam(':nombre', $name, PDO::PARAM_STR);
    Conexion::statement()->bindParam(':sujeto', $subject, PDO::PARAM_STR);
    Conexion::statement()->bindParam(':mail', $email, PDO::PARAM_STR);
    Conexion::statement()->bindParam(':mensaje', $message);
    Conexion::statement()->bindParam(':fecha', $fecha);
    Conexion::statement()->execute();
    Conexion::desconectar();

  }
}
