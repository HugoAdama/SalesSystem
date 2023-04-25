<?php

$id_usuario_get = $_GET['id'];

$sql_usuarios = "SELECT usuarios.id_usuario as id_usuario, usuarios.nombres as nombres ,usuarios.email as email, rol.rol as rol
FROM tb_usuarios as usuarios INNER JOIN tb_roles as rol ON usuarios.id_rol = rol.id_rol WHERE usuarios.id_usuario = $id_usuario_get";

$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuario_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuario_datos as $usuario_dato) {
    $nombres = $usuario_dato['nombres'];
    $email = $usuario_dato['email'];
    $rol = $usuario_dato['rol'];
}
