 <?php

  class UsuariosDAO
  {
    public static $FILE = "./json/usuarios.json";
    public static $FILE_PREGUNTA = "./json/comentarios.json";
    private $id;
    private $usuario;
    private $password;

    function __construct($usuario, $password)
    {
      $this->usuario = $usuario;
      $this->password = $password;
    }

    public function getId(){
      return $this->id;
    }
    public function getUsuario()
    {
      return $this->usuario;
    }
    public function getPassword()
    {
      return $this->password;
    }


    public function persistirUsuario()
    {
      $content = file_get_contents(UsuariosDAO::$FILE);
      $arr_usuarios = json_decode($content, true);
      $this->id = $this->generarID();
      $user = array(
        "id" => $this->id,
        "user" => $this->usuario,
        "pwd" => $this->password
      );
      array_push($arr_usuarios, $user);
      $jsondata = json_encode($arr_usuarios, JSON_PRETTY_PRINT);
      file_put_contents(UsuariosDAO::$FILE, $jsondata);
    }

    private  function generarID()
    {
      $content = file_get_contents(UsuariosDAO::$FILE);
      $arr_usuarios = json_decode($content, true);
      return count($arr_usuarios) + 1;
    }


    public static function usuarioOcupado($usuario)
    {

      $content = file_get_contents(UsuariosDAO::$FILE);

      $arr_usuarios = json_decode($content, true);

      $return = false;
      foreach ($arr_usuarios as $cred) {

        if ($cred["user"] == $usuario) {
          $return = true;
          break;
        }
      }

      return $return;
    }

    public static function buscarUsuario($usuario, $pwd)
    {

      $content = file_get_contents(UsuariosDAO::$FILE);
      $arr_usuarios = json_decode($content, true);
      $i = 0;
      $idUsuario = null;
      while($i < sizeof($arr_usuarios) && is_null($idUsuario)){
        if($arr_usuarios[$i]["user"] == $usuario && $arr_usuarios[$i]["pwd"] == $pwd){
          $idUsuario = $arr_usuarios[$i]["id"];
        }
        $i++;
      }
      return $idUsuario;
    }

  }



  ?>