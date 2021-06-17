<?php
session_start();
require_once("model/usuarios.php");

class usuarios
{

  function login()
  {

    if (isset($_POST["username"]) && isset($_POST["password"])) {

      if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        if (UsuariosDAO::existeUsuario($_POST["username"], $_POST["password"])) {
          $_SESSION["username"] = $_POST["username"];
          $_SESSION["id"] = UsuariosDAO::buscarIdDelUsuarioPorNombre($_POST["username"], $_POST['password']);
          header("Location: ./index.php?controller=home&action=inicio");
        } else {
          $_SESSION["msg"] = "El usuario no existe";
          require_once("view/login.php");
        }
      } else {
        $_SESSION["msg"] = "Campos incompletos";
        require_once("view/login.php");
      }
    } else {
      $_SESSION["msg"] = "Campos incompletos";
      require_once("view/login.php");
    }
  }

  function registrar()
  {

    if (isset($_POST["username"]) && isset($_POST["password"])) {

      if (!empty($_POST["username"]) && !empty($_POST["password"])) {

        if (!UsuariosDAO::usuarioOcupado($_POST["username"])) {
          UsuariosDAO::crearUsuario($_POST["username"], $_POST["password"]);
          $_SESSION["username"] = $_POST["username"];
          $_SESSION["id"] = UsuariosDAO::buscarIdDelUsuarioPorNombre($_POST["username"], $_POST['password']);
          header("Location: ./index.php?controller=home&action=inicio");
        } else {
          $_SESSION["msg"] = "El usuario ya existe";
          require_once("view/login.php");
        }
      } else {
        $_SESSION["msg"] = "Campos incompletos";
        require_once("view/login.php");
      }
    } else {
      $_SESSION["msg"] = "Campos incompletos";
      require_once("view/login.php");
    }
  }
}
