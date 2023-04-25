<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../public/templates/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/templates/AdminLTE-3.2.0//dist/css/adminlte.min.css">
    <!-- SweetAlerts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->

        <?php
        session_start();
        if (isset($_SESSION['mensaje'])) {
            $respuesta = $_SESSION['mensaje']; ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: '<?php echo $respuesta; ?>',
                    text: 'Ingrese de nuevo sus datos correctamente',
                    showConfirmButton: false,
                    timer: 2000
                })
            </script>
        <?php
            unset($_SESSION['mensaje']);
        }
        ?>

        <center>
            <img src="https://img.freepik.com/vector-gratis/gerentes-startups-que-presentan-analizan-tabla-crecimiento-ventas-grupo-trabajadores-monton-dinero-efectivo-cohetes-diagramas-barras-flecha-monton-dinero_74855-14166.jpg?w=1380&t=st=1680816909~exp=1680817509~hmac=effab84022d2dbe11e7eb33e629da5352cbb623c7d0fc2ebb91fa8151d6b5946" width="300px" alt="">
        </center>
        <br>
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../public/templates/AdminLTE-3.2.0/index2.html" class="h1"><b>Sistema de </b>VENTAS</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Ingrese sus datos</p>

                <form action="../app/controllers/login/ingreso.php" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password_user" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="../public/templates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../public/templates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../public/templates/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>

</html>