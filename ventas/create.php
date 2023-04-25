<?php include('../app/config.php'); ?>

<?php include('../layout/sesion.php'); ?>

<?php include('../layout/header.php'); ?>

<?php include('../app/controllers/ventas/listado_ventas.php'); ?>

<?php include('../app/controllers/almacen/listado_productos.php'); ?>

<?php include('../app/controllers/clientes/listado_clientes.php'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Ventas</h1>
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
                            <?php
                            $contador_ventas = 0;
                            foreach ($ventas_datos as $venta_dato) {
                                $contador_ventas = $contador_ventas + 1;
                            }
                            ?>
                            <h3 class="card-title"><i class="fa fa-shopping-bag"></i> Venta Nro
                                <input type="text" style="text-align: center;" value="<?= $contador_ventas + 1; ?>" disabled>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <b>Carrito</b>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-buscar_producto">
                                <i class="fa fa-search"></i>
                                Buscar producto
                            </button>
                            <!-- modal para visualizar datos de los proveedor -->
                            <div class="modal fade" id="modal-buscar_producto">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #1d36b6;color: white">
                                            <h4 class="modal-title">Busqueda del producto</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table table-responsive">
                                                <table id="table_productos" class="table table-bordered table-striped table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <center>Nro</center>
                                                            </th>
                                                            <th>
                                                                <center>Selecionar</center>
                                                            </th>
                                                            <th>
                                                                <center>Código</center>
                                                            </th>
                                                            <th>
                                                                <center>Categoría</center>
                                                            </th>
                                                            <th>
                                                                <center>Imagen</center>
                                                            </th>
                                                            <th>
                                                                <center>Nombre</center>
                                                            </th>
                                                            <th>
                                                                <center>Descripción</center>
                                                            </th>
                                                            <th>
                                                                <center>Stock</center>
                                                            </th>

                                                            <th>
                                                                <center>Precio venta</center>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $contador = 0;
                                                        foreach ($productos_datos as $producto_dato) {
                                                            $id_producto = $producto_dato['id_producto']; ?>
                                                            <tr>
                                                                <td>
                                                                    <center>
                                                                        <?php echo $contador = $contador + 1; ?>
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-info" id="btn_selecionar<?php echo $id_producto; ?>">
                                                                        Selecionar
                                                                    </button>
                                                                    <script>
                                                                        $('#btn_selecionar<?php echo $id_producto; ?>').click(function() {

                                                                            var id_producto = "<?php echo $producto_dato['id_producto']; ?>";
                                                                            $('#id_producto').val(id_producto);

                                                                            var producto = "<?php echo $producto_dato['nombre']; ?>";
                                                                            $('#producto').val(producto);

                                                                            var descripcion = "<?php echo $producto_dato['descripcion']; ?>";
                                                                            $('#descripcion').val(descripcion);

                                                                            var precio_venta = "<?php echo $producto_dato['precio_venta']; ?>";
                                                                            $('#precio_venta').val(precio_venta);

                                                                            $('#cantidad').focus();

                                                                        });
                                                                    </script>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <?php echo $producto_dato['codigo']; ?>
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <?php echo $producto_dato['categoria']; ?>
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <img src="<?php echo $URL . "/almacen/img_productos/" . $producto_dato['imagen']; ?>" width="50px" alt="asdf">
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <?php echo $producto_dato['nombre']; ?>
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <?php echo $producto_dato['descripcion']; ?>
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <?php echo $producto_dato['stock']; ?>
                                                                    </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <?php echo $producto_dato['precio_venta']; ?>
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>

                                                    </tbody>
                                                    </tfoot>
                                                </table>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" id="id_producto" hidden>
                                                        <label for="">Producto</label>
                                                        <textarea name="" id="producto" cols="30" rows="2" class="form-control" disabled></textarea>
                                                        <!--  <input type="text" id="producto" class="form-control" disabled>-->
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="">Descripcion</label>
                                                        <textarea name="" id="descripcion" cols="30" rows="2" class="form-control" disabled></textarea>
                                                        <!--<input type="text" id="descripcion" class="form-control" disabled>-->
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Cantidad</label>
                                                        <input type="number" id="cantidad" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Precio Unitario</label>
                                                        <input type="text" id="precio_venta" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <button style="float: right" id="btn-registrar-carrito" class="btn btn-primary">Registrar</button>
                                            <div id="respuesta_carrito"></div>
                                            <script>
                                                $('#btn-registrar-carrito').click(function() {

                                                    var nro_venta = '<?php echo $contador_ventas + 1; ?>';

                                                    var id_producto = $('#id_producto').val();

                                                    var cantidad = $('#cantidad').val();

                                                    if (id_producto == '') {
                                                        alert('Debe selecionar un producto');
                                                    } else if (cantidad == '') {
                                                        alert('Debe ingresar una cantidad');
                                                    } else {
                                                        var url = "../app/controllers/ventas/registrar_carrito.php";
                                                        $.get(url, {
                                                            nro_venta: nro_venta,
                                                            id_producto: id_producto,
                                                            cantidad: cantidad
                                                        }, function(datos) {
                                                            $('#respuesta_carrito').html(datos);
                                                        });
                                                    }
                                                });
                                            </script>

                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

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
                                        <th style="background-color: #e7e7e7; text-align:center">Accion</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador_carrito = 0;
                                    $cantidad_total = 0;
                                    $precio_unitario_total = 0;
                                    $precio_total = 0;

                                    $nro_venta = $contador_ventas + 1;
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
                                            <td>
                                                <form action="../app/controllers/ventas/borrar_carrito.php" method="post">
                                                    <input type="text" name="id_carrito" value="<?php echo $id_carrito; ?>" hidden>
                                                    <center>
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i> Borrar
                                                        </button>
                                                    </center>
                                                </form>
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
                    <div class="card-body">
                        <b>Cliente </b>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-buscar_cliente">
                            <i class="fa fa-search"></i>
                            Buscar Cliente
                        </button>
                        <!-- modal para visualizar datos de los clientes -->
                        <div class="modal fade" id="modal-buscar_cliente">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #1d36b6;color: white">
                                        <h4 class="modal-title">Busqueda de Clientes </h4>
                                        <div style="width: 10px"></div>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-agregar_cliente">
                                            <i class="fas fa-user-plus"></i>
                                            Agregar nuevo Cliente
                                        </button>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table table-responsive">
                                            <table id="table_clientes" class="table table-bordered table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <center>Nro</center>
                                                        </th>
                                                        <th>
                                                            <center>Selecionar</center>
                                                        </th>
                                                        <th>
                                                            <center>Nombre del Cliente</center>
                                                        </th>
                                                        <th>
                                                            <center>Ruc</center>
                                                        </th>
                                                        <th>
                                                            <center>Celular</center>
                                                        </th>
                                                        <th>
                                                            <center>Correo</center>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $contador_clientes = 0;
                                                    foreach ($clientes_datos as $cliente_dato) {
                                                        $id_cliente = $cliente_dato['id_cliente'];
                                                        $contador_clientes = $contador_clientes + 1;
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <center>
                                                                    <?php echo $contador_clientes; ?>
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-info" id="btn_pasar_cliente<?php echo $id_cliente; ?>">
                                                                    Selecionar
                                                                </button>
                                                                <script>
                                                                    $('#btn_pasar_cliente<?php echo $id_cliente; ?>').click(function() {

                                                                        var id_cliente = '<?php echo $cliente_dato['id_cliente']; ?>';
                                                                        $('#id_cliente').val(id_cliente);

                                                                        var nombre_cliente = '<?php echo $cliente_dato['nombre_cliente']; ?>';
                                                                        $('#nombre_cliente').val(nombre_cliente);

                                                                        var nit_ci_cliente = '<?php echo $cliente_dato['nit_ci_cliente']; ?>';
                                                                        $('#nit_ci_cliente').val(nit_ci_cliente);

                                                                        var celular_cliente = '<?php echo $cliente_dato['celular_cliente']; ?>';
                                                                        $('#celular_cliente').val(celular_cliente);

                                                                        var email_cliente = '<?php echo $cliente_dato['email_cliente']; ?>';
                                                                        $('#email_cliente').val(email_cliente);

                                                                        $('#modal-buscar_cliente').modal('toggle');
                                                                    });
                                                                </script>
                                                            </td>
                                                            <td>
                                                                <center>
                                                                    <?php echo $cliente_dato['nombre_cliente']; ?>
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <center>
                                                                    <?php echo $cliente_dato['nit_ci_cliente']; ?>
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <center>
                                                                    <?php echo $cliente_dato['celular_cliente']; ?>
                                                                </center>
                                                            </td>
                                                            <td>
                                                                <center>
                                                                    <?php echo $cliente_dato['email_cliente']; ?>
                                                                </center>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" id="id_cliente" hidden>
                                    <label for="">Nombres</label>
                                    <input type="text" class="form-control" id="nombre_cliente" placeholder="Nombre del Cliente" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Ruc</label>
                                    <input type="text" class="form-control" id="nit_ci_cliente" placeholder="RUC" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Celular</label>
                                    <input type="text" class="form-control" id="celular_cliente" placeholder="Celular del Cliente" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input type="email" class="form-control" id="email_cliente" placeholder="Correo del Cliente" disabled>
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


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Total Pagado</label>
                                    <input type="text" class="form-control" id="total_pagado">
                                </div>
                                <script>
                                    $('#total_pagado').keyup(function() {

                                        var total_cancelar = $('#total_cancelar').val();
                                        var total_pagado = $('#total_pagado').val();

                                        var cambio = parseFloat(total_pagado) - parseFloat(total_cancelar);
                                        $('#cambio').val(cambio);
                                    });
                                </script>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Cambio</label>
                                    <input type="text" class="form-control" id="cambio" disabled>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group">
                            <center>
                                <button class="btn btn-primary" id="btn_guardar_venta">
                                    <i class="fa fa-save"></i> Guardar Venta
                                </button>
                                <div id="respuesta_registro_venta"></div>
                                <script>
                                    $('#btn_guardar_venta').click(function() {

                                        var nro_venta = '<?php echo $contador_ventas + 1; ?>'
                                        var id_cliente = $('#id_cliente').val();
                                        var total_cancelar = $('#total_cancelar').val();

                                        if (id_cliente == '') {
                                            alert('Debe llenar los datos del cliente');
                                        } else {

                                            actualizar_stock();
                                            guardar_venta();
                                        }


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

                                                var stock_calculado = parseFloat(stock_inventario - cantidad_carrito);

                                                var url_actualizar_stock = "../app/controllers/ventas/actualizar_stock.php";
                                                $.get(url_actualizar_stock, {

                                                    id_producto: id_producto,
                                                    stock_calculado: stock_calculado

                                                }, function(datos) {

                                                });
                                            }
                                        }

                                        function guardar_venta() {
                                            var url_guardar_venta = "../app/controllers/ventas/registro_ventas.php";
                                            $.get(url_guardar_venta, {
                                                nro_venta: nro_venta,
                                                id_cliente: id_cliente,
                                                total_cancelar: total_cancelar
                                            }, function(datos) {
                                                $('#respuesta_registro_venta').html(datos);
                                            });
                                        }
                                    });
                                </script>
                            </center>
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
                        <input type="text" name="nombre_cliente" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">RUC del cliente</label></label>
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