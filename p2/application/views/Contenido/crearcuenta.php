<body class="loginin">

  <section class="sec">
    <section class="sections">
      <div class="conteiner__crearCuenta-errores" style="margin-left: 10%;">
        <?php if (validation_errors()) : ?>
          <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
          </div>
        <?php endif; ?>
      </div>
    </section>
    <section class="sector">
      <div class="conteiner__crearCuenta wrapper">
        <div class="">
          <h2 class="">Crear Cuenta</h2>
          <p>Comprá más rápido y llevá el control de tus pedidos.</p>

          <!-- Mostrar mensaje de error único arriba del formulario -->

        </div>

        <!-- Formulario -->
        <div class="">
          <?php echo form_open('verifico_nuevoregistro', ['class' => 'form-group', 'role' => 'form', 'id' => 'form_registro']); ?>

          <form class="formulariosignin">
            <div class="dxd">
              <h5>Nombre:</h5>
                <?php echo form_input(['name' => 'nombre', 
                                        'id' => 'nombre', 
                                        'class' => 'form-control fuentePlaceholder',
                                        'placeholder' => 'Nombre', 
                                        'required' => 'required', 
                                        'autofocus' => 'autofocus',
                                        'value' => set_value('nombre')]); ?>
            </div>

            <div class="dxd">
              <h5>Apellido:</h5>
                <?php echo form_input(['name' => 'apellido', 
                                        'id' => 'apellido', 
                                        'class' => 'form-control fuentePlaceholder',
                                        'placeholder' => 'Apellido', 
                                        'required' => 'required',
                                        'value' => set_value('apellido')]); ?>
            </div>

            <div class="dxd">
              <h5>E-mail:</h5>
                <?php echo form_input(['type' => 'email', 
                                        'name' => 'email', 
                                        'id' => 'email', 
                                        'class' => 'form-control fuentePlaceholder',
                                        'placeholder' => 'Email@gmail.com', 
                                        'required' => 'required',
                                        'value' => set_value('email')]); ?>
            </div>

            <div class="dxd">
              <h5>Nombre de Usuario:</h5>
                <?php echo form_input(['name' => 'usuario', 
                                        'id' => 'usuario', 
                                        'class' => 'form-control fuentePlaceholder',
                                        'placeholder' => 'Usuario', 
                                        'required' => 'required',
                                        'value' => set_value('usuario')]); ?>
            </div>

            <div class="dxd">
              <h5>Contraseña:</h5>
                <?php echo form_password(['name' => 'pass', 
                                          'id' => 'pass', 
                                          'class' => 'form-control fuentePlaceholder',
                                          'placeholder' => 'Contraseña', 
                                          'required' => 'required']); ?>
            </div>

            <div class="dxd">
              <h5>Repetir Contraseña:</h5>
                <?php echo form_password(['name' => 're_pass', 
                                          'id' => 're_pass', 
                                          'class' => 'form-control fuentePlaceholder',
                                          'placeholder' => 'Repetir Contraseña', 
                                          'required' => 'required']); ?>
            </div>

            <div class="conteiner__crearCuenta-butto" style="margin-left: 0px;">
              <button style="background-color:transparent; border:transparent; margin-top: 15px; width: 423px; padding-left: 0px"><?php echo form_submit('submit', 'Crear', "class='btn btn-primary fuenteBotones'"); ?></button>
              <button style="background-color: red; margin-top: 10px;" class="botton2 btn fuenteBotones" onclick="window.location.href='<?php echo base_url('iniciarsesion'); ?>'">Cancelar</button>
            </div>

            <?php echo form_close(); ?>
          </form>
        </div>
      </div>
    </section>
  </section>
</body>
