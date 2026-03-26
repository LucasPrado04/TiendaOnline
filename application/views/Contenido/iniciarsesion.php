<body class="loginin">
	<section class="secs">
		<div class="conteiner__iniciarsesion wrapper">
			<div class ="conteiner__iniciarsesion-info ">
				<h2 class="conteiner__iniciarsesion-titulo">INICIAR SESIÓN</h2>
				<div class="conteiner__iniciarsesion-errores" style="margin-left: 80px;">
					<?php echo validation_errors(); ?>
				</div>
			</div>  
				
			<!-- Formulario de Login -->
			<div class="conteiner__iniciarsesion-form">
				<?php echo form_open('verifico_usuario',['class' => 'form-signin', 'role' => 'form']); ?>
					<form class ="row input-box">
						<div class ="contenido input-box">
							<h5>Usuario</h5>
							<?php echo form_input(['name' => 'usuario', 
												'id' => 'usuario', 
												'class' => 'form-control fuentePlaceholder',
												'placeholder' => 'Usuario', 
												'required'=>'required',
												'autofocus'=>'autofocus']); ?>
						</div>

						<div class="contenido input-box input-box2">
							<h5>Contraseña</h5>
							<?php echo form_password(['type' => 'password',
													'name' => 'pass', 
													'id' => 'pass', 
													'class' => 'form-control fuentePlaceholder',
													'placeholder' => 'Contraseña', 
													'required'=>'required']); ?>
						</div>
						<div class="conteiner__iniciarsesion-boton" style="margin-left: 20px;">  
							<button style=" background-color:transparent; border:transparent; margin-top: 15px; padding-right: 25px; width: 190px; padding-left: 0px" class="botton1"><?php echo form_submit('submit', '     Ingresar      ',"class='btn btn-primary fuenteBotones'"); ?>  </button> 
							<button style=" background-color:transparent; border: 0px transparent;  margin-bottom: 20px;" class="botton2"> <?php echo form_reset ('reset', '    Cancelar      ', "class='btn btn-primary fuenteBotones'"); ?> </button>
						</div>
					</form>
					<p>¿Todavía no Tienes una Cuenta? <a href="<?php echo base_url('crearcuenta'); ?>">¡Haz click aquí</a> para crear una!</p>
				</div>
			</div>
	</section>
</body>
