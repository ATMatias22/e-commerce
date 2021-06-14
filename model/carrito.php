<?php

require_once('../conexion.php');

$id = $_POST['id'];
Conexion::conectar();
Conexion::preparar("SELECT id,nombre,precio FROM producto WHERE id=:id");
Conexion::statement()->bindParam(':id', $id, PDO::PARAM_INT);
Conexion::statement()->execute();
$objetoProducto = Conexion::statement()->fetch(PDO::FETCH_ASSOC);
Conexion::desconectar();
echo json_encode($objetoProducto);

?>
