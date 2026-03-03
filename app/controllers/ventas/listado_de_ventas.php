<?php

$sql_ventas="SELECT *, cli.nombre_cliente as nombre_cliente , ve.nro_venta as venta
                    FROM tb_ventas as ve  
                    INNER JOIN tb_clientes as cli ON  cli.id_cliente = ve.id_cliente
                    ORDER BY venta ASC"; 


$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$ventas_datos = $query_ventas->fetchAll(PDO::FETCH_ASSOC);