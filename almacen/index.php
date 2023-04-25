<?php include('../app/config.php'); ?>
<?php include('../layout/sesion.php'); ?>
<?php include('../layout/header.php'); ?>
<?php include('../app/controllers/almacen/listado_productos.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Productos</h1>
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
                            <h3 class="card-title">Productos Registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display:block">
                            <div class="table table-responsive">
                                <table id="table_productos" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>Nro</center>
                                            </th>
                                            <th>
                                                <center>Codigo</center>
                                            </th>
                                            <th>
                                                <center>Categoria</center>
                                            </th>
                                            <th>
                                                <center>Imagen</center>
                                            </th>
                                            <th>
                                                <center>Nombre</center>
                                            </th>
                                            <th>
                                                <center>Descripcion</center>
                                            </th>
                                            <th>
                                                <center>Stock</center>
                                            </th>
                                            <th>
                                                <center>Precio compra</center>
                                            </th>
                                            <th>
                                                <center>Precio venta</center>
                                            </th>
                                            <th>
                                                <center>Fecha compra</center>
                                            </th>
                                            <th>
                                                <center>Usuario</center>
                                            </th>
                                            <th>
                                                <center>Acciones</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        foreach ($productos_datos as $producto_dato) {
                                            $id_producto = $producto_dato['id_producto'];
                                        ?>
                                            <tr>
                                                <td>
                                                    <center><?php echo $contador = $contador + 1; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $producto_dato['codigo']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $producto_dato['categoria']; ?></center>
                                                </td>
                                                <td>
                                                    <center> <img src="<?php echo $URL . "/almacen/img_productos/" . $producto_dato['imagen']; ?>" width="80px" height="80px" alt=""></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $producto_dato['nombre']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $producto_dato['descripcion']; ?></center>
                                                </td>

                                                <?php
                                                $stock_actual = $producto_dato['stock'];
                                                $stock_maximo = $producto_dato['stock_maximo'];
                                                $stock_minimo = $producto_dato['stock_minimo'];

                                                if ($stock_actual <= $stock_minimo) { ?>
                                                    <td style="background-color:#c6484d">
                                                        <center>
                                                            <?php echo $producto_dato['stock']; ?>
                                                        </center>
                                                    </td>
                                                <?php
                                                } else if ($stock_actual >= $stock_maximo) { ?>
                                                    <td style="background-color:#0ac68d">
                                                        <center>
                                                            <?php echo $producto_dato['stock']; ?>
                                                        </center>
                                                    </td>
                                                <?php } else { ?>
                                                    <td>
                                                        <center>
                                                            <?php echo $producto_dato['stock']; ?>
                                                        </center>
                                                    </td>
                                                <?php } ?>

                                                <td>
                                                    <center><?php echo $producto_dato['precio_compra']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $producto_dato['precio_venta']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $producto_dato['fecha_ingreso']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $producto_dato['nombre_usuario']; ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <div class="btn-group">
                                                            <a href="show.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ver</a>
                                                            <a href="update.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-alt"></i> Editar</a>
                                                            <a href="delete.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
                                                        </div>
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
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<!-- /.content-wrapper -->
<?php include('../layout/mensajes.php'); ?>

<?php include('../layout/footer.php'); ?>
<script>
    $(function() {
        $('#table_productos').DataTable({
            "pageLength": 10,
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
        }).buttons().container().appendTo('#table_productos_wrapper .col-md-6:eq(0)');
    });
</script>