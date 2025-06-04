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

        .btnperfil .btnguardar{
            background-color:rgb(136, 236, 140);
            color: rgb(17, 85, 19);
            border: 2px solid rgb(17, 85, 19);
            margin-top: 15px;
            padding-bottom: 0px;
        }
    </style>
</head>
<body>
    <section class="cont-perfil"> 
        <h1>Modificar Perfil</h1>
    </section>
    <section>
        <div class="profile">
            <div style="margin-left: 10%; margin-right: 10%; padding-top: 15px; border_radius: 14px;">
                <?php if (validation_errors()) : ?>
                  <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                  </div>
                <?php endif; ?>
            </div>
            <?php if (isset($id) && isset($nombre) && isset($apellido) && isset($email)) { ?>
                <form action="<?php echo base_url('actualizarperfil'); ?>" method="post" class="formuperfil" style="padding-bottom: 5px;">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <p>Nombre</p>
                    <input type="text" name="nombre" value="<?php echo $nombre; ?>">
                    <p>Apellido</p>
                    <input type="text" name="apellido" value="<?php echo $apellido; ?>">
                    <p>Email</p>
                    <input type="email" name="email" value="<?php echo $email; ?>">
                    <p>Contraseña</p>
                    <input type="password" name="pass" value="<?php echo $pass; ?>">
                    <div class="btnperfil">
                        <button type="submit" class="btnguardar"><box-icon type="solid" name="save"></box-icon>Guardar cambios</button>
                        <button type="button" onclick="location.href='<?php echo base_url('mostrarperfil2'); ?>'">Cancelar</button>
                    </div>
                </form>
            <?php } else { ?>
                <p>Datos del usuario no disponibles.</p>
            <?php } ?>
        </div>
    </section>
</body>
</html>
