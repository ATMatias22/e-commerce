<?php

require_once("model/usuarios.php");

class usuarios
{

  function login()
  {

    if (isset($_POST["username"]) && isset($_POST["password"])) {

      if (!empty($_POST["username"]) && !empty($_POST["password"])) {

        if (UsuariosDAO::existeUsuario($_POST["username"], $_POST["password"])) {

          $_SESSION["username"] = $_POST["username"];
          /* require_once("view/home.php"); */
          header("location: view/home.php");

        } else {

          $_SESSION["msg"] = "El usuario no existe";
          header("location: view/login.php");
        }
      } else {

        $_SESSION["msg"] = "Campos incompletos";
        header("location: view/login.php");
      }
    } else {

      $_SESSION["msg"] = "Campos incompletos";
      header("location: view/login.php");
    }
  }

  function registrar()
  {

    if (isset($_POST["username"]) && isset($_POST["password"])) {

      if (!empty($_POST["username"]) && !empty($_POST["password"])) {

        if (!UsuariosDAO::usuarioOcupado($_POST["username"])) {

          UsuariosDAO::crearUsuario($_POST["username"], $_POST["password"]);
          $_SESSION["username"] = $_POST["username"];
         /*  require_once("view/home.php"); */
          header("location: view/home.php");

        } else {

          $_SESSION["msg"] = "El usuario ya existe";
          header("location: view/login.php");
        }
      } else {

        $_SESSION["msg"] = "Campos incompletos";
        header("location: view/login.php");
      }
    } else {

      $_SESSION["msg"] = "Campos incompletos";
      header("location: view/login.php");
    }
  }
}
