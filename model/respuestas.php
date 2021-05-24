<?php

class Respuesta
{
  private $idRespuesta;
  private $idPregunta;
  private $idUsuario;
  private $respuesta;


  public function __construct($idPregunta, $idUsuario, $respuesta)
  {
    $this->idPregunta = $idPregunta;
    $this->idUsuario = $idUsuario;
    $this->respuesta = $respuesta;
  }

  public function getIdPregunta()
  {
    return $this->idPregunta;
  }
  public function getIdUsuario()
  {
    return $this->idUsuario;
  }
  public function getRespuesta()
  {
    return $this->respuesta;
  }
}
