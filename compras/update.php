<?php
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');
include('../app/controllers/almacen/listado_de_productos.php');
include('../app/controllers/proveedores/listado_de_proveedores.php');
include('../app/controllers/compras/cargar_compra.php');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualización de la compra</h1>
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
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Registo de compras</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display:block;">
                                    <div style="display:flex">
                                        <h5>Datos del producto</h5>
                                        <div style="width:20px"></div>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modal-buscar_producto">
                                            <i class="fa fa-search"></i>
                                            Buscar producto
                                        </button>
                                    </div>
                                    <hr>
                                    <!-- Modal para visualizar productos -->
                                    <div class="row" style="font-size: 12px;">
                                        <div class="modal fade" id="modal-buscar_producto" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #1d36b6; color:white">
                                                        <h4 class="modal-title">Busqueda del producto</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table table-responsive">
                                                            <table id="example1" class="table table-bordered table-striped table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <center>Nro</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Seleccionar</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Código</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Categoría</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Imágen</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Nombre</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Descripción</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Stock</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Stock mínimo</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Stock máximo</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Precio Compra</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Precio Venta</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Fecha Ingreso</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Usuario</center>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $contador = 0;
                                                                    foreach ($productos_datos as $productos_dato) {
                                                                        $id_producto = $productos_dato['id_producto']; ?>
                                                                        <tr>
                                                                            <td><?php echo $contador = $contador + 1; ?></td>
                                                                            <td>
                                                                                <button class="btn btn-info" id="btn_seleccionar<?php echo $id_producto; ?>">
                                                                                    Seleccionar
                                                                                </button>
                                                                                <script>
                                                                                    $('#btn_seleccionar<?php echo $id_producto; ?>').click(function() {

                                                                                        var id_producto = "<?php echo $productos_dato['id_producto']; ?>";
                                                                                        $('#id_producto').val(id_producto);

                                                                                        var codigo = "<?php echo $productos_dato['codigo']; ?>";
                                                                                        $('#codigo').val(codigo);
                                                                                        var categoria = "<?php echo $productos_dato['categoria']; ?>";
                                                                                        $('#categoria').val(categoria);
                                                                                        var nombre = "<?php echo $productos_dato['nombre']; ?>";
                                                                                        $('#nombre').val(nombre);
                                                                                        var email = "<?php echo $productos_dato['email']; ?>";
                                                                                        $('#email').val(email);
                                                                                        var descripcion = "<?php echo $productos_dato['descripcion']; ?>";
                                                                                        $('#descripcion').val(descripcion);

                                                                                        var stock = "<?php echo $productos_dato['stock']; ?>";
                                                                                        $('#stock').val(stock);

                                                                                        $('#stock_actual').val(stock);

                                                                                        var stock_minimo = "<?php echo $productos_dato['stock_minimo']; ?>";
                                                                                        $('#stock_minimo').val(stock_minimo);
                                                                                        var stock_maximo = "<?php echo $productos_dato['stock_maximo']; ?>";
                                                                                        $('#stock_maximo').val(stock_maximo);
                                                                                        var precio_compra = "<?php echo $productos_dato['precio_compra']; ?>";
                                                                                        $('#precio_compra').val(precio_compra);
                                                                                        var precio_venta = "<?php echo $productos_dato['precio_venta']; ?>";
                                                                                        $('#precio_venta').val(precio_venta);
                                                                                        var fecha_ingreso = "<?php echo $productos_dato['fecha_ingreso']; ?>";
                                                                                        $('#fecha_ingreso').val(fecha_ingreso);

                                                                                        var ruta_img = "<?php echo $URL . 'almacen/img_productos/' . $productos_dato['imagen']; ?>";
                                                                                        $('#img_producto').attr({
                                                                                            src: ruta_img
                                                                                        });

                                                                                        $('#modal-buscar_producto').modal('toggle');


                                                                                    });
                                                                                </script>
                                                                            </td>
                                                                            <td><?php echo $productos_dato['codigo']; ?></td>
                                                                            <td><?php echo $productos_dato['categoria']; ?></td>
                                                                            <td>
                                                                                <img src="<?php echo $URL . "almacen/img_productos/" . $productos_dato['imagen']; ?>" width="50px" alt="">
                                                                            </td>
                                                                            <td><?php echo $productos_dato['nombre']; ?></td>
                                                                            <td><?php echo $productos_dato['descripcion']; ?></td>
                                                                            <td><?php echo $productos_dato['stock']; ?></td>
                                                                            <td><?php echo $productos_dato['stock_minimo']; ?></td>
                                                                            <td><?php echo $productos_dato['stock_maximo']; ?></td>
                                                                            <td><?php echo $productos_dato['precio_compra']; ?></td>
                                                                            <td><?php echo $productos_dato['precio_venta']; ?></td>
                                                                            <td><?php echo $productos_dato['fecha_ingreso']; ?></td>
                                                                            <td><?php echo $productos_dato['email']; ?></td>

                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>

                                        <hr>

                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">

                                                        <input type="text" value="<?= $id_producto;?>" id="id_producto" hidden>
                                                        <label for="">Código:</label>
                                                        <input type="text" value="<?= $codigo; ?>" id="codigo" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Categoría:</label>
                                                        <div style="display: flex;">
                                                            <input type="text" value="<?= $nombre_categoria; ?>" id="categoria" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Nombre del producto:</label>
                                                        <input type="text" value="<?= $nombre_producto; ?>" id="nombre" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Usuario:</label>
                                                        <input type="text" value="<?= $nombre_usuario; ?>" id="email" class="form-control" disabled>
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
                                                        <input type="number" value="<?= $stock; ?>" id="stock" class="form-control" style="background-color: #fff819;" disabled>
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
                                            <div style="display:flex">
                                                <h5>Datos del proveedor</h5>
                                                <div style="width:20px"></div>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#modal-buscar_proveedor">
                                                    <i class="fa fa-search"></i>
                                                    Buscar proveedor
                                                </button>

                                                <!-- Modal para buscar proveedores -->
                                                <div class="modal fade" id="modal-buscar_proveedor" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #1d36b6; color:white">
                                                                <h4 class="modal-title">Busqueda del proveedor</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table table-responsive">
                                                                    <table id="example2" class="table table-bordered table-striped table-sm">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    <center>Nro</center>
                                                                                </th>
                                                                                <th>
                                                                                    <center>Seleccionar</center>
                                                                                </th>
                                                                                <th>
                                                                                    <center>Nombre del proveedor</center>
                                                                                </th>
                                                                                <th>
                                                                                    <center>Celular</center>
                                                                                </th>
                                                                                <th>
                                                                                    <center>Teléfono</center>
                                                                                </th>
                                                                                <th>
                                                                                    <center>Empresa</center>
                                                                                </th>
                                                                                <th>
                                                                                    <center>Email</center>
                                                                                </th>
                                                                                <th>
                                                                                    <center>Dirección</center>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $contador = 0;
                                                                            foreach ($proveedores_datos as $proveedores_dato) {
                                                                                $id_proveedor = $proveedores_dato['id_proveedor'];
                                                                                $nombre_proveedor = $proveedores_dato['nombre_proveedor'];
                                                                            ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <center><?php echo $contador = $contador + 1; ?></center>
                                                                                    </td>
                                                                                    <td>
                                                                                        <center>
                                                                                            <button class="btn btn-info" id="btn_seleccionar_proveedor<?php echo $id_proveedor; ?>">
                                                                                                Seleccionar
                                                                                            </button>
                                                                                        </center>
                                                                                        <script>
                                                                                            $('#btn_seleccionar_proveedor<?php echo $id_proveedor; ?>').click(function() {
                                                                                                var id_proveedor = '<?php echo $id_proveedor; ?>';
                                                                                                $('#id_proveedor').val(id_proveedor);

                                                                                                var nombre_proveedor = '<?php echo $nombre_proveedor; ?>';
                                                                                                $('#nombre_proveedor').val(nombre_proveedor);
                                                                                                var celular_proveedor = '<?php echo $proveedores_dato['celular']; ?>';
                                                                                                $('#celular').val(celular_proveedor);
                                                                                                var telefono_proveedor = '<?php echo $proveedores_dato['telefono']; ?>';
                                                                                                $('#telefono').val(telefono_proveedor);
                                                                                                var empresa_proveedor = '<?php echo $proveedores_dato['empresa']; ?>';
                                                                                                $('#empresa').val(empresa_proveedor);
                                                                                                var email_proveedor = '<?php echo $proveedores_dato['email']; ?>';
                                                                                                $('#email_proveedor').val(email_proveedor);
                                                                                                var direccion_proveedor = '<?php echo $proveedores_dato['direccion']; ?>';
                                                                                                $('#direccion').val(direccion_proveedor);


                                                                                                $('#modal-buscar_proveedor').modal('toggle');

                                                                                            });
                                                                                        </script>
                                                                                    </td>
                                                                                    <td><?php echo $nombre_proveedor; ?></td>
                                                                                    <td>
                                                                                        <a href="https://wa.me/54<?php echo $proveedores_dato['celular']; ?>" target="_blank" class="btn btn-success">
                                                                                            <i class="fa fa-phone"></i>
                                                                                            <?php echo $proveedores_dato['celular']; ?>
                                                                                        </a>
                                                                                    </td>
                                                                                    <td><?php echo $proveedores_dato['telefono']; ?></td>
                                                                                    <td><?php echo $proveedores_dato['empresa']; ?></td>
                                                                                    <td><?php echo $proveedores_dato['email']; ?></td>
                                                                                    <td><?php echo $proveedores_dato['direccion']; ?></td>

                                                                                </tr>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="container-fluid" style="font-size: 12px;">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" value="<?= $id_proveedor_tabla; ?>" id="id_proveedor" hidden>
                                                            <label for="">Nombre del proveedor</label>
                                                            <input type="text" value="<?= $nombre_proveedor_tabla;?>" id="nombre_proveedor" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Celular</label>
                                                            <input type="number" value="<?= $celular_proveedor;?>" id="celular" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Teléfono</label>
                                                            <input type="number" value="<?= $telefono;?>" id="telefono" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Empresa</label>
                                                            <input type="text" value="<?= $empresa;?>" id="empresa" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="email" value="<?= $email_proveedor;?>" id="email_proveedor" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Dirección</label>
                                                            <textarea id="direccion" class="form-control" rows="1" disabled><?= $direccion;?></textarea>
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
                                                <?php 
                                                // $contador_de_compras = 1;
                                                // foreach ($compras_datos as $compras_dato){
                                                //     $contador_de_compras = $contador_de_compras +1;
                                                // }
                                                ?>
                                                <label for="">Número de la compra</label>
                                                
                                                <input type="text" value="<?=  $nro_compra; ?>" id="nro_compra" style="text-align: center;" class="form-control" disabled>

                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Fecha de la compra</label>
                                                <input type="date" value="<?= $fecha_compra ?>" class="form-control" id="fecha_compra">
                                                <small style="color:red; display:none;" id="lbl_fecha_compra<?php echo $id_producto; ?>">* Este campo es requerido</small>                                                
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Comprobante de la compra</label>
                                                <input type="text" value="<?= $comprobante ?>" class="form-control text-uppercase" id="comprobante_prod" >  
                                                <small style="color:red; display:none;" id="lbl_comprobante_prod<?php echo $id_producto; ?>">* Este campo es requerido</small>                                                   
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Precio de la compra</label>
                                                <input type="number" value="<?= $precio_compra; ?>" class="form-control" id="precio_compra_prod" >
                                                <small style="color:red; display:none;" id="lbl_precio_compra_prod<?php echo $id_producto; ?>">* Este campo es requerido</small> 
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Stock actual</label>
                                                <input type="text" value="<?= $stock=$stock-$cantidad;?>" id="stock_actual" class="form-control" style="background-color: #fff819;" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Stock total</label>
                                                <input type="text" id="stock_total" class="form-control"  disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Cantidad de la compra</label>
                                                <input type="number" value="<?= $cantidad;?>" id="cantidad" style="text-align: center;" class="form-control" >
                                                <small style="color:red; display:none;" id="lbl_cantidad<?php echo $id_producto; ?>">* Este campo es requerido</small> 
                                                
                                            </div>
                                            <script>
                                                $('#cantidad').keyup(function(){
                                                    
                                                    sumacantidades();

                                                });
                                                sumacantidades();
                                                function sumacantidades(){
                                                    var stock_actual = $('#stock_actual').val();
                                                    var stock_compra = $('#cantidad').val();

                                                    var total = parseInt(stock_actual) + parseInt(stock_compra);
                                                    $('#stock_total').val(total);

                                                };
                                            </script>
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
                                            <button class="btn btn-success btn-block" id="btn_actualizar_compra" >Actualizar compra</button>
                                            <a href="<?= $URL?>/compras" class="btn btn-secondary btn-block">Volver</a>
                                        </div>                                        
                                        <script>
                                            $('#btn_actualizar_compra').click(function (){
                                                
                                                var id_compra = <?= $id_compra ?>;
                                                var id_producto = $('#id_producto').val();
                                                var nro_compra = $('#nro_compra').val();                                               
                                                var fecha_compra = $('#fecha_compra').val();
                                                var id_proveedor = $('#id_proveedor').val();
                                                var comprobante = $('#comprobante_prod').val();
                                                var id_usuario = '<?php echo $id_usuario_session; ?>';
                                                var precio_compra_prod =$('#precio_compra_prod').val();
                                                var cantidad =$('#cantidad').val();
                                                
                                                var stock_total =$('#stock_total').val();

                                                // Validamos que vengan todos los datos                                                
                                                if(id_producto == ""){
                                                    $('#id_producto<?php echo $id_producto;?>').focus();
                                                    // alert('Ingrese un producto');

                                                }else if(fecha_compra == ""){
                                                    $('#fecha_compra<?php echo $id_producto;?>').focus();
                                                     $('#lbl_fecha_compra<?php echo $id_producto; ?>').css('display','block');
                                                    

                                                }else if(comprobante == ""){
                                                    $('#comprobante_prod<?php echo $id_producto;?>').focus();
                                                    $('#lbl_comprobante_prod<?php echo $id_producto; ?>').css('display','block');

                                                }else if(precio_compra_prod == ""){                                                    
                                                    $('#precio_compra_prod<?php echo $id_producto;?>').focus();
                                                    $('#lbl_precio_compra_prod<?php echo $id_producto; ?>').css('display','block');
                                                    
                                                    // alert('Ingrese el precio de la compra');

                                                }else if(cantidad == ""){                                                    
                                                    $('#cantidad<?php echo $id_producto;?>').focus();
                                                    $('#lbl_cantidad<?php echo $id_producto; ?>').css('display','block');
                                                

                                                
                                                }else{
                                                    var url = '../app/controllers/compras/update.php';
                                                    $.get(url,{                                                                    
                                                        id_compra:id_compra,
                                                        id_producto:id_producto,
                                                        nro_compra:nro_compra, 
                                                        fecha_compra:fecha_compra, 
                                                        comprobante:comprobante,
                                                        id_usuario:id_usuario,
                                                        id_proveedor:id_proveedor, 
                                                        precio_compra:precio_compra_prod,
                                                        cantidad:cantidad,
                                                        stock_total:stock_total
                                                        
                                                    }, 

                                                        function(datos){                                                                    
                                                        $('#respuesta_update').html(datos);
                                                    });
                                                    
                                                } 
                                            });

                                        </script>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                             <div id="respuesta_update"></div>
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
<script>
    $(function() {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }



            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,

        })

    });
</script>
<script>
    $(function() {
        $("#example2").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
                "infoEmpty": "Mostrando 0 a 0 de 0 Proveedores",
                "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Proveedores",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }



            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,


        })
    });
</script>