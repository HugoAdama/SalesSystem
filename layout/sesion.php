<?php
session_start();
if (isset($_SESSION['sesion_email'])) {
    //echo "Bienvenido " . $_SESSION['sesion_email'];
    $email_sesion = $_SESSION['sesion_email'];
    $sql = "SELECT usuarios.id_usuario as id_usuario, usuarios.nombres as nombres ,usuarios.email as email, rol.rol as rol 
FROM `tb_usuarios` as usuarios INNER JOIN tb_roles as rol ON usuarios.id_rol = rol.id_rol WHERE email='$email_sesion'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($usuarios as $usuario) {
        $id_usuario_sesion = $usuario['id_usuario'];
        $nombres_sesion = $usuario['nombres'];
        $rol_sesion = $usuario['rol'];
    }
} else {
    echo "No existe la sesión";
    header('Location: ' . $URL . '/login');
}
