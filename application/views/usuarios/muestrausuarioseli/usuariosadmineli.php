<?php if (!$usuarios) { ?>
  <div class="container">
    <div class="well">
      <h1 style="text-align: center; margin-bottom: 20px;">No hay Usuarios Dados de Baja</h1>
    </div>
    <?php if( ($this->session->userdata('logged_in')) and ($perfil_id == '1') ) { ?>
      <div class="container_user">
        <div class="titulo_user">
          <h1>USUARIOS</h1>
        </div>	
        <div class="all-filters_user">
          <div class="nav-add_user">
              <div class="dropdown">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  Todos los usuarios
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="<?php echo base_url('usuarios_eliminados'); ?>">Todos los Usuarios</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('usuariosadmineli');?>">Administradores</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('usuariosclienteli');?>">Clientes</a></li>
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
            <a type="button" class="btn btn-success button-eliminar" href="<?php echo base_url('usuarios'); ?>">
              <i class="fas fa-times"></i> 
              Mostrar Activos
            </a> 
          </div>
        </div>
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
            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Administradores
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="<?php echo base_url('usuarios_eliminados'); ?>">Todos los Usuarios</a></li>
                <li><a class="dropdown-item" href="<?php echo base_url('usuariosclienteli');?>">Clientes</a></li>
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
          <a type="button" class="btn btn-success button-eliminar" href="<?php echo base_url('usuarios'); ?>">
            <i class="fas fa-times"></i> 
            Mostrar Activos
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
          <th>Eliminado</th>
          <th>Modificar</th>
        </tr>
      </thead>
      <tbody class="container-user">
        <?php foreach($usuarios->result() as $row){ ?>
          <tr>
            <td ><?php echo $row->id;  ?></td>
            <td ><?php echo $row->nombre;  ?></td>
            <td ><?php echo $row->apellido;  ?></td>
            <td ><?php echo $row->email;  ?></td>
            <td ><?php echo $row->usuario;  ?></td>
            <?php if($row->perfil_id == '1') { ?>
              <td>Administrador</td>
            <?php } else { ?>
              <td>Cliente</td>
            <?php } ?>
            <td ><?php echo $row->baja;  ?></td> 
            <td>
              <a type="button" class="btn btn-success" href="<?php echo base_url("usuarios_activ/$row->id");?>"><i class="fas fa-check" style=" margin-left: -10%; padding-right: 6px;"></i> 
              Activar
              </a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
<?php } ?>