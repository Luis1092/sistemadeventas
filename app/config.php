<?php
define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','alevoso1234');
define('BD','sistema_de_ventas');

$servidor = "mysql:dbname=".BD."; host=".SERVIDOR;

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // echo "Se conectó con éxito";
} catch (PDOException $e) {
    //print_r($e);
    echo "No se pudo conectar a la BD";
}
$URL = "http://localhost/www.sistemadeventas.com/";

date_default_timezone_set('America/Argentina/Tucuman');
$fechaHora = date('Y-m-d H:i:s');


