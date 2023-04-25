<?php

include('../../config.php');

$nro_venta = $_GET['nro_venta'];

$id_producto = $_GET['id_producto'];

$cantidad = $_GET['cantidad'];

$sentencia = $pdo->prepare("INSERT INTO tb_carrito 
(nro_venta, id_producto, cantidad, fyh_creacion) 
VALUES (:nro_venta, :id_producto, :cantidad , :fyh_creacion)");

$sentencia->bindParam(':nro_venta', $nro_venta);
$sentencia->bindParam(':id_producto', $id_producto);
$sentencia->bindParam(':cantidad', $cantidad);
$sentencia->bindParam(':fyh_creacion', $fechaHora);

if ($sentencia->execute()) { ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php";
    </script>

<?php } else { ?>
    <script>
        alert("Error al agregar producto al carrito");
        location.href = "<?php echo $URL; ?>/ventas/create.php";
        <?php    } ?>