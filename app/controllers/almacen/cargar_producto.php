<?php

$id_producto_get = $_GET['id'];

$sql_productos = "SELECT * , cat.nombre_categoria as categoria , u.nombres as nombre_usuario , u.id_usuario as id_usuario
FROM tb_almacen as a INNER JOIN tb_categoria as cat ON a.id_categoria = cat.id_categoria
INNER JOIN tb_usuarios as u ON u.id_usuario = a.id_usuario WHERE id_producto = $id_producto_get";

$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach ($productos_datos as $producto_dato) {
    $codigo = $producto_dato['codigo'];
    $nombre_categoria = $producto_dato['nombre_categoria'];
    $nombre = $producto_dato['nombre'];
    $nombre_usuario = $producto_dato['nombre_usuario'];
    $id_usuario= $producto_dato['id_usuario'];
    $descripcion = $producto_dato['descripcion'];
    $stock = $producto_dato['stock'];
    $stock_minimo = $producto_dato['stock_minimo'];
    $stock_maximo = $producto_dato['stock_maximo'];
    $precio_compra = $producto_dato['precio_compra'];
    $precio_venta = $producto_dato['precio_venta'];
    $fecha_ingreso = $producto_dato['fecha_ingreso'];
    $imagen = $producto_dato['imagen'];
}
