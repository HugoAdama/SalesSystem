<?php

include('../../config.php');

$id_venta = $_GET['id_venta'];
$nro_venta = $_GET['nro_venta'];

$pdo->beginTransaction();

$sentencia = $pdo->prepare("DELETE FROM tb_ventas WHERE id_venta=:id_venta");

$sentencia->bindParam('id_venta', $id_venta);

if ($sentencia->execute()) {

    $sentencia_borrar_carrito = $pdo->prepare("DELETE FROM tb_carrito WHERE nro_venta = :nro_venta");

    $sentencia_borrar_carrito->bindParam('nro_venta', $nro_venta);

    $sentencia_borrar_carrito->execute();

    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = 'Venta eliminada correctamente';
    $_SESSION['icono'] = 'success';
?>
    <script>
        location.href = '<?php echo $URL; ?>/ventas';
    </script>

<?php } else {

    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = 'No se pudo eliminar la venta';
    $_SESSION['icono'] = 'error';
?>
    <script>
        location.href = '<?php echo $URL; ?>/ventas';
    </script>
<?php } ?>