<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sitio</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }
        .navigation, .nav-bar, .nav_usuario, .barra_arriba, .carrito_usuario, .carrito_user, .dropdown-menu {
            margin: 0;
            padding: 0;
            list-style-type: none;

        }

        .nav_usuario{
            display: flex;
            justify-content: flex-end;
            padding-right: 20px;
        }
        .nav-link, .dropdown-item {
            display: block;
        }
        .nav-bar input[type="checkbox"] {
            display: none;
        }
    </style>
</head>
<body>
<nav class="nav_usuario">
    <!-- -------------------------------- NAVBAR PARA ADMINISTADORES -------------------------------- -->
    <section class="seccionbarra">
    <?php if (($this->session->userdata('logged_in')) and ($perfil_id == '1')) { ?>   
        <div>
            <div >
                <ul class="navbar-nav">
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i></i> Hola, <?php echo $nombre ?>
                        </a>
                        <ul class="dropdown-menu menuimgs" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?php echo base_url('historia_de_ventas'); ?>"><i class="sellimg"><img src="<?php echo base_url('assets/img/icons/sell.png');?>" alt="">Ventas</i></a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('productos'); ?>"><i class="productimg"><img src="<?php echo base_url('assets/img/icons/products.png');?>" alt="">Productos</i></a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('usuarios'); ?>"><i class="userimg"><img src="<?php echo base_url('assets/img/icons/useric.png');?>" alt="">Usuarios</i></a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('ver_consultas'); ?>"><i class="consultimg"><img src="<?php echo base_url('assets/img/icons/quest.png');?>" alt="">Consultas</i></a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('logout'); ?>"><i class="logoutimg"><img src=<?php echo base_url('assets/img/icons/logout.png');?> alt="">Salir</i></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    <?php } ?>
</section>
        
    <!-- -------------------------------- NAVBAR PARA CLIENTES -------------------------------- -->     
    <?php if (($this->session->userdata('logged_in')) and ($perfil_id == '2')) { ?> 
        <div class="barra_arriba">
            <div class="carrito_usuario" id="navbarNavDropdown">
                <ul class="carrito_user">
                    <li class="dropdown tuname">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i></i> Hola, <?php echo $nombre ?>
                        </a>
                        <ul class="dropdown-menu menuimgs" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?php echo base_url('historia_de_compras'); ?>"><i class="sellimg"><img src="assets/img/icons/sell.png" alt="">Mis compras</i></a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('mostrarperfil2'); ?>"><i class="sellimg"><img src="assets/img/icons/sell.png" alt="">Mi perfil</i></a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('logout'); ?>"><i class="productimg"><img src="assets/img/icons/logout.png" alt="">Salir</i></a></li>
                        </ul>
                    </li>
                    <li class="carro">
                        <a class="nav-link" href="<?php echo base_url('carro'); ?>">
                            <i class="buyimg"></i><img src="assets/img/icons/cartsum.png" alt=""> 
                            Carrito ( <?= $this->cart->total_items(); ?> )
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    <?php } ?>
        
    <!-- -------------------------------- NAVBAR PARA PUBLICO EN GENERAL -------------------------------- -->
    <?php if (!$this->session->userdata('logged_in')) { ?> 
        <div class="barra_arriba">
            <div class="carrito_usuario" id="navbarNavDropdown">
                <ul class="carrito_user">
                    <li class="dropdown tuname">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i></i> Inicio de sesión
                        </a>
                        <ul class="dropdown-menu menuimgs" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?php echo base_url('crearcuenta'); ?>"><i class="sellimg"><img src="assets/img/icons/signin.png" alt="">Crear Cuenta</i></a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('iniciarsesion'); ?>"><i class="productimg"><img src="assets/img/icons/login.png" alt="">Iniciar Sesión</i></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    <?php } ?>
</nav>
</body>
</html>
