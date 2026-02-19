<?php 
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');
include('../app/controllers/categorias/listado_de_categorias.php');

include('../app/controllers/almacen/cargar_producto.php');
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Actualizar un producto</h1>
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

            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Registo de productos</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display:block;">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="../app/controllers/almacen/update.php" method="post" enctype="multipart/form-data">
                                <input type="text" value="<?php echo $id_producto_get;?>" name="id_producto" hidden >
                                <div class="row">
                                    <div class="col-md-9">

                                       <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Código:</label>                                                    
                                                    <input type="text" class="form-control"
                                                     name="codigo" value="<?php echo $codigo; ?>" disabled>                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Categoría:</label>
                                                    <div style="display: flex;">
                                                        <select name="id_categoria" id="" class="form-control" required>
                                                        <?php
                                                        foreach($categorias_datos as $categorias_dato){
                                                            $nombre_categoria_tabla = $categorias_dato['nombre_categoria'];
                                                            $id_categoria = $categorias_dato['id_categoria'];?>
                                                        <option value="<?php echo $id_categoria; ?>"<?php if($nombre_categoria_tabla == $nombre_categoria){?> selected="selected" <?php }?>>
                                                        <?php echo $nombre_categoria_tabla; ?>
                                                        </option>                                                       
                                                        <?php
                                                        } 
                                                        ?>
                                                    </select>
                                                    <!-- <a href="<?php echo $URL?>/categorias" class="btn btn-primary"><i class="fa fa-plus"></i></a> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Nombre del producto:</label>
                                                    <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Usuario:</label>
                                                    <input type="text" name="id_usuario" class="form-control" 
                                                    value="<?php  echo $email;?>" >
                                                    <input type="text" name="id_usuario" value="<?php echo $id_usuario; ?>" hidden >
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">Descripción del producto:</label>
                                                    <textarea name="descripcion" rows="1"class="form-control"><?php echo $descripcion;?>                                                                                                        
                                                    </textarea>
                                                </div>
                                            </div>                               
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Stock:</label>
                                                    <input type="number" name="stock"  value="<?= $stock;?>" class="form-control" required >
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Stock mínimo:</label>
                                                    <input type="number" name="stock_minimo" value="<?= $stock_minimo;?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Stock máximo:</label>
                                                    <input type="number" name="stock_maximo" value="<?= $stock_maximo;?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Precio compra:</label>
                                                    <input type="number" name="precio_compra" value="<?= $precio_compra;?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Precio venta:</label>
                                                    <input type="number" name="precio_venta" value="<?= $precio_venta;?>" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">Fecha de ingreso:</label>
                                                    <input type="date" name="fecha_ingreso" value="<?= $fecha_ingreso;?>" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>



                                    </div>                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Imágen del producto:</label>
                                            <input type="file" name="imagen" class="form-control" id="file">
                                            <input type="text" name="imagen_text" value="<?php echo $imagen; ?>" hidden>
                                            <hr>
                                            <output id="list">
                                                 <center>
                                                <img src="<?= $URL."almacen/img_productos/".$imagen;?>" width="60%" alt="">
                                                </center>
                                            </output>
                                            <script>
                                                function archivo(evt){
                                                    var files = evt.target.files;//Lista de archivos
                                                    //Obtenemos la imágen del campo "file"
                                                    for(var i = 0, f; f=files[i]; i++){
                                                        //Sólo se admite imágenes
                                                        if(!f.type.match('image.*')){
                                                            continue;
                                                        }
                                                        var reader = new FileReader();
                                                        reader.onload = (function(theFile){
                                                            return function(e){
                                                                //Insertamos la imágen
                                                                document.getElementById("list").
                                                                innerHTML = ['<img class="thumb thumnail"src="', e.target.result,'"width="100%" title="', escape(theFile.name), '" />'].
                                                                join('');
                                                            };
                                                        })(f);

                                                        reader.readAsDataURL(f);
                                                    }
                                                }
                                                document.getElementById('file').addEventListener('change', archivo, false);

                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                <a href="<?php echo $URL?>almacen/index.php" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-success">Actualizar producto</button>
                                </div>
                            </form>
                        </div>
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