<div class="contpadre">
  <div class="container_consultas-info">
	  <h2 id="idconsulta">Consultas</h2>
		  <p>Ante cualquier duda, consulta o sugerencia Contactanos! </p>

  </div>
  <div class="container_consultas-form cursiva">
      <?php echo form_open(
            'verifico_nuevaconsulta',
            ['class' => 'form-group', 'role' => 'form', 'id' => 'form_registro']
          ); ?>
          <fieldset>
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
              <label class="control-label">Telefono</label>
              <div>
                <?php echo form_input([
                  'name' => 'numero',
                  'id' => 'numero',
                  'class' => 'form-control fuentePlaceholder',
                  'placeholder' => 'Numero',
                  'required' => 'required',
                  'autofocus' => 'autofocus'
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
                  'required' => 'required',
                  'autofocus' => 'autofocus'
                ]); ?>
              </div>
            </div>
            <div class="formulariocons">
              <?php echo form_submit('submit', 'Enviar', "class='btn btn-dark' mt-3"); ?>
              <br><br>  
              <?php echo form_reset('reset', 'Cancelar', "class='btn btn-dark'"); ?>
              <?php echo form_close(); ?>
            </div>
          </fieldset>
  </div>
</div>
