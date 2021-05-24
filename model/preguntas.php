<?php

class Pregunta
{

  private $idPregunta;
  private $idProducto;
  private $idUsuario;
  private $pregunta;
  private $respuestas;


  public function __construct($idProducto, $idUsuario, $pregunta)
  {
    $this->idProducto = $idProducto;
    $this->idUsuario = $idUsuario;
    $this->pregunta = $pregunta;
    $this->respuestas = [];
  }

  public function getIdProducto()
  {
    return $this->idProducto;
  }
  public function getIdUsuario()
  {
    return $this->idUsuario;
  }
  public function getPregunta()
  {
    return $this->pregunta;
  }

  public function agregarRespuesta($respuesta){
    array_push($this->respuestas, $respuesta);
  }

}
