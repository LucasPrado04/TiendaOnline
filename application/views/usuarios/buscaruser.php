<?php if (!$usuarios) { ?>
  <div class="container_user">
    <div class="titulo_user">
      <h1>RESULTADO DE BUSQUEDA</h1>
    </div>	
    
    <?php if( ($this->session->userdata('logged_in')) and ($perfil_id == '1') ) { ?>
      <div class="containers_users">
        <div class="all-filters_user">
          <div class="nav-add_user">
              <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  USUARIOS
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="<?php echo base_url('usuarios'); ?>">Todos los Usuarios</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('usuariosadmin');?>">Administradores</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('usuariosclient');?>">Clientes</a></li>
                </ul>
              </div>
          </div>
          <div class="formulario_user">
              <form action="<?php echo base_url('buscaruser'); ?>" method="GET" style="">
                <input class="busqueda_s" style="width: 80%; height: 37px;" type="search" placeholder="Buscar producto" name="query">
                <button class="btn btn-outline-info">Buscar</button>
              </form>
          </div>

          <div class="ex-user">
            <a type="button" class="btn btn-danger button-eliminar" href="<?php echo base_url('usuarios_eliminados'); ?>">
              <i class="fas fa-times"></i> 
              Mostrar Eliminados
            </a> 
          </div>
        </div>
      </div> 
      <div class="no_users"> 
        <h1>La busqueda no encontró usuarios relacionados</h1>
      </div>
    <?php } ?>  
  </div>
<?php } else { ?>
  <div class="container_user">
      <div class="titulo_user">
        <h1>RESULTADOS DE LA BUSQUEDA</h1>
      </div>	
      <div class="all-filters_user">
        <div class="nav-add_user">
            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Todos los usuarios
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="<?php echo base_url('usuarios'); ?>">Todos los Usuarios</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url('usuariosadmin');?>">Administradores</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url('usuariosclient');?>">Clientes</a></li>
              </ul>
            </div>
        </div>
        <div class="formulario_user">
            <form action="<?php echo base_url('buscaruser'); ?>" method="GET" style="">
              <input class="busqueda_s" style="width: 80%; height: 37px;" type="search" placeholder="Buscar producto" name="query">
              <button class="btn btn-outline-info">Buscar</button>
            </form>
        </div>

        <div class="ex-user" style="margin-right: 40px">
          <a type="button" class="btn btn-danger button-eliminar" href="<?php echo base_url('usuarios_eliminados'); ?>">
            <i class="fas fa-times"></i> 
            Mostrar Eliminados
          </a> 
        </div>
      </div>
  </div> 
  <div class="table-responsive">
    <table id="tablaUsuarios" class="table align-middle">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Email</th>
          <th>Usuario</th>
          <th>Tipo de Usuario</th>
          <th>Modificar</th>
        </tr>
      </thead>
      <tbody class="container-user">
        <?php foreach($usuarios as $user){ ?>
          <tr>
            <td ><?php echo $user->id;  ?></td>
            <td ><?php echo $user->nombre;  ?></td>
            <td ><?php echo $user->apellido;  ?></td>
            <td ><?php echo $user->email;  ?></td>
            <td ><?php echo $user->usuario;  ?></td>
            <?php if($user->perfil_id == '1') { ?>
              <td>Administrador</td>
            <?php }else{ ?>
              <td>Cliente</td>
            <?php } ?>
            <td>
              <a type="button" class="btn btn-danger" href="<?php echo base_url("usuarios_baja/$user->id");?>">
                <i class="fas fa-trash"></i> Dar de Baja
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
<?php } ?>