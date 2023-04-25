<?php include('../app/config.php'); ?>

<?php include('../layout/sesion.php'); ?>

<?php include('../layout/header.php'); ?>

<?php include('../app/controllers/compras/listado_compras.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de compras</h1>
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
                            <h3 class="card-title">Compras Registradas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display:block">
                            <div class="table table-responsive">
                                <table id="table_compras" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>Nro</center>
                                            </th>
                                            <th>
                                                <center>Nro de compra</center>
                                            </th>
                                            <th>
                                                <center>Producto</center>
                                            </th>
                                            <th>
                                                <center>Fecha de compra</center>
                                            </th>
                                            <th>
                                                <center>Proveedor</center>
                                            </th>
                                            <th>
                                                <center>Comprobante</center>
                                            </th>
                                            <th>
                                                <center>Usuario</center>
                                            </th>
                                            <th>
                                                <center>Precio compra</center>
                                            </th>
                                            <th>
                                                <center>Cantidad</center>
                                            </th>
                                            <th>
                                                <center>Acciones</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        foreach ($compras_datos as $compra_dato) {
                                            $id_compra = $compra_dato['id_compra'];
                                            $nrocompra = $compra_dato['nro_compra'];
                                            $nombre_producto = $compra_dato['nombre_producto'];
                                            $fecha_compra = $compra_dato['fecha_compra'];
                                            $id_proveedor = $compra_dato['id_proveedor'];
                                            $comprobante = $compra_dato['comprobante'];
                                            $id_usuario = $compra_dato['id_usuario'];
                                            $precio_compra = $compra_dato['precio_compra'];
                                            $cantidad = $compra_dato['cantidad'];
                                        ?>
                                            <tr>
                                                <td>
                                                    <center><?php echo $contador = $contador + 1; ?></center>
                                                </td>
                                                <td>
                                                    <center><?= $nrocompra; ?></center>
                                                </td>
                                                <td>

                                                    <button type="button" class="btn btn-warning btn-block" data-toggle="modal" data-target="#modal-producto<?= $id_compra; ?>">
                                                        <?= $nombre_producto; ?>
                                                    </button>
                                                    <!---Modal para visualizar los datos del producto-->
                                                    <div class="modal fade" id="modal-producto<?php echo $id_compra; ?>">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color:#07b0d6;color:white;">
                                                                    <h4 class="modal-title">Datos del producto</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-9">
                                                                            <div class="row">
                                                                                <div class="col-md-2">
                                                                                    <div class="form-group">
                                                                                        <label for="">Codigo</label>
                                                                                        <input type="text" value="<?php echo $compra_dato['codigo']; ?>" class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Nombre del Producto</label>
                                                                                        <input type="text" value="<?= $nombre_producto; ?>" class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="">Descripcion del Producto</label>
                                                                                        <textarea name="" id="descripcion<?php echo $id_compra; ?>" cols="30" rows="2" class="form-control" disabled><?php echo $compra_dato['descripcion']; ?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="">Stock</label>
                                                                                        <input type="text" value="<?= $compra_dato['stock']; ?>" class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="">Stock minimo</label>
                                                                                        <input type="text" value="<?= $compra_dato['stock_minimo']; ?>" class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="">Stock maximo</label>
                                                                                        <input type="text" value="<?= $compra_dato['stock_maximo']; ?>" class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="">Fecha de Ingreso</label>
                                                                                        <input type="text" style="font-size: 14px;" value="<?= $compra_dato['fecha_ingreso']; ?>" class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="">Precio Compra</label>
                                                                                        <input type="text" value="<?= $compra_dato['precio_compra_producto']; ?>" class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="">Precio Venta</label>
                                                                                        <input type="text" value="<?= $compra_dato['precio_venta_producto']; ?>" class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="">Categoria</label>
                                                                                        <input type="text" value="<?= $compra_dato['nombre_categoria']; ?>" class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label for="">Usuario</label>
                                                                                        <input type="text" value="<?= $compra_dato['nombres_usuario_producto']; ?>" class="form-control" disabled>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">Imagen del Producto</label>
                                                                                <img src="<?php echo $URL . '/almacen/img_productos/' . $compra_dato['imagen']; ?>" alt="" width="100%">
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>
                                                    <center><?= $fecha_compra; ?></center>
                                                </td>
                                                <td>

                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-proveedor<?= $id_compra; ?>">
                                                        <?= $compra_dato['nombre_proveedor']; ?>
                                                    </button>
                                                    <!---Modal para visualizar los datos del proveedor-->
                                                    <div class="modal fade" id="modal-proveedor<?= $id_compra; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color:#07b0d6;color:white;">
                                                                    <h4 class="modal-title">Datos del proveedor</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Nombre del Proveedor</label>
                                                                                <input type="text" value="<?php echo $compra_dato['nombre_proveedor']; ?>" class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Celular del Proveedor</label>
                                                                                <a href=" https://wa.me/+51<?= $compra_dato['celular_proveedor'] ?>" target="_blank">
                                                                                    <i class="fa fa-phone"></i>
                                                                                    <input type=" text" value="<?php echo $compra_dato['celular_proveedor']; ?>" class="form-control" disabled>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Telefono del Proveedor</label>
                                                                                <input type="text" value="<?php echo $compra_dato['telefono']; ?>" class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Empresa del Proveedor</label>
                                                                                <input type="text" value="<?php echo $compra_dato['empresa']; ?>" class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Email del Proveedor</label>
                                                                                <input type="text" value="<?php echo $compra_dato['email_proveedor']; ?>" class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Direccion del Proveedor</label>
                                                                                <input type="text" value="<?php echo $compra_dato['direccion_proveedor']; ?>" class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                                <td>
                                                    <center><?= $comprobante; ?></center>
                                                </td>
                                                <td>
                                                    <center><?= $compra_dato['nombres_usuario']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?= $precio_compra; ?></center>
                                                </td>
                                                <td>
                                                    <center><?= $cantidad; ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <div class="btn-group">
                                                            <a href="show.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ver</a>
                                                            <a href="update.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-alt"></i> Editar</a>
                                                            <a href="delete.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Borrar</a>
                                                        </div>
                                                    </center>
                                                </td>
                                            </tr>
                            </div>
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
        $('#table_compras').DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando  _START_ a _END_ de _TOTAL_ Compras",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ total de Compras)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Compras",
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
        }).buttons().container().appendTo('#table_compras_wrapper .col-md-6:eq(0)');
    });
</script>