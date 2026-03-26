<?php if (!$usuarios) { ?>
  <div class="container_user">
    <div class="titulo_user">
      <h1>RESULTADO DE BUSQUEDA</h1>
    </div>	

    <?php if( ($this->session->userdata('logged_in')) and ($perfil_id == '1') ) { ?>
      <div class="containers_users">
        <div class="all-filters_user">
          <div class="nav-add_user">
              <div class="dropdown dropz">
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
        <h1>No hay Usuarios Registrados</h1>
      </div>
    <?php } ?>  
  </div>
<?php } else { ?>
  <div class="container_user">
      <div class="titulo_user">
        <h1>USUARIOS</h1>
      </div>	
      <div class="all-filters_user">
        <div class="nav-add_user">
            <div class="dropdown dropz">
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

        <div class="ex-user">
          <a type="button" class="btn btn-danger button-eliminar" href="<?php echo base_url('usuarios_eliminados'); ?>">
            <i class="fas fa-times"></i> 
            Mostrar Eliminados
          </a> 
        </div>
      </div>
  </div> 
  <div class="table-responsive">
    <table id="tablaUsuarios2" class="table align-middle">
      <thead>
        <tr>
          <th class="idrowhead">ID</th>
          <th class="nombrerowhead">Nombre</th>
          <th class="apellidorowhead">Apellido</th>
          <th class="emailrowhead">Email</th>
          <th>Usuario</th>
          <th>Tipo de Usuario</th>
          <th>Modificar</th>
        </tr>
      </thead>
      <tbody class="container-user">
        <?php foreach($usuarios->result() as $row){ ?>
          <tr>
            <td class="idrow"><?php echo $row->id;  ?></td>
            <td class="nombrerowhead"><?php echo $row->nombre;  ?></td>
            <td class="apellidorowhead"><?php echo $row->apellido;  ?></td>
            <td class="emailrow"><?php echo $row->email;  ?></td>
            <td ><?php echo $row->usuario;  ?></td>
            <?php if($row->perfil_id == '1') { ?>
              <td>Administrador</td>
            <?php }else{ ?>
              <td>Cliente</td>
            <?php } ?>
            <td>
              <a type="button" class="btn btn-danger" href="<?php echo base_url("usuarios_baja/$row->id");?>">
                <i class="fas fa-trash"></i> Dar de Baja
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
<?php } ?>