<?php

use Soap\Url;

include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');
include('../app/controllers/ventas/listado_de_ventas.php');

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Ventas de ventas registradas</h1>
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
                            <h3 class="card-title">Ventas registradas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                         <div class="table table-responsive">
                          <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nro de venta</center></th>  
                                    <th><center>Productos</center></th>    
                                    <th><center>Clientes</center></th>                           
                                    <th><center>Total pagado</center></th> 
                                    <th><center>Acciones</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    $contador = 0;

                                    foreach($ventas_datos as $ventas_dato){
                                        $id_venta = $ventas_dato['id_venta'];
                                        $id_cliente = $ventas_dato['id_cliente'];
                                        $contador = $contador + 1;?>
                                        <tr>
                                            <td><center><?= $contador; ?></center></td>                                                                      
                                            <td><center><?= $ventas_dato['nro_venta']; ?></center></td>                                                                      
                                            <td><center>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_productos<?= $id_venta; ?>">
                                                <i class="fa fa-shopping-basket"></i> Productos
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="Modal_productos<?= $id_venta; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #007bfe;">
                                                        <h5 class="modal-title" id="exampleModalLabel">Productos de la venta nro <?= $ventas_dato['nro_venta'] ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="table-responsive">
                                                                <table class="table table-bordered table-sm table-hover table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="background-color: #bcbdc2; text-align:center;">Nro</th>
                                                                            <th style="background-color: #bcbdc2; text-align:center;">Producto</th>
                                                                            <th style="background-color: #bcbdc2; text-align:center;">Descripción</th>
                                                                            <th style="background-color: #bcbdc2; text-align:center;">Cantidad</th>
                                                                            <th style="background-color: #bcbdc2; text-align:center;">Precio unitario</th>
                                                                            <th style="background-color: #bcbdc2; text-align:center;">Precio SubTotal</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <!-- Mostrar los producto seleccionados en la tabla -->
                                                                        <?php
                                                                        $contador_de_carrito = 0;
                                                                        $nro_venta = $ventas_dato['nro_venta']; 
                                                                        $cantidad_total = 0;
                                                                        $precio_unitario_total = 0;
                                                                        $precio_total = 0;

                                                                        $sql_carrito="SELECT *, 
                                                                        pro.nombre as nombre_producto, 
                                                                        pro.descripcion as descripcion, 
                                                                        pro.precio_venta as precio_venta,
                                                                        pro.stock as stock,
                                                                        pro.id_producto as id_producto 
                                                                        FROM tb_carrito as carr 
                                                                        INNER JOIN tb_almacen as pro ON carr.id_producto = pro.id_producto WHERE nro_venta = '$nro_venta'
                                                                        ORDER BY id_carrito ASC";
                                                                        $query_carrito = $pdo->prepare($sql_carrito);
                                                                        $query_carrito->execute();
                                                                        $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC); 
                                                                        foreach($carrito_datos as $carrito_dato){
                                                                            $id_carrito = $carrito_dato['id_carrito'];
                                                                            $contador_de_carrito = $contador_de_carrito +1;
                                                                            $cantidad_total = $cantidad_total + $carrito_dato['cantidad'];
                                                                            $precio_unitario_total = $precio_unitario_total + floatval($carrito_dato['precio_venta']);
                                                                            ?>

                                                                            <tr>
                                                                                <td><center><?= $contador_de_carrito;?>
                                                                                <input type="text" value="<?= $carrito_dato['id_producto'] ?>" id="id_producto<?= $contador_de_carrito ?>" hidden>
                                                                                </center></td>
                                                                                <td><center><?= $carrito_dato['nombre_producto'];?></center></td>
                                                                                <td><center><?= $carrito_dato['descripcion'];?></center></td>
                                                                                <td><center><span id="cantidad_carrito<?= $contador_de_carrito;?>"><?= $carrito_dato['cantidad'];?></span>
                                                                                    <!-- Trae los datos del stock actual -->
                                                                                    <input type="text" value="<?= $carrito_dato['stock']; ?>" id="stock_de_inventario<?= $contador_de_carrito; ?>" hidden>
                                                                                </center></td>
                                                                                <td><center><?= $carrito_dato['precio_venta'];?></center></td>
                                                                                <td><center>
                                                                                    <?php
                                                                                        $cantidad = floatval($carrito_dato['cantidad']);
                                                                                        $precio_venta = floatval($carrito_dato['precio_venta']);
                                                                                        echo $subtotal = $cantidad * $precio_venta;

                                                                                        $precio_total = $precio_total + $subtotal;
                                                                                    ?>
                                                                                </center></td>  
                                                                            </tr>
                                                                        <?php    
                                                                        }
                                                                        ?>
                                                                        
                                                                        
                                                                        <tr>
                                                                            <th colspan="3" style="background-color: #bcbdc2; text-align:right;">Total</th>
                                                                            <th><center><?= $cantidad_total;?></center></th>
                                                                            <th><center><?= $precio_unitario_total; ?></center></th>
                                                                            <th  style="background-color: #eceb9e;"><center><?= $precio_total; ?></center></th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        
                                                    </div>                                                    
                                                    </div>
                                                </div>
                                                </div>
                                                
                                            </center>
                                                  

                                            </td>                                                                      
                                            <td><center>
                                               

                                                 <!-- Button Modal Listado de Cliente -->
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modal_clientes<?= $id_venta; ?>">
                                                <i class="fa fa-users"></i> <?= $ventas_dato['nombre_cliente'];?>
                                                </button>


                                                <!-- Modal Listado de Cliente -->
                                              
                                                <div class="modal fade" id="Modal_clientes<?= $id_venta; ?>" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="background-color: #ac8102; color:white">
                                                            <h4 class="modal-title">Datos del cliente</h4>           
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <?php
                                                        $sql_clientes="SELECT * FROM tb_clientes WHERE id_cliente ='$id_cliente' " ; 
                                                        $query_clientes = $pdo->prepare($sql_clientes);
                                                        $query_clientes->execute();
                                                        $clientes_datos = $query_clientes->fetchAll(PDO::FETCH_ASSOC);

                                                        foreach($clientes_datos as $clientes_dato){
                                                            $nombre_cliente = $clientes_dato['nombre_cliente'];
                                                            $nit_ci_cliente = $clientes_dato['nit_ci_cliente'];
                                                            $celular_cliente = $clientes_dato['celular_cliente'];
                                                            $email_cliente = $clientes_dato['email_cliente'];
                                                        }
                                                         ?>
                                                        <div class="modal-body">
                                                            
                                                                <div class="form-group">
                                                                    <label for="">Nombre</label>
                                                                    <input type="text" name="nombre_cliente" class="form-control" value="<?= $nombre_cliente; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">                
                                                                    <label for="">Nit/CI cliente</label>                
                                                                    <input type="text" name="nit_ci_cliente" class="form-control" value="<?= $nit_ci_cliente; ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Celular</label>
                                                                    <input type="text" name="celular_cliente" class="form-control" value="<?= $celular_cliente ?>" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Email</label>
                                                                    <input type="text" name="email_cliente" class="form-control" value="<?= $email_cliente ?>" disabled>
                                                                </div>
                                                                <hr>
                                                                
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                                </div>
                                                



                                            


                                            </center></td>                                                                      
                                            <td><center><button class="btn btn-primary" disabled><?= "$".$ventas_dato['total_pagado']; ?></button></center></td>                                                                      
                                            <td><center>
                                                <a href="<?= $URL?>ventas/show.php?id_venta=<?= $id_venta;?>" class="btn btn-info"><i class="fa fa-eye"></i> Ver</a>
                                                <a href="<?= $URL?>ventas/delete.php?id_venta=<?= $id_venta;?>&nro_venta=<?= $nro_venta;?>" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</a>
                                                <a href="<?= $URL?>ventas/factura.php?id_venta=<?= $id_venta;?>&nro_venta=<?= $nro_venta;?>" class="btn btn-success"><i class="fa fa-print"></i> Factura</a>
                                            </center></td>                                                                      
                                        </tr>                     
                                    <?php
                                    }
                                    ?>                          
                            </tbody>
                            </table>
                         </div>
                        </div>
                        <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include('../layout/mensajes.php');
include('../layout/parte2.php');
?>
<script>
  $(function () {
    $("#example1").DataTable({
      "pageLength":5,
      "language":{
        "emptyTable":"No hay información",
        "info":"Mostrando _START_ a _END_ de _TOTAL_ Compras",
        "infoEmpty":"Mostrando 0 a 0 de 0 Compras",
        "infoFiltered":"(Filtrado de _MAX_ total Compras)",
        "infoPostFix":"",
        "thousands":",",
        "lengthMenu":"Mostrar _MENU_ Compras",
        "loadingRecords":"Cargando...",
        "processing":"Procesando...",
        "search":"Buscador:",
        "zeroRecords":"Sin resultados encontrados",
        "paginate":{
          "first":"Primero",
          "last":"Ultimo",
          "next":"Siguiente",
          "previous":"Anterior"
        }



      },
      "responsive": true, "lengthChange": true, "autoWidth": false,
      buttons:[{
        extend: 'collection',
        text: 'Reportes',
        orientation: 'landscape',
        buttons:[{
          text:'Copiar',
          extend:'copy',
        },{
          extend:'pdf'
        },{
          extend:'csv'
        },{
          extend:'excel'
        },{
          text:'Imprimir',
          extend:'print'
        }
      ]
    },{
      extend:'colvis',
      text:'Visor de columnas',
      collectionLayout:'fixed three-column'
    }
  ],
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>
