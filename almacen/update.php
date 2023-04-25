<?php include('../app/config.php'); ?>

<?php include('../layout/sesion.php'); ?>

<?php include('../layout/header.php'); ?>

<?php include('../app/controllers/categorias/listado_categorias.php'); ?>

<?php include('../app/controllers/almacen/cargar_producto.php'); ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizacion del Producto</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Ingrese los datos correctamente</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body" style="display:block;">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="../app/controllers/almacen/update.php" method="post" enctype="multipart/form-data">
                                        <input type="text" value="<?php echo $id_producto_get; ?>" name="id_producto" hidden>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Codigo :</label>
                                                            <input type="text" class="form-control" value="<?php echo $codigo; ?>" disabled>
                                                            <input type="text" name="codigo" value="<?php echo $codigo; ?>" hidden>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Categoria :</label>
                                                            <div style="display: flex;">
                                                                <select name="id_categoria" id="" class="form-control" required>
                                                                    <?php
                                                                    foreach ($categorias_datos as $categoria_dato) {
                                                                        $nombre_categoria_tabla = $categoria_dato['nombre_categoria'];
                                                                        $id_categoria = $categoria_dato['id_categoria'];
                                                                    ?>
                                                                        <option value="<?php echo $id_categoria; ?>" <?php if ($nombre_categoria_tabla == $nombre_categoria); ?> selected>
                                                                            <?php echo $nombre_categoria_tabla; ?>
                                                                        </option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Nombre del producto :</label>
                                                            <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="">Usuario :</label>
                                                        <input type="text" class="form-control" value="<?php echo $nombre_usuario; ?>" disabled>
                                                        <input type="text" name="id_usuario" value="<?php echo $id_usuario; ?>" hidden>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">Descripcion del producto :</label>
                                                            <textarea name="descripcion" id="" cols="30" rows="1" class="form-control"><?php echo $descripcion; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Stock :</label>
                                                            <input type="number" name="stock" class="form-control" value="<?php echo $stock; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Stock minimo :</label>
                                                            <input type="number" name="stock_minimo" class="form-control" value="<?= $stock_minimo; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Stock maximo :</label>
                                                            <input type="number" name="stock_maximo" class="form-control" value="<?= $stock_maximo; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Precio compra :</label>
                                                            <input type="number" name="precio_compra" class="form-control" value="<?= $precio_compra; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Precio venta :</label>
                                                            <input type="number" name="precio_venta" class="form-control" value="<?= $precio_venta; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Fecha ingreso :</label>
                                                            <input type="date" name="fecha_ingreso" class="form-control" value="<?= $fecha_ingreso; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Imagen del producto :</label>
                                                    <input type="file" name="imagen" class="form-control" id="file">
                                                    <input type="text" name="imagen_text" value="<?php echo $imagen; ?>" hidden>
                                                    <br>
                                                    <output id="list">
                                                        <center>
                                                            <img src="<?php echo $URL . "/almacen/img_productos/" . $imagen; ?>" alt="" width="100%">
                                                        </center>
                                                    </output>
                                                    <script>
                                                        function archivo(evt) {
                                                            var files = evt.target.files; // FileList object
                                                            // Obtenemos la imagen del campo "file".
                                                            for (var i = 0, f; f = files[i]; i++) {
                                                                //Solo admitimos imágenes.
                                                                if (!f.type.match('image.*')) {
                                                                    continue;
                                                                }
                                                                var reader = new FileReader();
                                                                reader.onload = (function(theFile) {
                                                                    return function(e) {
                                                                        // Insertamos la imagen
                                                                        document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                                                                    };
                                                                })(f);
                                                                reader.readAsDataURL(f);
                                                            }
                                                        }
                                                        document.getElementById('file').addEventListener('change', archivo, false);
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-danger">Cancelar</a>
                                            <button type="submit" class="btn btn-success">Actualizar Producto</button>
                                        </div>
                                    </form>
                                </div>
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