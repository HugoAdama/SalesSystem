<?php

$id_compra_get = $_GET['id'];

$sql_compras = "SELECT *, co.precio_compra as precio_compra, 
                pro.codigo as codigo, pro.nombre as nombre_producto, pro.descripcion as descripcion, pro.stock as stock, 
                pro.stock_minimo as stock_minimo, pro.stock_maximo as stock_maximo,pro.precio_compra as precio_compra_producto,
                pro.precio_venta as precio_venta_producto, pro.fecha_ingreso as fecha_ingreso,pro.imagen as imagen,
                cat.nombre_categoria as nombre_categoria, us.nombres as nombre_usuarios_producto,
                prov.nombre_proveedor as nombre_proveedor,prov.celular as celular_proveedor, prov.telefono as telefono_proveedor,
                prov.empresa as empresa_proveedor,prov.email as email_proveedor,prov.direccion as direccion_proveedor, us.nombres as nombres_usuario 
                FROM tb_compras as co 
                INNER JOIN tb_almacen as pro ON co.id_producto = pro.id_producto 
                INNER JOIN tb_categoria as cat ON cat.id_categoria = pro.id_categoria
                INNER JOIN tb_usuarios as us ON co.id_usuario = us.id_usuario 
                INNER JOIN tb_proveedores as prov ON co.id_proveedor = prov.id_proveedor WHERE co.id_compra = '$id_compra_get' ";
$query_compras = $pdo->prepare($sql_compras);
$query_compras->execute();
$compras_datos = $query_compras->fetchAll(PDO::FETCH_ASSOC);


foreach ($compras_datos as $compra_dato) {


    $id_compra = $compra_dato['id_compra'];
    $id_producto = $compra_dato['id_producto'];
    $id_proveedor_tabla = $compra_dato['id_proveedor'];


    // Datos de la compra

    $nro_compra = $compra_dato['nro_compra'];
    $codigo = $compra_dato['codigo'];
    $nombre_categoria = $compra_dato['nombre_categoria'];
    $nombre_producto = $compra_dato['nombre_producto'];
    $nombre_usuario = $compra_dato['nombres_usuario'];
    $descripcion = $compra_dato['descripcion'];
    $stock = $compra_dato['stock'];
    $stock_minimo = $compra_dato['stock_minimo'];
    $stock_maximo = $compra_dato['stock_maximo'];
    $precio_compra_producto = $compra_dato['precio_compra_producto'];
    $precio_venta_producto = $compra_dato['precio_venta_producto'];
    $fecha_ingreso = $compra_dato['fecha_ingreso'];
    $imagen = $compra_dato['imagen'];

    // Datos del proveedor

    $nombre_proveedor_tabla = $compra_dato['nombre_proveedor'];
    $celular_proveedor = $compra_dato['celular_proveedor'];
    $telefono_proveedor = $compra_dato['telefono_proveedor'];
    $empresa_proveedor = $compra_dato['empresa_proveedor'];
    $email_proveedor = $compra_dato['email_proveedor'];
    $direccion_proveedor = $compra_dato['direccion_proveedor'];

    // Datos de la compra

    $fecha_compra = $compra_dato['fecha_compra'];
    $comprobante = $compra_dato['comprobante'];
    $precio_compra = $compra_dato['precio_compra'];
    $cantidad = $compra_dato['cantidad'];
}
