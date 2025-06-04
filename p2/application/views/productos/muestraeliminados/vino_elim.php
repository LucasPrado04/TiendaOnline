<?php if (!$productos) { ?>

   <div class="well-wine">
      <h1>VINO</h1>
   </div>	
   <?php if( ($this->session->userdata('logged_in')) and ($perfil_id == '1') ) { ?>
         <div class="all-filters">
            <div class="nav-wine" style="margin-left: 40px">
               <div class="dropdown">
                  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                     Vino
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                     <li><a class="dropdown-item" href="<?php echo base_url('productos_elim');?>">Todos los productos</a></li>
                     <li><a class="dropdown-item" href="<?php echo base_url('fernet_elim');?>">Fernet</a></li>
                     <li><a class="dropdown-item" href="<?php echo base_url('gancia_elim');?>">Gancia</a></li>
                     <li><a class="dropdown-item" href="<?php echo base_url('vodka_elim');?>">Vodka</a></li>
                     <li><a class="dropdown-item" href="<?php echo base_url('vino_elim');?>">Vino</a></li>
                  </ul>
               </div>
            </div>
            <div class="formulariz">
               <form action="">
                  <input class="busqueda_s" style="width: 80%; height: 37px;" type="search" placeholder="Buscar producto">
                  <button class="btn btn-outline-info">Buscar</button>
               </form>
            </div>
            <div class="ex-fernet" style="margin-right: 40px">
               <a type="button" class="btn btn-primary button-agregar" href="<?php echo base_url('productos_agrega'); ?>">
                  <i class="fas fa-plus"> </i> 
                  Agregar Producto
               </a>
               <a type="button" class="btn btn-success button-eliminar" href="<?php echo base_url('productos'); ?>">
                  <i class="fas fa-times"></i> 
                  Mostrar Activos
               </a> 
            </div>
         </div>
         <div class="well-h2">
            <h2>No hay resultados encontrados...</h2>
         </div>
      </div>
   <?php } ?>  
</div>


<?php } else { ?>
   <div class="containers">
      <div class="well-wine">
         <h1>VINO</h1>
      </div>	
      <div class="all-filters">
         <div class="nav-wine" style="margin-left: 40px">
            <div class="dropdown">
               <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  Vino
               </a>
               <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="<?php echo base_url('productos_elim');?>">Todos los productos</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('fernet_elim');?>">Fernet</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('gancia_elim');?>">Gancia</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('vodka_elim');?>">Vodka</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('vino_elim');?>">Vino</a></li>
               </ul>
            </div>
         </div>
         <div class="formulariz">
            <form action="">
               <input class="busqueda_s" style="width: 80%; height: 37px;" type="search" placeholder="Buscar producto">
               <button class="btn btn-outline-info">Buscar</button>
            </form>
         </div>
         <div class="ex-fernet" style="margin-right: 40px">
            <a type="button" class="btn btn-primary button-agregar" href="<?php echo base_url('productos_agrega'); ?>">
               <i class="fas fa-plus"> </i> 
               Agregar Producto
            </a>
            <a type="button" class="btn btn-success button-eliminar" href="<?php echo base_url('productos'); ?>">
               <i class="fas fa-times"></i> 
               Mostrar Activos
            </a> 
         </div>
      </div>
   </div>
   <div class="table-responsive">
      <table id="tablaUsuarios2" class="table align-middle">
         <thead>
            <tr>
               <th class="idrowhead">ID</th>
               <th>Descripcion</th>
               <th>Precio Venta</th>
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
                  <td ><?php echo $row->descripcion;  ?></td>
                  <td >$<?php echo $row->precio_venta;  ?></td>
                  <td ><?php echo $row->stock;  ?></td>
                  <td class="imgrow"><img class="card-img-top img-thumbnail" src="<?php echo $imagen; ?>"/></td>
                  <td class="elimrow"><?php echo $row->eliminado;  ?></td>
                  <td>
                     <a type="button" class="btn btn-primary btn_edit" style="width: 45px; height: 50px; padding-top: 4px; margin-top: 30px" href="<?php echo base_url("productos_modifica/$row->id_producto");?>"> 
                        <i><img src="assets/img/icons/edit.png" style="width: 24px; height: 24px;"></i>
                     </a> 
                     <a type="button" class="btn btn-success btn_elim" style="margin-left: 4px; width: 45px; height: 50px; padding-top: 4px; margin-top: 30px" href="<?php echo base_url("producto_eliminar/$row->id_producto");?>">
                        <i class="imgelim"><img src="assets/img/icons/check.png" style="width: 24px; height: auto;"></i>
                     </a>
                  </td>
               </tr>
            <?php } ?>
         </tbody>
      </table>
   </div>
<?php } ?>