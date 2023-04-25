<?php

include('../../config.php');

$nombre_cliente = $_POST['nombre_cliente'];
$nit_ci_cliente = $_POST['nit_ci_cliente'];
$celular_cliente = $_POST['celular_cliente'];
$email_cliente = $_POST['email_cliente'];

$sentencia = $pdo->prepare("INSERT INTO tb_clientes 
( nombre_cliente, nit_ci_cliente, celular_cliente,email_cliente  , fyh_creacion ) 
VALUES ( :nombre_cliente, :nit_ci_cliente, :celular_cliente,:email_cliente ,:fyh_creacion)");

$sentencia->bindParam(':nombre_cliente', $nombre_cliente);
$sentencia->bindParam(':nit_ci_cliente', $nit_ci_cliente);
$sentencia->bindParam(':celular_cliente', $celular_cliente);
$sentencia->bindParam(':email_cliente', $email_cliente);
$sentencia->bindParam(':fyh_creacion', $fechaHora);

if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = 'Cliente creado exitosamente';
    $_SESSION['icono'] = 'success';
    ?>
    <script>
        location.href = '<?php echo $URL; ?>/clientes';
    </script>
<?php } else { 
    
    session_start();
    $_SESSION['mensaje'] = 'Error al crear el cliente';
    $_SESSION['icono'] = 'error';
    ?>
    <script>
        location.href = '<?php echo $URL; ?>/clientes';
    </script>
<?php }
