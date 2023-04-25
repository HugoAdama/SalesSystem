<?php

include('../../config.php');

$nombre_categoria = $_GET['nombre_categoria'];

$sentencia = $pdo->prepare("INSERT INTO tb_categoria (nombre_categoria ,fyh_creacion) VALUES (:nombre_categoria,:fyh_creacion)");

$sentencia->bindParam('nombre_categoria', $nombre_categoria);
$sentencia->bindParam('fyh_creacion', $fechaHora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Categoria registrada correctamente";
    $_SESSION['icono'] = "success";
?>
    <script>
        location.href = '<?php echo $URL; ?>/categorias/';
    </script>
<?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error al registrar la categoria";
    $_SESSION['icono'] = "error";
?>
    <script>
        location.href = '<?php echo $URL; ?>/categorias/';
    </script>
<?php } ?>