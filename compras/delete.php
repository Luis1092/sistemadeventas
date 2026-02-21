<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
include('../app/controllers/compras/listado_de_compras.php');
include('../app/controllers/compras/cargar_compra.php');


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Compra nro: <?php echo $nro_compra; ?></h1>
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
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">¿Está seguro de eliminar la compra?</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display:block;">
                                    <hr>
                                    <!-- Modal para visualizar productos -->
                                    <div class="row" style="font-size: 12px;">
                                        <hr>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input type="text" value="<?php echo $id_producto;?>" id="id_producto" hidden>
                                                        <label for="">Código:</label>
                                                        <input type="text" id="codigo" value="<?= $codigo; ?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Categoría:</label>
                                                        <div style="display: flex;">
                                                            <input type="text" id="categoria" value="<?= $nombre_categoria; ?>" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Nombre del producto:</label>
                                                        <input type="text" id="nombre" value="<?= $nombre_producto; ?>" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Usuario:</label>
                                                        <input type="text" id="email" value="<?=  $nombre_usuario; ?> " class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="">Descripción del producto:</label>
                                                        <textarea id="descripcion" cols="30" rows="1" class="form-control" disabled><?= $descripcion; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock:</label>
                                                        <input type="number" id="stock" value="<?= $stock; ?>" class="form-control" style="background-color: #fff819;" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock mínimo:</label>
                                                        <input type="number" value="<?= $stock_minimo; ?>" id="stock_minimo" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock máximo:</label>
                                                        <input type="number" value="<?= $stock_maximo; ?>" id="stock_maximo" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Precio compra:</label>
                                                        <input type="number" value="<?= $precio_compra_producto; ?>" id="precio_compra" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Precio venta:</label>
                                                        <input type="number" value="<?= $precio_venta; ?>" id="precio_venta" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Fecha de ingreso:</label>
                                                        <input type="date" value="<?= $fecha_ingreso; ?>" id="fecha_ingreso" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="container-fluid" style="font-size: 12px;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" id="id_proveedor" hidden>
                                                            <label for="">Nombre del proveedor</label>
                                                            <input type="text" value="<?= $nombre_proveedor_tabla; ?>" id="nombre_proveedor" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Celular</label>
                                                            <input type="number" value="<?= $celular_proveedor; ?>"id="celular" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Teléfono</label>
                                                            <input type="number" value="<?= $telefono; ?>" id="telefono" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Empresa</label>
                                                            <input type="text" value="<?= $empresa; ?>" id="empresa" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="email" value="<?= $email_proveedor; ?>" id="email_proveedor" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Dirección</label>
                                                            <textarea id="direccion" class="form-control" rows="1" disabled><?= $direccion; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Imágen del producto:</label>
                                                <center>
                                                    <img src="<?php echo $URL . "almacen/img_productos/" . $imagen; ?>" id="img_producto" width="60%" alt="">
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
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
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row" style="font-size: 12px;">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Número de la compra</label>
                                                <input type="text" value="<?= $id_compra_get; ?>" style="text-align: center;" class="form-control" disabled>
                                                <input type="text" value="<?= $id_compra_get; ?>" id="nro_compra" hidden>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Fecha de la compra</label>
                                                <input type="date" value="<?= $fecha_compra; ?>" id="fecha_compra" class="form-control" disabled>
                                                                                                
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Comprobante de la compra</label>
                                                <input type="text" value="<?= $comprobante; ?>" class="form-control text-uppercase" id="comprobante_prod" disabled> 
                                                                                                  
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Precio de la compra</label>
                                                <input type="number" value="<?= $precio_compra; ?>" class="form-control" id="precio_compra_prod" disabled>
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Cantidad de la compra</label>
                                                <input type="number" value="<?= $cantidad; ?>" id="cantidad" style="text-align: center;" class="form-control" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Usuario</label>
                                                <input type="text" value="<?= $email_session; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-danger btn-block" id="btn_eliminar"><i class="fa fa-trash"></i>Eliminar</button>
                                            <a href="<?php echo $URL?>/compras/index.php" class="btn btn-info btn-block">Volver</a>  
                                        </div> 
                                    </div>
                                    <div id="respuesta_delete"></div>
                                    <script>
                                        $('#btn_eliminar').click(function(){
                                            var id_compra ='<?=  $id_compra_get;?>';
                                            var id_producto = $('#id_producto').val();
                                            var cantidad_compra = '<?= $cantidad;?>';
                                            var stock_actual = '<?= $stock;?>';

                                            // alert(id_compra+"-"+id_producto);
                                            swal.fire({
                                                title:'¿Está seguro de eliminar la compra',                                                
                                                icon: 'question',
                                                showCancelButton:true,
                                                confirmButtonColor:'#3085d6',
                                                cancelButtonColor:'#d33',
                                                confirmButtonText:'Si deseo eliminar'
                                            }).then((result)=>{
                                                if(result.isConfirmed){
                                                    Swal.fire(
                                                        eliminar(),
                                                        'Compra eliminada',
                                                        'success'
                                                    )
                                                }
                                            });

                                            function eliminar(){
                                                var url = "../app/controllers/compras/delete.php";
                                                $.get(url, {
                                                    id_compra:id_compra, 
                                                    id_producto:id_producto, 
                                                    cantidad_compra:cantidad_compra,
                                                    stock_actual:stock_actual
                                                }, function(datos){
                                                    $('#respuesta_delete').html(datos);
                                                });
                                            }
                                        });
                                    </script>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->                           
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

<?php
include('../layout/mensajes.php');
include('../layout/parte2.php');
?>