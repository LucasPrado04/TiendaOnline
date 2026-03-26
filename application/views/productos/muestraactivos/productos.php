<?php if (!$productos) { ?>

   <div class="containers">
      <div class="well-all">
         <h1>PRODUCTOS ELIMINADOS</h1>
      </div>	
      <div class="all-filters">
         <div class="nav-add">
            <div class="dropdown">
               <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  Todos los productos
               </a>
               <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="<?php echo base_url('productos');?>">Todos los productos</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('mostrarfernet');?>">Fernet</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('mostrargancia');?>">Gancia</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('mostrarvodka');?>">Vodka</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('mostrarvino');?>">Vino</a></li>
               </ul> 
            </div>
         </div>
         <div class="formulariz">
            <form id="form" method="GET" action="<?php echo base_url('buscar') ?>">
               <input type="text" id="query" name="query" placeholder="Buscar producto">
               <input type="submit" id="buscar" value="Buscar">
            </form>
         </div>
         <div class="ex-but">
            <a type="button" class="btn btn-primary button-agregar" href="<?php echo base_url('productos_agrega'); ?>">
               <i class="fas fa-plus"> </i> 
               Agregar Producto
            </a>
            <a type="button" class="btn btn-danger button-eliminar" href="<?php echo base_url('productos_elim'); ?>">
               <i class="fas fa-times"></i> 
               Mostrar Eliminados
            </a> 
         </div>
      </div>
      <div class="well-h2">
         <h2>No hay resultados encontrados...</h2>
      </div>
   </div>

<?php } else { ?>
   <div class="containers">
      <div class="well-all">
         <h1>TODOS LOS PRODUCTOS</h1>
      </div>	
      <div class="all-filters">
         <div class="nav-add">
            <div class="dropdown">
               <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  Todos los productos
               </a>
               <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="<?php echo base_url('productos');?>">Todos los productos</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('mostrarfernet');?>">Fernet</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('mostrargancia');?>">Gancia</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('mostrarvodka');?>">Vodka</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('mostrarvino');?>">Vino</a></li>
               </ul>
            </div>
         </div>
         
         <div class="formulariz">
            <form action="<?php echo base_url('buscar'); ?>" method="GET">
               <input class="busqueda_s" style="width: 80%; height: 37px;" onkeyup="consulta_buscador($('#buscar').val())" type="search" placeholder="Buscar producto" name="query">
               <button class="btn btn-outline-info">Buscar</button>
            </form>
         </div>

         <div class="ex-but" style="margin-right: 40px">
            <a type="button" class="btn btn-primary button-agregar" href="<?php echo base_url('productos_agrega'); ?>">
               <i class="fas fa-plus"> </i> 
               Agregar Producto
            </a>
            <a type="button" class="btn btn-danger button-eliminar" href="<?php echo base_url('productos_elim'); ?>">
               <i class="fas fa-times"></i> 
               Mostrar Eliminados
            </a> 
         </div>
      </div>
   </div> 
         <div class="table-responsive">
         <table id="tablaUsuarios2" class="align-middle table">
            <thead class="prodthead">
               <tr>
                  <th class="idrowhead">ID</th>
                  <th>Descripcion</th>
                  <th>Precio Venta</th>
                  <th>Categoria</th>
                  <th>Stock</th>
                  <th class="imgrowhead">Imagen</th>
                  <th class="elimrowhead">Eliminado</th>
                  <th>Modificar</th>
               </tr>
            </thead>
            <tbody class="container-table">
               <?php foreach($productos->result() as $row){ 
                  $imagen = $row->imagen;	?>
                  <tr>
                     <td class="idrow"><?php echo $row->id_producto;  ?></td>
                     <td><?php echo $row->descripcion;  ?></td>
                     <td>$<?php echo $row->precio_venta;  ?></td>
                     <?php if($row->id_categoria == 1){?>
                        <td>FERNET</td><?php
                     } ?>
                     <?php if($row->id_categoria == 2){?>
                        <td>GANCIA</td><?php
                     } ?>
                     <?php if($row->id_categoria == 3){?>
                        <td>VODKA</td><?php
                     } ?>
                     <?php if($row->id_categoria == 4){?>
                        <td>VINO</td><?php
                     } ?>
                     <td><?php echo $row->stock; ?></td>
                     <td class="imgrow"><img class="card-img-top img-thumbnail" src="<?php echo $imagen; ?>"/></td>
                     <td class="elimrow"><?php echo $row->eliminado;  ?></td>
                     <td>
                        <a type="button" class="btn btn-primary btn_edit" style="width: 45px; height: 50px; padding-top: 4px; margin-top: 30px" href="<?php echo base_url("productos_modifica/$row->id_producto");?>"> 
                           <i><img src="assets/img/icons/edit.png" style="width: 24px; height: 24px;"></i>
                        </a> 
                        <a type="button" class="btn btn-danger btn_elim" style="margin-left: 4px; width: 45px; height: 50px; padding-top: 4px; margin-top: 30px" href="<?php echo base_url("producto_eliminar/$row->id_producto");?>">
                           <i class="imgelim"><img src="assets/img/icons/elim.png" style="width: 24px; height: auto;"></i>
                        </a>
                     </td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
<?php } ?>