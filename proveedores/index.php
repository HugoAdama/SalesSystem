<?php include('../app/config.php'); ?>
<?php include('../layout/sesion.php'); ?>
<?php include('../layout/header.php'); ?>
<?php include('../app/controllers/proveedores/listado_proveedores.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Proveedores
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                            <i class="fa fa-plus"></i> Agregar Proveedor
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
                            <h3 class="card-title">Proveedores Registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display:block">
                            <table id="table_proveedores" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Nro</center>
                                        </th>
                                        <th>
                                            <center>Nombre del Proveedor</center>
                                        </th>
                                        <th>
                                            <center>Celular</center>
                                        </th>
                                        <th>
                                            <center>Telefono</center>
                                        </th>
                                        <th>
                                            <center>Empresa</center>
                                        </th>
                                        <th>
                                            <center>Email</center>
                                        </th>
                                        <th>
                                            <center>Direccion</center>
                                        </th>
                                        <th>
                                            <center>Acciones</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($proveedores_datos as $proveedor_dato) {
                                        $id_proveedor = $proveedor_dato['id_proveedor'];
                                        $nombre_proveedor = $proveedor_dato['nombre_proveedor'];
                                        $celular = $proveedor_dato['celular'];
                                        $telefono = $proveedor_dato['telefono'];
                                        $empresa = $proveedor_dato['empresa'];
                                        $email = $proveedor_dato['email'];
                                        $direccion = $proveedor_dato['direccion'];
                                    ?>
                                        <tr>
                                            <td>
                                                <center><?php echo $contador = $contador + 1; ?></center>
                                            </td>
                                            <td>
                                                <center><?= $nombre_proveedor; ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a href="https://wa.me/+51<?= $celular; ?>" class="btn btn-success" target="_blank">
                                                        <i class="fa fa-phone"></i> 
                                                        <?= $celular; ?></a>
                                                </center>
                                            </td>
                                            <td>
                                                <center><?= $telefono; ?></center>
                                            </td>
                                            <td>
                                                <center><?= $empresa; ?></center>
                                            </td>
                                            <td>
                                                <center><?= $email; ?></center>
                                            </td>
                                            <td>
                                                <center><?= $direccion; ?></center>
                                            </td>
                                            <td>

                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-update<?php echo $id_proveedor; ?>">
                                                        <i class="fa fa-pencil-alt"></i> Editar
                                                    </button>
                                                    <!-- Modal para editar proveedor-->
                                                    <div class="modal fade" id="modal-update<?php echo $id_proveedor; ?>">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color:#116f4a ; color:white">
                                                                    <h4 class="modal-title">Actualizacion del proveedor</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Nombre del Proveedor</label>
                                                                                <input type="text" id="nombre_proveedor<?php echo $id_proveedor; ?>" value="<?= $nombre_proveedor; ?>" class="form-control">
                                                                                <small style="color:red;display:none" id="lbl_nombre<?php echo $id_proveedor; ?>"><b>*</b> Este campo es requerido</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Celular</label>
                                                                                <input type="text" id="celular<?php echo $id_proveedor; ?>" value="<?= $celular; ?>" class="form-control">
                                                                                <small style="color:red;display:none" id="lbl_celular<?php echo $id_proveedor; ?>"><b>*</b> Este campo es requerido</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Telefono</label>
                                                                                <input type="text" id="telefono<?php echo $id_proveedor; ?>" value="<?= $telefono; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Nombre de la Empresa</label>
                                                                                <input type="text" id="empresa<?php echo $id_proveedor; ?>" value="<?= $empresa; ?>" class="form-control">
                                                                                <small style="color:red;display:none" id="lbl_empresa<?php echo $id_proveedor; ?>"><b>*</b> Este campo es requerido</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Email</label>
                                                                                <input type="text" id="email<?php echo $id_proveedor; ?>" value="<?= $email; ?>" class="form-control">
                                                                                <small style="color:red;display:none" id="lbl_email<?php echo $id_proveedor; ?>"><b>*</b> Este campo es requerido</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Direccion</label>
                                                                                <textarea name="" id="direccion<?php echo $id_proveedor; ?>" cols="30" rows="1" class="form-control"><?php echo $proveedor_dato['direccion']; ?></textarea>
                                                                                <small style="color:red;display:none" id="lbl_direccion<?php echo $id_proveedor; ?>"><b>*</b> Este campo es requerido</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                        <button type="button" class="btn btn-success" id="btn_update<?php echo $id_proveedor; ?>">Actualizar</button>
                                                                    </div>
                                                                    <div id="respuesta_delete<?php echo $id_proveedor; ?>"></div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!--Modal-->
                                                    <script>
                                                        $('#btn_update<?php echo $id_proveedor; ?>').click(function() {

                                                            var nombre_proveedor = $('#nombre_proveedor<?php echo $id_proveedor; ?>').val();
                                                            var celular = $('#celular<?php echo $id_proveedor; ?>').val();
                                                            var telefono = $('#telefono<?php echo $id_proveedor; ?>').val();
                                                            var empresa = $('#empresa<?php echo $id_proveedor; ?>').val();
                                                            var email = $('#email<?php echo $id_proveedor; ?>').val();
                                                            var direccion = $('#direccion<?php echo $id_proveedor; ?>').val();

                                                            var id_proveedor = '<?php echo $id_proveedor; ?>';

                                                            if (nombre_proveedor == '') {
                                                                $('#nombre_proveedor<?php echo $id_proveedor; ?>').focus();
                                                                $('#lbl_nombre<?php echo $id_proveedor; ?>').css('display', 'block');

                                                            } else if (celular == '') {
                                                                $('#celular<?php echo $id_proveedor; ?>').focus();
                                                                $('#lbl_celular<?php echo $id_proveedor; ?>').css('display', 'block');

                                                            } else if (empresa == '') {
                                                                $('#empresa<?php echo $id_proveedor; ?>').focus();
                                                                $('#lbl_empresa<?php echo $id_proveedor; ?>').css('display', 'block');

                                                            } else if (email == '') {
                                                                $('#email<?php echo $id_proveedor; ?>').focus();
                                                                $('#lbl_email<?php echo $id_proveedor; ?>').css('display', 'block');

                                                            } else if (direccion == '') {
                                                                $('#direccion<?php echo $id_proveedor; ?>').focus();
                                                                $('#lbl_direccion<?php echo $id_proveedor; ?>').css('display', 'block');

                                                            } else {
                                                                var url = "../app/controllers/proveedores/update.php";

                                                                $.get(url, {
                                                                    id_proveedor: id_proveedor,
                                                                    nombre_proveedor: nombre_proveedor,
                                                                    celular: celular,
                                                                    telefono: telefono,
                                                                    empresa: empresa,
                                                                    email: email,
                                                                    direccion: direccion
                                                                }, function(datos) {
                                                                    $('#respuesta_update<?php echo $id_proveedor; ?>').html(datos);
                                                                });
                                                            }
                                                        });
                                                    </script>
                                                    <div id="respuesta_update<?php echo $id_proveedor; ?>"></div>
                                                </div>

                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $id_proveedor; ?>">
                                                        <i class="fa fa-trash"></i> Borrar
                                                    </button>
                                                    <!-- Modal para borrar proveedor-->
                                                    <div class="modal fade" id="modal-delete<?php echo $id_proveedor; ?>">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color:#ca0a0b ; color:white">
                                                                    <h4 class="modal-title">Eliminacion de Proveedor</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Nombre del Proveedor</label>
                                                                                <input type="text" id="nombre_proveedor<?php echo $id_proveedor; ?>" value="<?= $nombre_proveedor; ?>" class="form-control" disabled>
                                                                                <small style="color:red;display:none" id="lbl_nombre<?php echo $id_proveedor; ?>"><b>*</b> Este campo es requerido</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Celular</label>
                                                                                <input type="text" id="celular<?php echo $id_proveedor; ?>" value="<?= $celular; ?>" class="form-control" disabled>
                                                                                <small style="color:red;display:none" id="lbl_celular<?php echo $id_proveedor; ?>"><b>*</b> Este campo es requerido</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Telefono</label>
                                                                                <input type="text" id="telefono<?php echo $id_proveedor; ?>" value="<?= $telefono; ?>" class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Nombre de la Empresa</label>
                                                                                <input type="text" id="empresa<?php echo $id_proveedor; ?>" value="<?= $empresa; ?>" class="form-control" disabled>
                                                                                <small style="color:red;display:none" id="lbl_empresa<?php echo $id_proveedor; ?>"><b>*</b> Este campo es requerido</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Email</label>
                                                                                <input type="text" id="email<?php echo $id_proveedor; ?>" value="<?= $email; ?>" class="form-control" disabled>
                                                                                <small style="color:red;display:none" id="lbl_email<?php echo $id_proveedor; ?>"><b>*</b> Este campo es requerido</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Direccion</label>
                                                                                <textarea name="" id="direccion<?php echo $id_proveedor; ?>" cols="30" rows="1" class="form-control" disabled><?php echo $proveedor_dato['direccion']; ?></textarea>
                                                                                <small style="color:red;display:none" id="lbl_direccion<?php echo $id_proveedor; ?>"><b>*</b> Este campo es requerido</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                        <button type="button" class="btn btn-danger" id="btn_delete<?php echo $id_proveedor; ?>">Eliminar</button>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!--Modal-->
                                                    <script>
                                                        $('#btn_delete<?php echo $id_proveedor; ?>').click(function() {

                                                            var id_proveedor = '<?php echo $id_proveedor; ?>';
                                                            var url2 = "../app/controllers/proveedores/delete.php";

                                                            $.get(url2, {
                                                                id_proveedor: id_proveedor,
                                                            }, function(datos) {
                                                                $('#respuesta_delete<?php echo $id_proveedor; ?>').html(datos);
                                                            });
                                                        });
                                                    </script>
                                                </div>
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
        $('#table_proveedores').DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando  _START_ a _END_ de _TOTAL_ Proveedores",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ total de Proveedores)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Proveedores",
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
        }).buttons().container().appendTo('#table_proveedores_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- Modal para registrar proveedores-->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#1d36b6 ; color:white">
                <h4 class="modal-title">Creacion de un nuevo proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre del Proveedor <b>*</b></label>
                            <input type="text" id="nombre_proveedor" class="form-control" placeholder="Ingrese el nombre del proveedor">
                            <small style="color:red;display:none" id="lbl_nombre"><b>*</b> Este campo es requerido</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Celular <b>*</b></label>
                            <input type="number" id="celular" class="form-control" placeholder="Ingrese el celular de contacto">
                            <small style="color:red;display:none" id="lbl_celular"><b>*</b> Este campo es requerido</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input type="number" id="telefono" class="form-control" placeholder="Ingrese el telefono de contacto">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre de la Empresa <b>*</b></label>
                            <input type="text" id="empresa" class="form-control" placeholder="Ingrese el nombre de la empresa">
                            <small style="color:red;display:none" id="lbl_empresa"><b>*</b> Este campo es requerido</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email </label>
                            <input type="email" id="email" class="form-control" placeholder="Ingrese el correo electronico">
                            <small style="color:red;display:none" id="lbl_email"><b>*</b> Este campo es requerido</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Direccion <b>*</b></label>
                            <textarea name="" id="direccion" cols="30" rows="1" placeholder="Ingrese la direccion" class="form-control"></textarea>
                            <small style="color:red;display:none" id="lbl_direccion"><b>*</b> Este campo es requerido</small>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btn_create">Guardar Proveedor</button>
                </div>
                <div id="respuesta"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#btn_create').click(function() {
        var nombre_proveedor = $('#nombre_proveedor').val();
        var celular = $('#celular').val();
        var telefono = $('#telefono').val();
        var empresa = $('#empresa').val();
        var email = $('#email').val();
        var direccion = $('#direccion').val();

        if (nombre_proveedor == "") {
            $('#nombre_proveedor').focus();
            $('#lbl_nombre').css('display', 'block');
        } else if (celular == "") {
            $('#celular').focus();
            $('#lbl_celular').css('display', 'block');
        } else if (empresa == "") {
            $('#empresa').focus();
            $('#lbl_empresa').css('display', 'block');
        } else if (email == "") {
            $('#email').focus();
            $('#lbl_email').css('display', 'block');
        } else if (direccion == "") {
            $('#direccion').focus();
            $('#lbl_direccion').css('display', 'block');
        } else {
            var url = "../app/controllers/proveedores/create.php";
            $.get(url, {
                nombre_proveedor: nombre_proveedor,
                celular: celular,
                telefono: telefono,
                empresa: empresa,
                email: email,
                direccion: direccion
            }, function(datos) {
                $('#respuesta').html(datos);
            });
        }
    });
</script>