<?php

define('SERVIDOR', 'localhost:3307');
define('USER', 'root');
define('PASSWORD', '');
define('DB', 'sistemadeventas');

$servidor = "mysql:dbname=" . DB . ";host=" . SERVIDOR;

try {
    $pdo = new PDO($servidor, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error de conexión: ";
}

$URL = "http://localhost/SistemaVentas";

date_default_timezone_set('America/Lima');

$fechaHora = date("Y-m-d H:i:s");

