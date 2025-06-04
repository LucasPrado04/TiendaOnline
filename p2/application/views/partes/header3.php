<nav class ="nav_usuario" >
    <!-- -------------------------------- NAVBAR PARA ADMINISTADORES -------------------------------- -->
    <section class="seccionbarra">

      <?php if( ($this->session->userdata('logged_in')) and ($perfil_id == '1') ) { ?> 
        <div>
        <img class="img-fluid imgprincipal2" src="assets/img/barra_arrib4.png" alt="">
            <nav class="usuariovar">
                <ul class="barra_usuario" >

                <li class="nav-item dropdown" style="display: inline-block;">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff;">
                        <i class="far fa-user"></i> <?= $nombre ?>
                     </a>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li style="display: inline-block;">
                      <a class="dropdown-item"" href="<?php echo base_url('ventas_resumen');?>">
                        <i class="fas fa-cart-arrow-down"></i> Ventas
                      </a>  
                    </li>

                    <li style="display: inline-block;">
                      <a class="dropdown-item"" href="<?php echo base_url('productos');?>">
                        <i class="fas fa-cubes"></i> Productos
                      </a>  
                    </li>

                    <li style="display: inline-block;">
                      <a class="dropdown-item"" href="<?php echo base_url('usuarios');?>">
                        <i class="fas fa-users"></i> Usuarios
                      </a>  
                    </li>

                      <li>
                         <a class="dropdown-item" href="<?php echo base_url('logout');?>">
                            <i class="fas fa-sign-out-alt"></i> Salir
                         </a>
                      </li>
                  </li>
                </li>
              </ul>
            </un>
          </div>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
            <span class="navbar-toggler-icon"></span>
        </button>
        </nav>
              </section>
        
        <!-- -------------------------------- NAVBAR PARA CLIENTES -------------------------------- -->     
        

        <?php } else if( ($this->session->userdata('logged_in')) and ($perfil_id == '2') ) { ?> 
        <div>
          <div class="carrito_usuario">
              <ul style="margin-bottom: -2px;" >
                <li style="display: inline-block; ">
                  <a class="nav-link text-light pru" href="<?php echo base_url('carro');?>">
                    <i class="fas fa-cart-plus"></i> 
                    Carrito ( <?=$this->cart->total_items();?> )
                  </a>

                </li>

                <li class="nav-item dropdown barra_usuario" style="display: inline-block;">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff;">
                    <i class="far fa-user"></i> Hola, <?= $nombre ?>
                 </a>
                   <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="position: relative ; z-index: 10000;">
                    <li>
                        <a class="dropdown-item" href="<?php echo base_url('micompra');?>">
                           <i class="fas fa-shopping-bag"></i> Mis Compras
                         </a>
                    </li>

                   <li>
                       <a class="dropdown-item" href="<?php echo base_url('logout');?>">
                          <i class="fas fa-sign-out-alt"></i> Salir
                       </a>
                  </li>
              </ul>
          </div>
        </div>
        <!-- -------------------------------- NAVBAR PARA PUBLICO EN GENERAL -------------------------------- -->
              <?php } else { ?> 
                <div>
                  <img class="img-fluid imgprincipal" src="assets/img/barra_arrib4.png" alt="">
                  <div class="barra_usuario">
                <li class="nav-item dropdown " style="display: inline-block;">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff; font-size: 14px;">
                     <i class="fas fa-sign-in-alt"></i> Mi Cuenta
                 </a>
                   <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="position: relative ; z-index: 10000;">

                    <li>
                        <a class="dropdown-item" href="<?php echo base_url('crearcuenta');?>">
                           <i class="fas fa-user-plus"></i> Crear Cuenta
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="<?php echo base_url('iniciarsesion');?>">
                           <i class="fas fa-user"></i> Iniciar Sesión
                        </a>
                    </li>
                    </div>
                 </ul>
               </li>
              </div>
        <?php } ?>
