<!DOCTYPE html>
<html>
<head>
    <title>Modificar Perfil</title>
    <style>
        input[type="text"], input[type="email"], input[type="password"] {
            padding-left: 10px;
            background-color: #fff;
            color: #000;
            border: 1px solid #ccc;
        }
        .formuperfil p {
            color: #704214;
        }

        .btnperfil .btnguardar {
            background-color: rgb(136, 236, 140);
            color: rgb(17, 85, 19);
            border: 2px solid rgb(17, 85, 19);
            margin-top: 15px;
            padding-bottom: 0px;
        }
    </style>
</head>
<body>
    <section class="cont-perfil"> 
        <h1>MI PERFIL</h1>
    </section>
    <section>
        <div class="profile">
        <?php echo form_open_multipart("actualizarperfil", ['class' => 'form-signin', 'role' => 'form']); ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo form_label('Nombre:', 'nombre'); ?>
                        <?php echo form_input(['name' => 'nombre', 
                                                'id' => 'nombre', 
                                                'class' => 'form-control',
                                                'placeholder' => 'Nombre', 
                                                'value'=>"$nombre"]); ?>
                        <?php echo form_error('nombre'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo form_label('Apellido:', 'apellido'); ?>
                        <?php echo form_input(['name' => 'apellido', 
                                                'id' => 'apellido', 
                                                'class' => 'form-control',
                                                'placeholder' => 'Apellido', 
                                                'value'=>"$apellido"]); ?>
                        <?php echo form_error('apellido'); ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?php echo form_label('Email:', 'email'); ?>
                        <?php echo form_input(['name' => 'email', 
                                                'id' => 'email', 
                                                'class' => 'form-control',
                                                'placeholder' => 'Email', 
                                                'value'=>"$email"]); ?>
                        <?php echo form_error('email'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo form_label('Contraseña:', 'pass'); ?>
                        <?php echo form_input(['name' => 'pass', 
                                                'id' => 'pass', 
                                                'class' => 'form-control',
                                                'placeholder' => 'Contraseña',
                                                'value'=>"$pass"]); ?>
                        <?php echo form_error('pass'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php echo form_submit('modificar', 'Modificar', "class='btn btn-lg btn-dark btn-block'"); ?>
                </div>
                <div class="col-md-6">
                    <a href="<?php echo base_url('mostrarperfil2'); ?>"><button type="button" class="btn btn-lg btn-primary btn-block">Cancelar</button></a>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </section>
</body>
</html>
