<body>
    <section class="cont-perfil"> 
        <h1>MI PERFIL</h1>
    </section>
    <section>
        <div class="profile">
        <?php 
            if (isset($nombre) && isset($apellido) && isset($email) && isset($pass)) { ?>
                <form action="" class="formuperfil">
                    <p>Nombre</p>
                    <input type="text", name="nombre", value="<?php echo $nombre; ?>", readonly>
                    <p>Apellido</p>
                    <input type="text", name="apellido", value="<?php echo $apellido; ?>", readonly>
                    <p>Email</p>
                    <input type="email", name="email", value="<?php echo $email; ?>", readonly>
                    <p>Contraseña</p>
                    <input type="password", name="pass", value="<?php echo $pass; ?>", readonly>
                </form>
                <?php }?>
        
            <div class="btnperfil">
                <button onclick="location.href='<?php echo base_url('mostrarperfil') ?>'"><box-icon  type="solid" name="edit-alt" style=""></box-icon>Editar perfil</button>
            </div>
        </div>
    </section>
</body>