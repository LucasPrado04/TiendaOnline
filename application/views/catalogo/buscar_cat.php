<!-- ---------------------------------- GRID ------------------------------------------------------- -->
<body>
    <div class="resultado">
        <h1>RESULTADO DE BUSQUEDA</h1>
    </div>
	<div class="formbusqueda">
		<form id="form"  method="GET" action="<?php echo base_url('buscarcat') ?>">
			<input type="text" id="query" name="query" placeholder="Buscar producto">
			<input type="submit" id="buscar" value="Buscar">
		</form>

	</div>
	<div class="container-card">
		<?php foreach($productos as $producto){ 
			$imagen = $producto->imagen;
		?>
			<div class="tarjetita">
				<img src="<?php echo base_url($imagen); ?>" alt="<?php echo $producto->descripcion; ?>"/>
				<h4 class="subtitulo"><?php echo trim($producto->descripcion); ?></h4>
				<p class="subtitulo">Precio: $<?php echo $producto->precio_venta; ?></p>
				<p class="subtitulo">
					<?php if($producto->stock == 0){
						echo '<span class="badge bg-danger">Sin Stock</span>';
					} elseif ($producto->stock_min >= $producto->stock) {
						echo '<span class="badge bg-warning">Últimas unidades</span>';
					} else {
						echo '<span class="badge bg-success">Hay Stock</span>';
					} ?>
				</p>
				<p class="subtitulo">
					<?php if ($producto->stock < $producto->stock_min && $producto->stock > 0) {
						echo 'Por debajo del valor mínimo: '.$producto->stock_min.' unidades';
					} elseif ($producto->stock == 0) {
						echo 'No hay unidades disponibles';
					}else {
						echo 'Disponible: '.$producto->stock.' unidades';
					} ?>
				</p>
				<p>
					<?php if (($producto->stock > 0) && ($session_data = $this->session->userdata('logged_in'))) {
						echo form_open('carrito_agrega');
						echo form_hidden('id', $producto->id_producto);
						echo form_hidden('descripcion', $producto->descripcion);
						echo form_hidden('precio_venta', $producto->precio_venta);
						echo form_hidden('stock', $producto->stock);
					?>
					<div>
						<?php $btn = array(
							'class' => 'btn btn-secondary fuenteBotones',
							'value' => 'Agregar al Carrito',
							'name' => 'action'
						);
						echo form_submit($btn);
						echo form_close();
						?>
					</div>
					<?php 
						echo "<a href='#' class='btn btn-default subtituloProd' data-toggle='modal' data-target='#catalogoModal'> </a>";
					} else {
						echo "<a href='#' class='btn btn-default subtituloProd' data-toggle='modal' data-target='#catalogoModal'></a>";
					}
					?>   
				</p>
			</div>
		<?php } ?>   
	</div>


	<!-- --------------------------------------------- CATALOGO MODAL -------------------------------------------- -->

		<div class="modal fade" id="catalogoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">

				<!-- Body Modal -->
				<div class="m-2"> 
					<?php if (!$producto) { ?>
						$imagen = $producto->imagen; ?>
							<img height="60px" width="60px" src="<?php echo base_url('assets/img/producto/'."$imagen"); ?>"/> 
					<?php } ?>
					<p class="medidas">
						Nota:<br>
						<h6 class="catal"> 
						Para ver detalles específicos de cada producto, ingresar a cada sección en particular. 
						</h6>
					</p>    	
				</div>
			</div>
			</div>
		</div>
	<!-- --------------------------------------------- FIN CATALOGO MODAL -------------------------------------------- -->
</body>