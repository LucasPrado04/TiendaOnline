<div class="containers">
	<div class="titulo-modif">
		<h1>Cargar nuevo producto</h1>
	</div>
	<div class="">
		<div class="">
			<?php echo validation_errors(); ?> 
			<!-- Genero el formulario para cargar un producto -->
			<?php echo form_open_multipart('verifico_nuevoproducto', ['class' => 'form-group', 'role' => 'form', 'id' => 'form_registro']); ?>
			<div class="form-all">
				<div class="form-img">
					<fieldset class="fm">
						<div class="">
							<label class="">Descripción</label>
							<div class="">
								<?php echo form_input(['name' => 'descripcion', 
														'id' => 'descripcion', 
														'class' => 'form-control',
														'placeholder' => 'Descripcion', 
														'autofocus'=>'autofocus',
														'value'=>set_value('descripcion')]); ?>
							</div>
						</div>

						<div class="">
							<label class="">Categoría</label>
							<div class="">
								<?php
								$options = array(
									'1' => 'Fernet',
									'2' => 'Gancia',
									'3' => 'Vodka',
									'4' => 'Vino'
								);
								echo form_dropdown('id_categoria', $options, set_value('id_categoria'), 'class="form-control" id="id_categoria"');
								?>
							</div>
						</div>

						<div class="">
							<label class="">Precio Venta</label>
							<div class="">
								<?php echo form_input(['name' => 'precio_venta', 
														'id' => 'precio_venta', 
														'type' => 'number',
														'class' => 'form-control',
														'placeholder' => 'Precio para la Venta', 
														'value'=>set_value('precio_venta')]); ?>
							</div>
						</div>
						
						<div class="">
							<label class="">Stock</label>
							<div class="">
								<?php echo form_input(['name' => 'stock', 
														'id' => 'stock', 
														'type' => 'number',
														'class' => 'form-control',
														'placeholder' => 'Stock',
														'value'=>set_value('stock')]); ?>
							</div>
						</div>

						<div class="">
							<label class="">Stock Minimo</label>
							<div class="">
								<?php echo form_input(['name' => 'stock_min', 
														'id' => 'stock_min', 
														'type' => 'number',
														'class' => 'form-control',
														'placeholder' => 'Stock Minimo',
														'value'=>set_value('stock_min')]); ?>
							</div>
						</div>

						<div class="">
							<label class="">Imagen</label>
							<div class="">
								<?php echo form_input(['type' => 'file',
														'name' => 'filename', 
														'id' => 'filename', 
														'class' => 'form-control']); ?> 
								<div>
									<h6> <b>Acepta imagenes gif, jpg, jpeg, png</b></h6>
									<h6> <b>Tamaño maximo de la imagen 2MB</b></h6>	
								</div>
							</div>
						</div>

						<div class="btns">
							<?php echo form_submit('submit', 'Cargar',"class='btn btn-lg btn-success '"); ?> 
							<a href="<?php echo base_url('productos');?>"><button type="button" class="btn btn-lg btn-danger" style="margin-left: 20px">Cancelar</button></a>	
						</div>
						<?php echo form_close(); ?>
					</fieldset>	
				</div>
			</div>
		</div>
	</div>
</div>    
