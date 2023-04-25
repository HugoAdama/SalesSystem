<?php include('../app/config.php'); ?>

<?php include('../layout/sesion.php'); ?>

<?php include('../layout/header.php'); ?>

<?php include('../app/controllers/usuarios/update_usuario.php'); ?>
<?php include('../app/controllers/roles/listado_roles.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualización de datos</h1>
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
                            <h3 class="card-title">Ingrese los datos a actualizar</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body" style="display:block">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="../app/controllers/usuarios/update.php" method="post">

                                        <input type="text" name="id_usuario" value="<?php echo $id_usuario_get; ?>" hidden>
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <input type="text" name="nombres" class="form-control" value="<?php echo $nombres; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Rol de usuario</label>
                                            <select name="rol" id="" class="form-control">
                                                <?php foreach ($roles_datos as $rol_dato) {
                                                    $rol_tabla = $rol_dato['rol'];
                                                    $id_rol = $rol_dato['id_rol'] ?>
                                                    <option value="<?php echo $id_rol; ?>" <?php if ($rol_tabla == $rol) { ?> selected="selected" <?php } ?>><?php echo $rol_dato['rol']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Contraseña</label>
                                            <input type="text" name="password_user" class="form-control" placeholder="Escriba su contraseña">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Repita la contraseña</label>
                                            <input type="text" name="password_repeat" class="form-control" placeholder="Escriba su contraseña">
                                        </div>


                                        <hr>
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-danger">Cancelar</a>
                                            <button type="submit" class="btn btn-success">Actualizar</button>
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