<?php

class Comentario
{
  public static $FILE_COMENTARIOS = "./json/comentarios.json";
  private $idComentario;
  private $idProducto;
  private $idUsuario;
  private $comentario;
  private $fechaDePublicacion;


  public function __construct($idProducto, $idUsuario, $comentario)
  {
    $this->idProducto = $idProducto;
    $this->idUsuario = $idUsuario;
    $this->comentario = $comentario;
  }


  public function getIdComentario()
  {
    return $this->idComentario;
  }
  public function getIdProducto()
  {
    return $this->idProducto;
  }
  public function getIdUsuario()
  {
    return $this->idUsuario;
  }
  public function getComentario()
  {
    return $this->comentario;
  }

  public function getFechaDePublicacion()
  {
    return $this->fechaDePublicacion;
  }


  private  function generarID()
  {
    $content = file_get_contents(self::$FILE_COMENTARIOS);
    $arr_usuarios = json_decode($content, true);
    return count($arr_usuarios) + 1;
  }

  public function persistirComentario()
  {
    date_default_timezone_set('America/Argentina/Buenos_Aires'); // seteo hora local
    $content = file_get_contents(self::$FILE_COMENTARIOS);
    $arr_usuarios = json_decode($content, true);
    $this->idComentario = $this->generarID();
    $this->fechaDePublicacion =  date('Y-m-d H:i');
    $user = array(
      "id_comentario" => $this->idComentario,
      "id_producto" => $this->idProducto,
      "id_usuario" => $this->idUsuario,
      "comentario" => $this->comentario,
      "fecha_publicacion" => $this->fechaDePublicacion
    );
    array_push($arr_usuarios, $user);
    $jsondata = json_encode($arr_usuarios, JSON_PRETTY_PRINT);
    file_put_contents(self::$FILE_COMENTARIOS, $jsondata);
  }

  public static function mostrarComentariosParaCadaProducto($id){

    $content = file_get_contents(self::$FILE_COMENTARIOS);

    $arr_comentarios = json_decode($content, true);
    /*array de Objetos Comentario*/
    $arr_comentariosNuevos = [];

    foreach ($arr_comentarios as $com) {
      if ($com['id_producto'] == $id) {
        $objetoComentario = new Comentario($com['id_producto'],$com['id_usuario'],$com['comentario']);
        array_push($arr_comentariosNuevos, $objetoComentario);
      }
    }
  
    return $arr_comentariosNuevos;

  }
}
