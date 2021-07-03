<?php
require_once('./conexion.php');

class ComentarioDAO
{

  public static function crearComentario($idProducto, $idUsuario, $comentario)
  {
    date_default_timezone_set('America/Argentina/Buenos_Aires'); // seteo hora local
    $fechaDePublicacion =  date('Y-m-d H:i:s');
    Conexion::conectar();
    Conexion::preparar("INSERT INTO Comentario (id_producto,id_usuario,comentario,fecha_publicacion) VALUES (:id_producto,:id_usuario,:comentario,:fecha_publicacion)");
    Conexion::statement()->bindParam(':id_producto', $idProducto, PDO::PARAM_INT);
    Conexion::statement()->bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);
    Conexion::statement()->bindParam(':comentario', $comentario, PDO::PARAM_STR);
    Conexion::statement()->bindParam(':fecha_publicacion', $fechaDePublicacion);
    Conexion::statement()->execute();
    Conexion::desconectar();
  }

  public static function mostrarComentariosParaCadaProducto($id)
  {
    Conexion::conectar();
    Conexion::preparar("SELECT * from Comentario where id_producto = :id");
    Conexion::statement()->bindParam(':id', $id, PDO::PARAM_INT);
    Conexion::statement()->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Comentario", ['id', 'id_producto', 'id_usuario', 'comentario', 'fecha_publicacion']);
    Conexion::statement()->execute();
    $array = Conexion::statement()->fetchAll();
    Conexion::desconectar();
    return $array;
  }
}


class Comentario
{

  private $id;
  private $id_producto;
  private $id_usuario;
  private $comentario;
  private $fecha_publicacion;


  public function __construct($id, $id_producto, $id_usuario, $comentario, $fecha_publicacion)
  {
    $this->id = $id;
    $this->id_producto = $id_producto;
    $this->id_usuario = $id_usuario;
    $this->comentario = $comentario;
    $this->fecha_publicacion = $fecha_publicacion;
  }


  public function getId()
  {
    return $this->id;
  }
  public function getIdProducto()
  {
    return $this->id_producto;
  }
  public function getIdUsuario()
  {
    return $this->id_usuario;
  }
  public function getComentario()
  {
    return $this->comentario;
  }

  public function getFechaDePublicacion()
  {
    return $this->fecha_publicacion;
  }
}
