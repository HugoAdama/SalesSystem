<?php include('app/config.php'); ?>
<?php include('layout/sesion.php'); ?>

<?php include('layout/header.php'); ?>
<?php include('app/controllers/usuarios/listado_de_usuarios.php'); ?>
<?php include('app/controllers/roles/listado_roles.php'); ?>
<?php include('app/controllers/categorias/listado_categorias.php'); ?>
<?php include('app/controllers/almacen/listado_productos.php'); ?>
<?php include('app/controllers/proveedores/listado_proveedores.php'); ?>
<?php include('app/controllers/compras/listado_compras.php'); ?>
<?php include('app/controllers/ventas/listado_ventas.php'); ?>
<?php include('app/controllers/clientes/listado_clientes.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Bienvenido al SISTEMA DE VENTAS - <?php echo $rol_sesion; ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            Contenido del sistema
            <br><br>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php
                            $contador_usuarios = 0;
                            foreach ($usuarios_datos as $usuario_dato) {
                                $contador_usuarios = $contador_usuarios + 1;
                            }
                            ?>
                            <h3><?php echo $contador_usuarios; ?></h3>
                            <p>Usuarios Registrados</p>
                        </div>
                        <a href="<?php echo $URL; ?>/usuarios/create.php">
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/usuarios" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php
                            $contador_roles = 0;
                            foreach ($roles_datos as $rol_dato) {
                                $contador_roles = $contador_roles + 1;
                            }
                            ?>
                            <h3><?php echo $contador_roles; ?></h3>
                            <p>Roles Registrados</p>
                        </div>
                        <a href="<?php echo $URL; ?>/roles/create.php">
                            <div class="icon">
                                <i class="fas fa-address-card"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/roles" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php
                            $contador_categorias = 0;
                            foreach ($categorias_datos as $categoria_dato) {
                                $contador_categorias = $contador_categorias + 1;
                            }
                            ?>
                            <h3><?php echo $contador_categorias; ?></h3>
                            <p>Categorias Registradas</p>
                        </div>
                        <a href="<?php echo $URL; ?>/categorias">
                            <div class="icon">
                                <i class="fas fa-tags"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/categorias" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <?php
                            $contador_productos = 0;
                            foreach ($productos_datos as $producto_dato) {
                                $contador_productos = $contador_productos + 1;
                            }
                            ?>
                            <h3><?php echo $contador_productos; ?></h3>
                            <p>Productos Registrados</p>
                        </div>
                        <a href="<?php echo $URL; ?>/almacen/create.php">
                            <div class="icon">
                                <i class="fas fa-list"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/almacen" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <?php
                            $contador_proveedores = 0;
                            foreach ($proveedores_datos as $proveedor_dato) {
                                $contador_proveedores = $contador_proveedores + 1;
                            }
                            ?>
                            <h3><?php echo $contador_proveedores; ?></h3>
                            <p>Proveedores Registrados</p>
                        </div>
                        <a href="<?php echo $URL; ?>/proveedores">
                            <div class="icon">
                                <i class="fas fa-car"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/proveedores" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php
                            $contador_compras = 0;
                            foreach ($compras_datos as $compra_dato) {
                                $contador_compras = $contador_compras + 1;
                            }
                            ?>
                            <h3><?php echo $contador_compras; ?></h3>
                            <p>Compras Registradas</p>
                        </div>
                        <a href="<?php echo $URL; ?>/compras">
                            <div class="icon">
                                <i class="fas fa-cart-plus"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/compras/create.php" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <?php
                            $contador_ventas = 0;
                            foreach ($ventas_datos as $venta_dato) {
                                $contador_ventas = $contador_ventas + 1;
                            }
                            ?>
                            <h3><?php echo $contador_ventas; ?></h3>
                            <p>Ventas Registradas</p>
                        </div>
                        <a href="<?php echo $URL; ?>/ventas/create.php">
                            <div class="icon">
                                <i class="fas fa-cart-plus"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/ventas" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-light">
                        <div class="inner">
                            <?php
                            $contador_clientes = 0;
                            foreach ($clientes_datos as $cliente_dato) {
                                $contador_clientes = $contador_clientes + 1;
                            }
                            ?>
                            <h3><?php echo $contador_clientes; ?></h3>
                            <p>Clientes Registrados</p>
                        </div>
                        <a href="<?php echo $URL; ?>/clientes">
                            <div class="icon">
                                <i class="fas fas fa-user-plus"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/clientes" class="small-box-footer">
                            Más detalle <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include('layout/footer.php'); ?>