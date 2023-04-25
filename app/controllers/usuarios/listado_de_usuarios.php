<?php
// Path: app\controllers\usuarios\listado_de_usuarios.php

$sql_usuarios = "SELECT usuarios.id_usuario as id_usuario, usuarios.nombres as nombres ,usuarios.email as email, rol.rol as rol 
FROM tb_usuarios as usuarios INNER JOIN tb_roles as rol ON usuarios.id_rol = rol.id_rol";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();

$usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
