<body class="contacto">
    <section class="p_form">
        <div class="redes_s">
            <h1>REDES SOCIALES</h1>
        </div>
    </section>
    <section class="aviso1">
        <div class="redes">
            <h2><img src="assets/img/icons/meta-bco.png" alt=""> AsDrinksRestobar</h2>
            <h2><img src="assets/img/icons/ig-bco.png" alt=""> AsDrinks</h2>
            <h2><img src="assets/img/icons/wpp-bco.png" alt=""> 379-4841506</h2>
            <h2><img src="assets/img/icons/correo-bco.png" alt=""> asdrinks@gmail.com</h2>
            <h2><img src="assets/img/icons/gh-bco.png" alt=""> LucasPrado04</h2>
            <h2><img src="assets/img/icons/x-bco.png" alt=""> @asdrinksrestobar</h2>
        </div>
    </section>
    <section class="p_form">
        <div>
            <h1>COMPLETE EL FORMULARIO CON SUS DATOS</h1>
        </div>
    </section>
    <section class="p_form1">
        <div>
            <p>Nos pondremos en contacto con vos</p>
        </div>
    </section>
        <div class="contpadre">
        <?php if (validation_errors()) : ?>
          <div class="alert alert-danger" style="margin: 0 10% 15px 10%;" >
            <?php echo validation_errors(); ?>
          </div>
        <?php endif; ?>
            <div class="container_consultas-form cursiva">
                <?php echo form_open('consultas_controller', ['class' => 'form-group', 'role' => 'form', 'id' => 'form_registro']); ?>
                <fieldset>
                    <div class="group-all">
                        <div class="form-group">
                            <label class="control-label">Nombre</label>
                            <div>
                                <?php echo form_input([
                                    'name' => 'nombre',
                                    'id' => 'nombre',
                                    'class' => 'form-control fuentePlaceholder',
                                    'placeholder' => 'Nombre',
                                    'required' => 'required',
                                    'autofocus' => 'autofocus'
                                ]); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email:</label>
                            <div>
                                <?php echo form_input([
                                    'type' => 'email',
                                    'name' => 'email',
                                    'id' => 'email',
                                    'class' => 'form-control fuentePlaceholder',
                                    'placeholder' => 'Email',
                                    'required' => 'required',
                                    'value' => set_value('email')
                                ]); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Teléfono</label>
                            <div>
                                <?php echo form_input([
                                    'name' => 'numero',
                                    'id' => 'numero',
                                    'class' => 'form-control fuentePlaceholder',
                                    'placeholder' => 'Número',
                                    'required' => 'required'
                                ]); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mensaje</label>
                            <div>
                                <?php echo form_textarea([
                                    'name' => 'mensaje',
                                    'id' => 'mensaje',
                                    'class' => 'form-control fuentePlaceholder',
                                    'placeholder' => 'Mensaje',
                                    'required' => 'required'
                                ]); ?>
                            </div>
                        </div>
                        <div class="formulariocons">
                            <?php echo form_submit('submit', 'Enviar', "class='btn btn-input btn-dark'"); ?>
                            <br><br>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>    
</body>

