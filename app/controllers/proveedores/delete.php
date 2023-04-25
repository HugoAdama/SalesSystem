<?php

include('../../config.php');

$id_proveedor = $_GET['id_proveedor'];

$sentencia = $pdo->prepare("DELETE FROM tb_proveedores WHERE id_proveedor = :id_proveedor");

$sentencia->bindParam('id_proveedor', $id_proveedor);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = 'Se elimino al proveedor correctamente';
    $_SESSION['icono'] = 'success';
?>
    <script>
        location.href = '<?php echo $URL . '/proveedores/'; ?>';
    </script>
<?php
} else {
    session_start();
    $_SESSION['mensaje'] = 'No se pudo eliminar al proveedor';
    $_SESSION['icono'] = 'error';
?>
    <script>
        location.href = '<?php echo $URL . '/proveedores/'; ?>';
    </script>
<?php }     ?>