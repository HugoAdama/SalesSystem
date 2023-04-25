<?php include('../app/config.php'); ?>

<?php include('../layout/sesion.php'); ?>

<?php include('../layout/header.php'); ?>

<?php include('../app/controllers/almacen/listado_productos.php'); ?>

<?php include('../app/controllers/proveedores/listado_proveedores.php'); ?>

<?php include('../app/controllers/compras/listado_compras.php'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Registro de una nueva compra</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Ingrese los datos correctamente</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>

                                </div>

                                <div class="card-body" style="display: block;">
                                    <div style="display: flex">
                                        <h5>Datos del producto </h5>
                                        <div style="width: 20px"></div>
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

                                                                                        var codigo = "<?php echo $producto_dato['codigo']; ?>";
                                                                                        $('#codigo').val(codigo);

                                                                                        var categoria = "<?php echo $producto_dato['categoria']; ?>";
                                                                                        $('#categoria').val(categoria);

                                                                                        var nombre = "<?php echo $producto_dato['nombre']; ?>";
                                                                                        $('#nombre_producto').val(nombre);

                                                                                        var email = "<?php echo $producto_dato['email']; ?>";
                                                                                        $('#usuario_producto').val(email);

                                                                                        var descripcion = "<?php echo $producto_dato['descripcion']; ?>";
                                                                                        $('#descripcion_producto').val(descripcion);

                                                                                        var stock = "<?php echo $producto_dato['stock']; ?>";
                                                                                        $('#stock').val(stock);
                                                                                        $('#stock_actual').val(stock);

                                                                                        var stock_minimo = "<?php echo $producto_dato['stock_minimo']; ?>";
                                                                                        $('#stock_minimo').val(stock_minimo);

                                                                                        var stock_maximo = "<?php echo $producto_dato['stock_maximo']; ?>";
                                                                                        $('#stock_maximo').val(stock_maximo);

                                                                                        var precio_compra = "<?php echo $producto_dato['precio_compra']; ?>";
                                                                                        $('#precio_compra').val(precio_compra);

                                                                                        var precio_venta = "<?php echo $producto_dato['precio_venta']; ?>";
                                                                                        $('#precio_venta').val(precio_venta);

                                                                                        var fecha_ingreso = "<?php echo $producto_dato['fecha_ingreso']; ?>";
                                                                                        $('#fecha_ingreso').val(fecha_ingreso);

                                                                                        var ruta_img = "<?php echo $URL . '/almacen/img_productos/' . $producto_dato['imagen']; ?>";
                                                                                        $('#img_producto').attr({
                                                                                            src: ruta_img
                                                                                        });

                                                                                        $('#modal-buscar_producto').modal('toggle');

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
                                                                                    <?php echo $producto_dato['precio_compra']; ?>
                                                                                </center>
                                                                            </td>
                                                                            <td>
                                                                                <center>
                                                                                    <?php echo $producto_dato['precio_venta']; ?>
                                                                                </center>
                                                                            </td>
                                                                            <td>
                                                                                <center>
                                                                                    <?php echo $producto_dato['fecha_ingreso']; ?>
                                                                                </center>
                                                                            </td>
                                                                            <td>
                                                                                <center>
                                                                                    <?php echo $producto_dato['email']; ?>
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
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </div>

                                    <hr>
                                    <div class="row" style="font-size: 12px">
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" id="id_producto" hidden>
                                                        <label for="">Código:</label>
                                                        <input type="text" class="form-control" id="codigo" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Categoría:</label>
                                                        <div style="display: flex">
                                                            <input type="text" class="form-control" id="categoria" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Nombre del producto:</label>
                                                        <input type="text" name="nombre" id="nombre_producto" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Usuario</label>
                                                        <input type="text" class="form-control" id="usuario_producto" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">Descripción del producto:</label>
                                                        <textarea name="descripcion" id="descripcion_producto" cols="30" rows="2" class="form-control" disabled></textarea>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock:</label>
                                                        <input type="number" name="stock" id="stock" class="form-control" style="background-color: #fff819" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock mínimo:</label>
                                                        <input type="number" name="stock_minimo" id="stock_minimo" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock máximo:</label>
                                                        <input type="number" name="stock_maximo" id="stock_maximo" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Precio compra:</label>
                                                        <input type="number" name="precio_compra" id="precio_compra" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Precio venta:</label>
                                                        <input type="number" name="precio_venta" id="precio_venta" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Fecha de ingreso:</label>
                                                        <input type="date" name="fecha_ingreso" style="font-size: 14px;" id="fecha_ingreso" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Imagen del producto</label>
                                                <center>
                                                    <img src="<?php echo $URL . "/almacen/img_productos/" . $imagen; ?>" id="img_producto" width="100%" alt="">
                                                </center>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div style="display: flex">
                                        <h5>Datos del proveedor </h5>
                                        <div style="width: 20px"></div>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-buscar_proveedor">
                                            <i class="fa fa-search"></i>
                                            Buscar proveedor
                                        </button>
                                        <!-- modal para visualizar datos de los proveedor -->
                                        <div class="modal fade" id="modal-buscar_proveedor">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #1d36b6;color: white">
                                                        <h4 class="modal-title">Busqueda de proveedor</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table table-responsive">
                                                            <table id="table_proveedores" class="table table-bordered table-striped table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <center>Nro</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Selecionar</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Nombre del proveedor</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Celular</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Teléfono</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Empresa</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Email</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Dirección</center>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $contador = 0;
                                                                    foreach ($proveedores_datos as $proveedor_dato) {
                                                                        $id_proveedor = $proveedor_dato['id_proveedor'];
                                                                        $nombre_proveedor = $proveedor_dato['nombre_proveedor']; ?>
                                                                        <tr>
                                                                            <td>
                                                                                <center><?php echo $contador = $contador + 1; ?></center>
                                                                            </td>
                                                                            <td>
                                                                                <button class="btn btn-info" id="btn_selecionar_proveedor<?php echo $id_proveedor; ?>">
                                                                                    Selecionar
                                                                                </button>
                                                                                <script>
                                                                                    $('#btn_selecionar_proveedor<?php echo $id_proveedor; ?>').click(function() {

                                                                                        var id_proveedor = '<?php echo $id_proveedor; ?>';
                                                                                        $('#id_proveedor').val(id_proveedor);

                                                                                        var nombre_proveedor = '<?php echo $nombre_proveedor; ?>';
                                                                                        $('#nombre_proveedor').val(nombre_proveedor);

                                                                                        var celular_proveedor = '<?php echo $proveedor_dato['celular']; ?>';
                                                                                        $('#celular').val(celular_proveedor);

                                                                                        var telefono_proveedor = '<?php echo $proveedor_dato['telefono']; ?>';
                                                                                        $('#telefono').val(telefono_proveedor);

                                                                                        var empresa_proveedor = '<?php echo $proveedor_dato['empresa']; ?>';
                                                                                        $('#empresa').val(empresa_proveedor);

                                                                                        var email_proveedor = '<?php echo $proveedor_dato['email']; ?>';
                                                                                        $('#email').val(email_proveedor);

                                                                                        var direccion_proveedor = '<?php echo $proveedor_dato['direccion']; ?>';
                                                                                        $('#direccion').val(direccion_proveedor);

                                                                                        $('#modal-buscar_proveedor').modal('toggle');

                                                                                    });
                                                                                </script>
                                                                            </td>
                                                                            <td>
                                                                                <center><?php echo $nombre_proveedor; ?></center>
                                                                            </td>
                                                                            <td>
                                                                                <center>
                                                                                    <a href="https://wa.me/+51<?php echo $proveedor_dato['celular']; ?>" target="_blank" class="btn btn-success">
                                                                                        <i class="fa fa-phone"></i>
                                                                                        <?php echo $proveedor_dato['celular']; ?>
                                                                                    </a>
                                                                                </center>
                                                                            </td>
                                                                            <td>
                                                                                <center>
                                                                                    <?php echo $proveedor_dato['telefono']; ?>
                                                                                </center>
                                                                            </td>
                                                                            <td>
                                                                                <center>
                                                                                    <?php echo $proveedor_dato['empresa']; ?>
                                                                                </center>
                                                                            </td>
                                                                            <td>
                                                                                <center>
                                                                                    <?php echo $proveedor_dato['email']; ?>
                                                                                </center>
                                                                            </td>
                                                                            <td>
                                                                                <center>
                                                                                    <?php echo $proveedor_dato['direccion']; ?>
                                                                                </center>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </div>

                                    <hr>

                                    <div class="container-fluid" style="font-size: 12px">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" id="id_proveedor" hidden>
                                                    <label for="">Nombre del proveedor </label>
                                                    <input type="text" id="nombre_proveedor" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Celular</label>
                                                    <input type="number" id="celular" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Teléfono</label>
                                                    <input type="number" id="telefono" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Empresa </label>
                                                    <input type="text" id="empresa" class="form-control" disabled>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="email" id="email" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Dirección</label>
                                                    <textarea name="" id="direccion" cols="30" rows="3" class="form-control" disabled></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Detalle de la compra</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>

                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?php
                                                $contador_de_compras = 1;
                                                foreach ($compras_datos as $compra_dato) {
                                                    $contador_de_compras = $contador_de_compras + 1;
                                                }
                                                ?>
                                                <label for="">Número de la compra</label>
                                                <input type="text" value="<?php echo $contador_de_compras; ?>" style="text-align: center" class="form-control" disabled>
                                                <input type="text" value="<?php echo $contador_de_compras; ?>" id="nro_compra" hidden>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Fecha de la compra</label>
                                                <input type="date" style="font-size: 14px;" class="form-control" id="fecha_compra">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Comprobante de la compra</label>
                                                <input type="text" class="form-control" id="comprobante">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Precio de la compra</label>
                                                <input type="text" class="form-control" id="precio_compra_controlador">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Stock actual</label>
                                                <input type="text" style="background-color: #fff819;text-align: center" id="stock_actual" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Stock Total</label>
                                                <input type="text" style="text-align: center" id="stock_total" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Cantidad de la compra</label>
                                                <input type="number" id="cantidad_compra" style="text-align: center" class="form-control">
                                            </div>
                                            <script>
                                                $('#cantidad_compra').keyup(function() {
                                                    var stock_actual = $('#stock_actual').val();
                                                    var stock_compra = $('#cantidad_compra').val();

                                                    var total = parseInt(stock_actual) + parseInt(stock_compra);
                                                    $('#stock_total').val(total);
                                                });
                                            </script>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Usuario</label>
                                                <input type="text" class="form-control" value="<?php echo $email_sesion; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" id="btn_guardar_compra">Guardar compra</button>
                                        </div>
                                    </div>
                                    <script>
                                        $('#btn_guardar_compra').click(function() {

                                            var id_producto = $('#id_producto').val();
                                            var nro_compra = $('#nro_compra').val();
                                            var fecha_compra = $('#fecha_compra').val();
                                            var id_proveedor = $('#id_proveedor').val();
                                            var comprobante = $('#comprobante').val();
                                            var id_usuario = '<?php echo $id_usuario_sesion; ?>';
                                            var precio_compra = $('#precio_compra_controlador').val();
                                            var cantidad_compra = $('#cantidad_compra').val();

                                            var stock_total = $('#stock_total').val();

                                            if (id_producto == "") {
                                                $('#id_producto').focus();
                                                alert("Debe llenar todos los campos");
                                            } else if (fecha_compra == "") {
                                                $('#fecha_compra').focus();
                                                alert("Debe llenar todos los campos");
                                            } else if (comprobante == "") {
                                                $('#comprobante').focus();
                                                alert("Debe llenar todos los campos");
                                            } else if (precio_compra == "") {
                                                $('#precio_compra_controlador').focus();
                                                alert("Debe llenar todos los campos");
                                            } else if (cantidad_compra == "") {
                                                $('#cantidad_compra').focus();
                                                alert("Debe llenar todos los campos");
                                            } else {
                                                var url = "../app/controllers/compras/create.php";
                                                $.get(url, {
                                                    id_producto: id_producto,
                                                    nro_compra: nro_compra,
                                                    fecha_compra: fecha_compra,
                                                    id_proveedor: id_proveedor,
                                                    comprobante: comprobante,
                                                    id_usuario: id_usuario,
                                                    precio_compra: precio_compra,
                                                    cantidad_compra: cantidad_compra,
                                                    stock_total: stock_total
                                                }, function(datos) {
                                                    $('#respuesta_create').html(datos);
                                                });
                                            }

                                        });
                                    </script>
                                </div>

                            </div>

                        </div>

                        <div id="respuesta_create"></div>

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

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

        }).buttons().container().appendTo('#table_proveedores_wrapper .col-md-6:eq(0)');
    });
</script>