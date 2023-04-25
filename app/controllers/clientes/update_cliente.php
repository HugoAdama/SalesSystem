<?php

include('../../config.php');

$id_cliente = $_GET['id_cliente'];
$nombre_cliente = $_GET['nombre_cliente'];
$nit_ci_cliente = $_GET['nit_ci_cliente'];
$celular_cliente = $_GET['celular_cliente'];
$email_cliente = $_GET['email_cliente'];

$sentencia = $pdo->prepare("UPDATE tb_clientes 
SET nombre_cliente=:nombre_cliente, nit_ci_cliente=:nit_ci_cliente, 
celular_cliente=:celular_cliente, email_cliente=:email_cliente, 
fyh_actualizacion=:fyh_actualizacion 
WHERE id_cliente=:id_cliente");

$sentencia->bindParam(':id_cliente', $id_cliente);
$sentencia->bindParam(':nombre_cliente', $nombre_cliente);
$sentencia->bindParam(':nit_ci_cliente', $nit_ci_cliente);
$sentencia->bindParam(':celular_cliente', $celular_cliente);
$sentencia->bindParam(':email_cliente', $email_cliente);
$sentencia->bindParam(':fyh_actualizacion', $fechaHora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = 'Cliente actualizado exitosamente';
    $_SESSION['icono'] = 'success';
?>
    <script>
        location.href = '<?php echo $URL; ?>/clientes';
    </script>
<?php
} else {
    session_start();
    $_SESSION['mensaje'] = 'Error al actualizar el cliente';
    $_SESSION['icono'] = 'error';
?>
    <script>
        location.href = '<?php echo $URL; ?>/clientes';
    </script>
<?php } ?>