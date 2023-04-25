<?php $id_venta_get = $_GET['id_venta']; ?>

<?php $nro_venta_get = $_GET['nro_venta']; ?>

<?php include('../app/config.php'); ?>

<?php include('../layout/sesion.php'); ?>

<?php include('../layout/header.php'); ?>

<?php include('../app/controllers/ventas/cargar_venta.php'); ?>

<?php include('../app/controllers/clientes/cargar_cliente.php'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Eliminar | Detalle de la venta - Nro <?php echo $nro_venta; ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-danger">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-shopping-bag"></i> Venta Nro
                                <input type="text" style="text-align: center;" value="<?= $nro_venta; ?>" disabled>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th style="background-color: #e7e7e7; text-align:center">Nro</th>
                                            <th style="background-color: #e7e7e7; text-align:center">Producto</th>
                                            <th style="background-color: #e7e7e7; text-align:center">Descripcion</th>
                                            <th style="background-color: #e7e7e7; text-align:center">Cantidad</th>
                                            <th style="background-color: #e7e7e7; text-align:center">Precio Unitario</th>
                                            <th style="background-color: #e7e7e7; text-align:center">Precio SubTotal</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador_carrito = 0;
                                        $cantidad_total = 0;
                                        $precio_unitario_total = 0;
                                        $precio_total = 0;

                                        $sql_carrito = "SELECT * , pro.nombre as nombre_producto, pro.descripcion as descripcion , pro.precio_venta as precio_venta , pro.stock as stock , 
                                        pro.id_producto as id_producto 
                                        FROM tb_carrito as carr
                                        INNER JOIN tb_almacen as pro ON carr.id_producto = pro.id_producto
                                        WHERE nro_venta = '$nro_venta' ORDER BY id_carrito ASC";
                                        $query_carrito = $pdo->prepare($sql_carrito);
                                        $query_carrito->execute();
                                        $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($carrito_datos as $carrito_dato) {

                                            $id_carrito = $carrito_dato['id_carrito'];
                                            $contador_carrito = $contador_carrito + 1;
                                            $cantidad_total = $cantidad_total + $carrito_dato['cantidad'];
                                            $precio_unitario_total = $precio_unitario_total + floatval($carrito_dato['precio_venta']);
                                        ?>
                                            <tr>
                                                <td>
                                                    <center><?php echo $contador_carrito; ?></center>
                                                    <input type="text" value="<?php echo $carrito_dato['id_producto']; ?>" id="id_producto<?php echo $contador_carrito; ?>" hidden>
                                                </td>
                                                <td>
                                                    <center><?php echo $carrito_dato['nombre_producto']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $carrito_dato['descripcion']; ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <span id="cantidad_carrito<?php echo $contador_carrito; ?>">
                                                            <?php echo $carrito_dato['cantidad']; ?>
                                                        </span>
                                                    </center>
                                                    <input type="text" value="<?php echo $carrito_dato['stock']; ?>" id="stock_inventario<?php echo $contador_carrito; ?>" hidden>
                                                </td>
                                                <td>
                                                    <center><?php echo $carrito_dato['precio_venta']; ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <?php
                                                        $cantidad = floatval($carrito_dato['cantidad']);
                                                        $precio_venta = floatval($carrito_dato['precio_venta']);
                                                        echo $subtotal = $cantidad * $precio_venta;
                                                        $precio_total = $precio_total + $subtotal;
                                                        ?>
                                                    </center>
                                                </td>
                                            </tr>
                                        <?php } ?>


                                        <tr>
                                            <th colspan="3" style="background-color: #e7e7e7;text-align:right">Total</th>
                                            <th>
                                                <center><?php echo $cantidad_total; ?></center>
                                            </th>
                                            <th>
                                                <center><?php echo $precio_unitario_total; ?></center>
                                            </th>
                                            <th style="background-color:yellow">
                                                <center><?php echo $precio_total; ?></center>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="card card-outline card-danger">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-user-check"></i> Datos del cliente</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <?php
                    foreach ($clientes_datos as $cliente_dato) {

                        $nombre_cliente = $cliente_dato['nombre_cliente'];
                        $nit_ci_cliente = $cliente_dato['nit_ci_cliente'];
                        $celular_cliente = $cliente_dato['celular_cliente'];
                        $email_cliente = $cliente_dato['email_cliente'];
                    }
                    ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" id="id_cliente" hidden>
                                    <label for="">Nombres</label>
                                    <input type="text" value="<?php echo $nombre_cliente; ?>" class="form-control" id="nombre_cliente" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">RUC</label>
                                    <input type="text" value="<?php echo $nit_ci_cliente; ?>" class="form-control" id="nit_ci_cliente" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Celular</label>
                                    <input type="text" value="<?php echo $celular_cliente; ?>" class="form-control" id="celular_cliente" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input type="email" value="<?php echo $email_cliente; ?>" class="form-control" id="email_cliente" disabled>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-outline card-danger">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-shopping-basket"></i> Registrar Venta</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Monto a cancelar</label>
                            <input type="text" class="form-control" id="total_cancelar" style="text-align: center; background-color:yellow" value="<?php echo $precio_total; ?>" disabled>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button id="btn_borrar_venta" class="btn btn-danger btn-block">
                                <i class="fa fa-trash"></i> Borrar venta
                            </button>
                            <div id="btn_borrar_venta"></div>
                        </div>
                        <script>
                            $('#btn_borrar_venta').click(function() {

                                var id_venta = '<?php echo $id_venta_get; ?>';
                                var nro_venta = '<?php echo $nro_venta_get; ?>';

                                actualizar_stock();
                                borrar_venta();

                                function actualizar_stock() {
                                    var i = 1;
                                    var n = '<?php echo $contador_carrito; ?>';

                                    for (i = 1; i <= n; i++) {

                                        var a = '#stock_inventario' + i;
                                        var stock_inventario = $(a).val();

                                        var b = '#cantidad_carrito' + i;
                                        var cantidad_carrito = $(b).html();

                                        var c = '#id_producto' + i;
                                        var id_producto = $(c).val();

                                        var stock_calculado = parseInt(stock_inventario) + parseInt(cantidad_carrito);


                                        var url_actualizar_stock = "../app/controllers/ventas/actualizar_stock.php";
                                        $.get(url_actualizar_stock, {
                                            id_producto: id_producto,
                                            stock_calculado: stock_calculado
                                        }, function(datos) {

                                        });
                                    }
                                }

                                function borrar_venta() {
                                    var url_borrar_venta = "../app/controllers/ventas/borrar_venta.php";
                                    $.get(url_borrar_venta, {
                                        id_venta: id_venta,
                                        nro_venta: nro_venta
                                    }, function(datos) {
                                        $('#btn_borrar_venta').html(datos);
                                    });
                                }
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('../layout/mensajes.php'); ?>

<?php include('../layout/footer.php'); ?>