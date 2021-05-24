<?php

class Comentario
{
  private $idComentario;
  private $idProducto;
  private $idUsuario;
  private $comentario;


  public function __construct($idProducto, $idUsuario, $comentario)
  {
    $this->idProducto = $idProducto;
    $this->idUsuario = $idUsuario;
    $this->comentario = $comentario;
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
}
