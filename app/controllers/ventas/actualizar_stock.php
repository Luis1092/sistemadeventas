<?php
include('../../config.php');

// if (!empty($_GET)) {
//     echo "<pre>";
//     print_r($_GET); // Muestra todas las claves y valores
//     echo "</pre>";
// }


$id_producto = $_GET['id_producto'];
$stock_calculado = $_GET['stock_calculado'];


$sentencia = $pdo->prepare("UPDATE tb_almacen SET stock=:stock  WHERE id_producto=:id_producto");
  
    $sentencia->bindParam('stock',$stock_calculado);
    $sentencia->bindParam('id_producto',$id_producto);


if($sentencia->execute()){
    echo "Se actualizó todo...";

}else{
    echo "Error al actualizar...";
}