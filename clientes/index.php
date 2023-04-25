<?php include('../app/config.php'); ?>
<?php include('../layout/sesion.php'); ?>
<?php include('../layout/header.php'); ?>
<?php include('../app/controllers/clientes/listado_clientes.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Clientes
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-agregar_cliente">
                            <i class="fa fa-plus"></i> Agregar nuevo Cliente
                        </button>
                    </h1>
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
                            <h3 class="card-title">Clientes Registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display:block">
                            <table id="table_clientes" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Nro</center>
                                        </th>
                                        <th>
                                            <center>Nombre del Cliente</center>
                                        </th>
                                        <th>
                                            <center>RUC</center>
                                        </th>
                                        <th>
                                            <center>Celular</center>
                                        </th>
                                        <th>
                                            <center>Email</center>
                                        </th>
                                        <th>
                                            <center>Accion</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($clientes_datos as $cliente_dato) {
                                        $id_cliente = $cliente_dato['id_cliente'];
                                        $nombre_cliente = $cliente_dato['nombre_cliente'];
                                        $nit_ci_cliente = $cliente_dato['nit_ci_cliente'];
                                        $celular_cliente = $cliente_dato['celular_cliente'];
                                        $email_cliente = $cliente_dato['email_cliente'];
                                    ?>
                                        <tr>
                                            <td>
                                                <center><?php echo $contador = $contador + 1; ?></center>
                                            </td>
                                            <td>
                                                <center><?= $nombre_cliente; ?></center>
                                            </td>
                                            <td>
                                                <center><?= $nit_ci_cliente; ?></center>
                                            </td>
                                            <td>
                                                <center><?= $celular_cliente; ?></center>
                                            </td>
                                            <td>
                                                <center><?= $email_cliente; ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-update<?php echo $id_cliente; ?>">
                                                            <i class="fa fa-pencil-alt"></i> Editar
                                                        </button>
                                                        <!-- Modal para editar proveedor-->
                                                        <div class="modal fade" id="modal-update<?php echo $id_cliente; ?>">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color:#116f4a ; color:white">
                                                                        <h4 class="modal-title">Actualizacion del Cliente</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Nombre del Cliente</label>
                                                                                    <input type="text" id="nombre_cliente<?php echo $id_cliente; ?>" value="<?= $nombre_cliente; ?>" class="form-control">
                                                                                    <small style="color:red;display:none" id="lbl_nombre_cliente<?php echo $id_cliente; ?>"><b>*</b> Este campo es requerido</small>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">RUC</label>
                                                                                    <input type="text" id="nit_ci_cliente<?php echo $id_cliente; ?>" value="<?= $nit_ci_cliente; ?>" class="form-control">
                                                                                    <small style="color:red;display:none" id="lbl_nit_ci_cliente<?php echo $id_cliente; ?>"><b>*</b> Este campo es requerido</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Celular</label>
                                                                                    <input type="text" id="celular_cliente<?php echo $id_cliente; ?>" value="<?= $celular_cliente; ?>" class="form-control">
                                                                                    <small style="color:red;display:none" id="lbl_celular_cliente<?php echo $id_cliente; ?>"><b>*</b> Este campo es requerido</small>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Email</label>
                                                                                    <input type="email" id="email_cliente<?php echo $id_cliente; ?>" value="<?= $email_cliente; ?>" class="form-control">
                                                                                    <small style="color:red;display:none" id="lbl_email_cliente<?php echo $id_cliente; ?>"><b>*</b> Este campo es requerido</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="modal-footer justify-content-between">
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                            <button type="button" class="btn btn-success" id="btn_update<?php echo $id_cliente; ?>">Actualizar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!--Modal-->
                                                        <script>
                                                            $('#btn_update<?php echo $id_cliente; ?>').click(function() {

                                                                var nombre_cliente = $('#nombre_cliente<?php echo $id_cliente; ?>').val();
                                                                var nit_ci_cliente = $('#nit_ci_cliente<?php echo $id_cliente; ?>').val();
                                                                var celular_cliente = $('#celular_cliente<?php echo $id_cliente; ?>').val();
                                                                var email_cliente = $('#email_cliente<?php echo $id_cliente; ?>').val();

                                                                var id_cliente = '<?php echo $id_cliente; ?>';

                                                                if (nombre_cliente == '') {
                                                                    $('#nombre_cliente<?php echo $id_cliente; ?>').focus();
                                                                    $('#lbl_nombre_cliente<?php echo $id_cliente; ?>').css('display', 'block');

                                                                } else if (nit_ci_cliente == '') {
                                                                    $('#nit_ci_cliente<?php echo $id_cliente; ?>').focus();
                                                                    $('#lbl_nit_ci_cliente<?php echo $id_cliente; ?>').css('display', 'block');

                                                                } else if (celular_cliente == '') {
                                                                    $('#celular_cliente<?php echo $id_cliente; ?>').focus();
                                                                    $('#lbl_celular_cliente<?php echo $id_cliente; ?>').css('display', 'block');

                                                                } else if (email_cliente == '') {
                                                                    $('#email_cliente<?php echo $id_cliente; ?>').focus();
                                                                    $('#lbl_email_cliente<?php echo $id_cliente; ?>').css('display', 'block');

                                                                } else {
                                                                    var url = "../app/controllers/clientes/update_cliente.php";

                                                                    $.get(url, {
                                                                        id_cliente: id_cliente,
                                                                        nombre_cliente: nombre_cliente,
                                                                        nit_ci_cliente: nit_ci_cliente,
                                                                        celular_cliente: celular_cliente,
                                                                        email_cliente: email_cliente

                                                                    }, function(datos) {
                                                                        $('#respuesta_update<?php echo $id_cliente; ?>').html(datos);
                                                                    });
                                                                }
                                                            });
                                                        </script>
                                                        <div id="respuesta_update<?php echo $id_cliente; ?>"></div>
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

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include('../layout/mensajes.php'); ?>

<?php include('../layout/footer.php'); ?>
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
        }).buttons().container().appendTo('#table_clientes_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- Modal para registrar proveedores-->
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
                <form action="../app/controllers/clientes/create_cliente.php" method="post">
                    <div class="form-group">
                        <label for="">Nombre del Cliente</label>
                        <input type="text" name="nombre_cliente" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Nit/CI del cliente</label></label>
                        <input type="text" name="nit_ci_cliente" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Celular</label>
                        <input type="text" name="celular_cliente" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Correo</label>
                        <input type="text" name="email_cliente" class="form-control" required>
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