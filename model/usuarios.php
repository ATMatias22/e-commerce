 <?php

  class UsuariosDAO
  {
    public static $FILE = "./json/usuarios.json";

    private static function generarID()
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

    public static function existeUsuario($usuario, $pwd)
    {

      $content = file_get_contents(UsuariosDAO::$FILE);

      $arr_usuarios = json_decode($content, true);

      $return = false;
      foreach ($arr_usuarios as $cred) {

        if ($cred["user"] == $usuario && $cred["pwd"] == $pwd) {
          $return = true;
          break;
        }
      }

      return $return;
    }

    public static function crearUsuario($usuario, $pwd)
    {
      $content = file_get_contents(UsuariosDAO::$FILE);
      $arr_usuarios = json_decode($content, true);
      $id = self::generarID();
      $user = array(
        "id" => $id,
        "user" => $usuario,
        "pwd" => $pwd
      );
      array_push($arr_usuarios, $user);
      $jsondata = json_encode($arr_usuarios, JSON_PRETTY_PRINT);
      file_put_contents(UsuariosDAO::$FILE, $jsondata);
    }


    public static function buscarUsuarioPorId($id)
    {
      $content = file_get_contents(UsuariosDAO::$FILE);
      $arr_usuarios = json_decode($content, true);
      $i = 0;
      $objetoUsuario = null;
      while ($i < sizeof($arr_usuarios) && is_null($objetoUsuario)) {
        $idUser = $arr_usuarios[$i]["id"];
        $user = $arr_usuarios[$i]["user"];
        $password = $arr_usuarios[$i]["pwd"];
        if ($idUser == $id) {
          $objetoUsuario = new Usuario($idUser,$user,$password);
        }
        $i++;
      }
      return $objetoUsuario;
    }

    public static function buscarIdDelUsuarioPorNombre($nombre)
    {
      $content = file_get_contents(UsuariosDAO::$FILE);
      $arr_usuarios = json_decode($content, true);
      $i = 0;
      $idUsuario = null;
      while ($i < sizeof($arr_usuarios) && is_null($idUsuario)) {
        if ($arr_usuarios[$i]["user"] == $nombre) {
          $idUsuario = $arr_usuarios[$i]["id"];
        }
        $i++;
      }
      return $idUsuario;
    }
  }


  class Usuario{

    private $id;
    private $usuario;
    private $password;

    function __construct($id, $usuario, $password)
    {
      $this->$id = $id;
      $this->usuario = $usuario;
      $this->password = $password;
    }

    public function getId()
    {
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
  }


  ?>