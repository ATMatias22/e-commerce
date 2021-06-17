 <?php

  require_once('./conexion.php');

  class UsuariosDAO
  {

    public static function usuarioOcupado($usuario)
    {
      Conexion::conectar();
      Conexion::preparar('select * from Usuario where user=:user');
      Conexion::statement()->bindParam(':user', $usuario, PDO::PARAM_STR);
      Conexion::statement()->execute();
      $resultado = Conexion::statement()->rowCount();
      Conexion::desconectar();
      return $resultado > 0 ? true : false;
    }

    public static function existeUsuario($usuario, $pwd)
    {
      Conexion::conectar();
      Conexion::preparar('SELECT * FROM Usuario where user=:user AND password=:password');
      Conexion::statement()->bindParam(':user', $usuario, PDO::PARAM_STR);
      Conexion::statement()->bindParam(':password', $pwd, PDO::PARAM_STR);
      Conexion::statement()->execute();
      $resultado = Conexion::statement()->rowCount();
      Conexion::desconectar();
      return $resultado > 0 ? true : false;
    }

    public static function crearUsuario($usuario, $pwd)
    {
      Conexion::conectar();
      Conexion::preparar("INSERT INTO Usuario (user,password) VALUES (:user,:password)");
      Conexion::statement()->bindParam(':user', $usuario, PDO::PARAM_STR);
      Conexion::statement()->bindParam(':password', $pwd, PDO::PARAM_STR);
      Conexion::statement()->execute();
      Conexion::desconectar();
    }


    public static function buscarUsuarioPorId($id)
    {

      Conexion::conectar();
      Conexion::preparar("SELECT * FROM Usuario where id = :id");
      Conexion::statement()->bindParam(':id', $id, PDO::PARAM_INT);
      Conexion::statement()->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Usuario", ['id', 'user', 'password']);
      Conexion::statement()->execute();
      $objetoUsuario = Conexion::statement()->fetch();
      Conexion::desconectar();
     /*  $idEncontrado = $objetoUsuario['id'];
      $user = $objetoUsuario['user'];
      $password = $objetoUsuario['password'];
      $objetoUsuario = new Usuario($idEncontrado, $user, $password); */

      return $objetoUsuario->getUser();
    }

    public static function buscarIdDelUsuarioPorNombre($user,$password)
    {

      Conexion::conectar();
      Conexion::preparar('SELECT * FROM Usuario where user = :user and password = :password');
      Conexion::statement()->bindParam(':user', $user, PDO::PARAM_STR);
      Conexion::statement()->bindParam(':password', $password, PDO::PARAM_STR);
      Conexion::statement()->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Usuario", ['id', 'user', 'password']);
      Conexion::statement()->execute();
      $objetoUsuario = Conexion::statement()->fetch();
      Conexion::desconectar();
    
      return intval($objetoUsuario->getId());

    }



  }


  class Usuario
  {

    private $id;
    private $user;
    private $password;

    function __construct($id, $user, $password)
    {
      $this->$id = $id;
      $this->user = $user;
      $this->password = $password;
    }

    public function getId()
    {
      return $this->id;
    }
    public function getUser()
    {
      return $this->user;
    }
    public function getPassword()
    {
      return $this->password;
    }
  }


  ?>