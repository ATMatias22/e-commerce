<?php

const HOST = 'localhost';
const USER = 'root';
const PASS = '';
const DB_NAME = 'Relojeria';

$mysqli = new mysqli(HOST,USER,PASS,DB_NAME);
if($mysqli->connect_errno){
  die("Error ". $mysqli->errno. " - ". $mysqli->connect_error);
}
?>