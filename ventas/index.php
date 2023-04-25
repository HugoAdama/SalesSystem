<?php include('../app/config.php'); ?>

<?php include('../layout/sesion.php'); ?>

<?php include('../layout/header.php'); ?>

<?php include('../app/controllers/ventas/listado_ventas.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de ventas realizadas</h1>
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

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ventas Registradas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display:block">
                            <div class="table table-responsive">
                                <table id="table_ventas" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>Nro</center>
                                            </th>
                                            <th>
                                                <center>Nro de venta</center>
                                            </th>
                                            <th>
                                                <center>Productos</center>
                                            </th>
                                            <th>
                                                <center>Cliente</center>
                                            </th>
                                            <th>
                                                <center>Monto Pagado</center>
                                            </th>
                                            <th>
                                                <center>Acciones</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        foreach ($ventas_datos as $venta_dato) {
                                            $id_venta = $venta_dato['id_venta'];
                                            $id_cliente = $venta_dato['id_cliente'];
                                            $contador = $contador + 1;

                                        ?>
                                            <tr>
                                                <td>
                                                    <center><?php echo $contador; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $venta_dato['nro_venta']; ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_productos<?php echo $id_venta; ?>">
                                                            <i class="fa fa-shopping-basket"></i> Productos
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modal_productos<?php echo $id_venta; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_producto" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color: #08c2ec; color:white">
                                                                        <h5 class="modal-title" id="modal_productos"> Productos de la venta - Nro <?php echo $venta_dato['nro_venta']; ?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-body">
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

                                                                                    $nro_venta = $venta_dato['nro_venta'];
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
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modal_clientes<?php echo $id_venta; ?>">
                                                            <i class="fa fa-user"></i> <?php echo $venta_dato['nombre_cliente']; ?>
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modal_clientes<?php echo $id_venta; ?>">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color:#b6900c;color:white">
                                                                        <h4 class="modal-title">Cliente</h4>
                                                                        <div style="width: 10px"></div>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <?php
                                                                    $sql_clientes = "SELECT * FROM tb_clientes WHERE id_cliente = '$id_cliente'";
                                                                    $query_clientes = $pdo->prepare($sql_clientes);
                                                                    $query_clientes->execute();
                                                                    $clientes_datos = $query_clientes->fetchAll(PDO::FETCH_ASSOC);

                                                                    foreach ($clientes_datos as $cliente_dato) {
                                                                        $nombre_cliente = $cliente_dato['nombre_cliente'];
                                                                        $nit_ci_cliente = $cliente_dato['nit_ci_cliente'];
                                                                        $celular_cliente = $cliente_dato['celular_cliente'];
                                                                        $email_cliente = $cliente_dato['email_cliente'];
                                                                    }
                                                                    ?>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="">Nombre del Cliente</label>
                                                                            <input type="text" value="<?php echo $nombre_cliente; ?>" name="nombre_cliente" class="form-control" disabled>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="">RUC del cliente</label></label>
                                                                            <input type="text" value="<?php echo $nit_ci_cliente; ?>" name="nit_ci_cliente" class="form-control" disabled>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="">Celular</label>
                                                                            <input type="text" value="<?php echo $celular_cliente; ?>" name="celular_cliente" class="form-control" disabled>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label for="">Correo</label>
                                                                            <input type="email" value="<?php echo $email_cliente; ?>" name="email_cliente" class="form-control" disabled>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <button class="btn btn-primary btn-block">
                                                            <?php echo "S/." . $venta_dato['total_pagado']; ?>
                                                        </button>
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <a href="show.php?id_venta=<?php echo $id_venta; ?>" class="btn btn-info"><i class="fa fa-eye"></i> Ver</a>
                                                        <a href="delete.php?id_venta=<?php echo $id_venta; ?>&nro_venta=<?php echo $nro_venta; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</a>
                                                        <a href="factura.php?id_venta=<?php echo $id_venta; ?>&nro_venta=<?php echo $nro_venta; ?>" class="btn btn-success" target="_blank"><i class="fa fa-print"></i> Imprimir</a>
                                                    </center>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include('../layout/mensajes.php'); ?>

<?php include('../layout/footer.php'); ?>
<script>
    $(function() {
        $('#table_ventas').DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando  _START_ a _END_ de _TOTAL_ Ventas",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ total de Ventas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Ventas",
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

            buttons: [{
                    extend: 'collection',
                    text: 'Reportes',
                    orientation: 'landscape',
                    buttons: [{
                            text: 'Copiar',
                            extend: 'copy',
                        },
                        {
                            text: 'CSV',
                            extend: 'csv',
                        },
                        {
                            text: 'Excel',
                            extend: 'excel',
                        },
                        {
                            text: 'PDF',
                            extend: 'pdf',
                        },
                        {
                            text: 'Imprimir',
                            extend: 'print',
                        },
                    ]
                },
                {
                    extend: 'colvis',
                    text: 'Visor de Columnas',
                    collectionLayout: 'fixed three-column',
                }
            ],
        }).buttons().container().appendTo('#table_ventas_wrapper .col-md-6:eq(0)');
    });
</script>