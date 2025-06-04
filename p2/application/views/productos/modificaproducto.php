<body>
	<div class="containers">
			<div class="titulo-modif">
				<h1>MODIFICAR PRODUCTO</h1>
			</div>            
			<?php echo form_open_multipart("verifico_modificaproducto/$id_producto", ['class' => 'form-signin', 'role' => 'form']); ?>
			<div class="form-all">
				<div class="form-img">
					<div class="fm">
						<div class="fm">
							<label class="lbl">Descripcion del producto:</label>
							<?php echo form_input(['name' => 'descripcion', 
															'id' => 'descripcion', 
															'class' => 'form-control',
															'placeholder' => 'Descripcion', 
															'autofocus'=>'autofocus',
															'value'=>"$descripcion"]); ?>
							<?php echo form_error('descripcion'); ?>
						</div>
						<div class="lbl">
							<label class="">Precio de venta:</label>
							<?php echo form_input(['name' => 'precio_venta', 
															'id' => 'precio_venta',
															'type' => 'number',
															'class' => 'form-control',
															'placeholder' => 'Precio Venta', 
															'value'=>"$precio_venta"]); ?>
							<?php echo form_error('precio_venta'); ?>
						</div>
						<div class="">
							<label class="lbl">Categoría:</label>
							<?php
							$options = array(
								'1' => 'Fernet',
								'2' => 'Gancia',
								'3' => 'Vodka',
								'4' => 'Vino'
							);
							echo form_dropdown('id_categoria', $options, set_value('id_categoria', $id_categoria), 'class="form-control" id="id_categoria"');
							?>
							<?php echo form_error('id_categoria'); ?>
						</div>
						<div class="">
							<div class="">
								<label class="lbl">Stock actual:</label>
								<?php echo form_input(['name' => 'stock', 
														'id' => 'stock', 
														'type' => 'number',
														'class' => 'form-control',
														'placeholder' => 'Stock',
														'value'=>"$stock"]); ?>
								<?php echo form_error('stock'); ?>
							</div>
						</div>
						<div>
							<div class="">
								<label class="lbl">Stock minimo:</label>
								<?php echo form_input(['name' => 'stock_min', 
																	'id' => 'stock_min', 
																	'type' => 'number',
																	'class' => 'form-control',
																	'placeholder' => 'Stock Minimo',
																	'value'=>"$stock_min"]); ?>
									<?php echo form_error('stock_min'); ?>
								</div>
							</div>
							<div class="">
								<div class="img">
									<label class="lbl">Añadir nueva imagen:</label>
									<?php echo form_input(['type' => 'file',
																	'name' => 'filename', 
																	'id' => 'filename', 
																	'class' => 'form-control']); ?> 
									<?php echo form_error('filename'); ?>
								</div>
							</div>
						</div>
						<div class="fm-img">
							<label class="lbl" style="margin-left: 140px;">Imagen actual:</label>
							<div class="imgstill" style="margin-left: 20px">
								<img  id="imagen_view" name="imagen_view" class="img-thumbnail" src="<?php echo base_url($imagen); ?>" >
								<div class="info-img">	
									<h6><b>Acepta imagenes gif, jpg, jpeg, png</b></h6>
									<h6><b>Tamaño maximo de la imagen 2MB</b></h6>		
								</div>	
							</div>	
						</div>
					</div>
							<div class="btns">
								<?php echo form_submit('modificar', 'Modificar',"class='btn btn-lg btn-success btn-block'"); ?>
								<a href="<?php echo base_url('productos');?>" style="margin-left: 20px">
									<button type="button" class="btn btn-lg btn-danger">Cancelar</button>
								</a>
							</div>		
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
</body>