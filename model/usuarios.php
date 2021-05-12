 <?php

  class UsuariosDAO
  {

    public static $FILE = "./json/usuarios.json";

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

      $user = array(
        "user" => $usuario,
        "pwd" => $pwd
      );

      array_push($arr_usuarios, $user);

      $jsondata = json_encode($arr_usuarios, JSON_PRETTY_PRINT);

      file_put_contents(UsuariosDAO::$FILE, $jsondata);
    }
  }



  ?>