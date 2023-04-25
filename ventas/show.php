<?php $id_venta_get = $_GET['id_venta']; ?>

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
                    <h1 class="m-0">Detalle de la venta - Nro <?php echo $nro_venta; ?></h1>
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
                    <div class="card card-outline card-primary">
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
                <div class="card card-outline card-primary">
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
                                    <label for="">Nit/CI</label>
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
                <div class="card card-outline card-primary">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->


<?php include('../layout/mensajes.php'); ?>

<?php include('../layout/footer.php'); ?>

<script>
    $(function() {
        $('#table_productos').DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando  _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ total de Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron registros",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,

        }).buttons().container().appendTo('#table_productos_wrapper .col-md-6:eq(0)');
    });
</script>
<script>
    $(function() {
        $('#table_clientes').DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando  _START_ a _END_ de _TOTAL_ Clientes",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ total de Clientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Clientes",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron registros",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,

        }).buttons().container().appendTo('#table_clientes_wrapper .col-md-6:eq(0)');
    });
</script>

<!--Modal para agregar clientes  -->
<div class="modal fade" id="modal-agregar_cliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#b6900c;color:white">
                <h4 class="modal-title">Nuevo Cliente</h4>
                <div style="width: 10px"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="../app/controllers/clientes/guardar_clientes.php" method="post">
                    <div class="form-group">
                        <label for="">Nombre del Cliente</label>
                        <input type="text" name="nombre_cliente" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Nit/CI del cliente</label></label>
                        <input type="text" name="nit_ci_cliente" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Celular</label>
                        <input type="text" name="celular_cliente" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Correo</label>
                        <input type="text" name="email_cliente" class="form-control">
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning btn-block">Guardar Cliente</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>