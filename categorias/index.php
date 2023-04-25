<?php include('../app/config.php'); ?>
<?php include('../layout/sesion.php'); ?>
<?php include('../layout/header.php'); ?>
<?php include('../app/controllers/categorias/listado_categorias.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Categorias
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                            <i class="fa fa-plus"></i> Agregar Categoria
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
                <div class="col-md-8">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Categorias Registradas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" style="display:block">
                            <table id="table_roles" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Nro</center>
                                        </th>
                                        <th>
                                            <center>Nombre de la Categoria</center>
                                        </th>
                                        <th>
                                            <center>Acciones</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($categorias_datos as $categoria_dato) {
                                        $id_categoria = $categoria_dato['id_categoria'];
                                        $nombre_categoria = $categoria_dato['nombre_categoria'];
                                    ?>
                                        <tr>
                                            <td>
                                                <center><?php echo $contador = $contador + 1; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $categoria_dato['nombre_categoria']; ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-update<?php echo $id_categoria; ?>">
                                                            <i class="fa fa-pencil-alt"></i> Editar
                                                        </button>
                                                        <!-- Modal para editar categorias-->
                                                        <div class="modal fade" id="modal-update<?php echo $id_categoria; ?>">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color:#116f4a ; color:white">
                                                                        <h4 class="modal-title">Actualizacion de categoria</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Nombre de la Categoria</label>
                                                                                    <input type="text" id="nombre_categoria<?php echo $id_categoria; ?>" value="<?php echo $nombre_categoria; ?>" class="form-control">
                                                                                    <small style="color:red;display:none" id="lbl_update<?php echo $id_categoria; ?>"><b>*</b> Este campo es requerido</small>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer justify-content-between">
                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                            <button type="button" class="btn btn-success" id="btn_update<?php echo $id_categoria; ?>">Actualizar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            $('#btn_update<?php echo $id_categoria; ?>').click(function() {

                                                                var nombre_categoria = $('#nombre_categoria<?php echo $id_categoria; ?>').val();

                                                                var id_categoria = '<?php echo $id_categoria; ?>';

                                                                if (nombre_categoria == '') {

                                                                    $('#nombre_categoria<?php echo $id_categoria; ?>').focus();
                                                                    $('#lbl_update<?php echo $id_categoria; ?>').css('display', 'block');

                                                                } else {
                                                                    var url = "../app/controllers/categorias/update_categorias.php";

                                                                    $.get(url, {
                                                                        nombre_categoria: nombre_categoria,
                                                                        id_categoria: id_categoria
                                                                    }, function(datos) {
                                                                        $('#respuesta_update<?php echo $id_categoria; ?>').html(datos);
                                                                    });
                                                                }
                                                            });
                                                        </script>
                                                        <div id="respuesta_update<?php echo $id_categoria; ?>"></div>
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
        $('#table_roles').DataTable({
            "pageLength": 10,
            "language": {
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando  _START_ a _END_ de _TOTAL_ Categorias",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ total de Categorias)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Categorias",
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
        }).buttons().container().appendTo('#table_roles_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- Modal para registrar categorias-->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#1d36b6 ; color:white">
                <h4 class="modal-title">Creacion de nueva categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nombre de la Categoria <b>*</b></label>
                            <input type="text" id="nombre_categoria" class="form-control" placeholder="Ingrese el nombre de la categoria">
                            <small style="color:red;display:none" id="lbl_create"><b>*</b> Este campo es requerido</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btn_create">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#btn_create').click(function() {
        var nombre_categoria = $('#nombre_categoria').val();

        if (nombre_categoria == "") {
            $('#nombre_categoria').focus();
            $('#lbl_create').css('display', 'block');
        } else {
            var url = "../app/controllers/categorias/registro_categorias.php";
            $.get(url, {
                nombre_categoria: nombre_categoria
            }, function(datos) {
                $('#respuesta').html(datos);

            });
        }
    });
</script>
<div id="respuesta"></div>