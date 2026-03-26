<!-- catalogo_fernet.php -->
<body>
    <div class="well-fernet">
        <h1>FERNET</h1>
    </div>
    <div class="formbusqueda">
        <form id="form" method="GET" action="<?php echo base_url('buscarcat') ?>">
            <input type="text" id="query" name="query" placeholder="Buscar producto">
            <input type="submit" id="buscar" value="Buscar">
        </form>
    </div>
    <div class="filter-buttons">
        <div class="dropdown">
               <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  Fernet
               </a>
               <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" href="<?php echo base_url('catalogo');?>">Todos los productos</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('filtro_gancia');?>">Gancia</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('filtro_vodka');?>">Vodka</a></li>
                  <li><a class="dropdown-item" href="<?php echo base_url('filtro_vino');?>">Vino</a></li>
               </ul> 
            </div>
    </div>

    <div class="container-card">
        <?php if (!empty($productos)) { ?>
            <?php foreach ($productos->result() as $row) { 
                $imagen = $row->imagen;
            ?>
                <div class="tarjetita">
                    <img src="<?php echo base_url($imagen); ?>" alt="<?php echo $row->descripcion; ?>"/>
                    <h4 class="subtitulo"><?php echo trim($row->descripcion); ?></h4>
                    <p class="subtitulo">Precio: $<?php echo $row->precio_venta; ?></p>
                    <p class="subtitulo">
                        <?php if ($row->stock == 0) {
                            echo '<span class="badge bg-danger">Sin Stock</span>';
                        } elseif ($row->stock_min >= $row->stock) {
                            echo '<span class="badge bg-warning">Últimas unidades</span>';
                        } else {
                            echo '<span class="badge bg-success">Hay Stock</span>';
                        } ?>
                    </p>
                    <p class="subtitulo">
                        <?php if ($row->stock < $row->stock_min && $row->stock > 0) {
                            echo 'Por debajo del valor mínimo: ' . $row->stock_min . ' unidades';
                        } elseif ($row->stock == 0) {
                            echo 'No hay unidades disponibles';
                        } else {
                            echo 'Disponible: ' . $row->stock . ' unidades';
                        } ?>
                    </p>
                    <p>
                        <?php if (($session_data = $this->session->userdata('logged_in')) && $session_data['perfil_id'] == 1) { // Modo administrador
                            echo form_open('productos');
                            echo form_hidden('id', $row->id_producto);
                        ?>
                            <div>
                                <?php $btn = array(
                                    'class' => 'btn btn-s btn-primary fuenteBotones',
                                    'value' => 'Editar Producto',
                                    'name' => 'action'
                                );
                                echo form_submit($btn);
                                echo form_close();
                                ?>
                            </div>
                        <?php } elseif ($row->stock > 0) { // Usuarios normales
                            echo form_open('carrito_agrega');
                            echo form_hidden('id', $row->id_producto);
                            echo form_hidden('descripcion', $row->descripcion);
                            echo form_hidden('precio_venta', $row->precio_venta);
                            echo form_hidden('stock', $row->stock);
                        ?>
                            <div>
                                <?php $btn = array(
                                    'class' => 'btn btn-s btn-secondary fuenteBotones',
                                    'value' => 'Agregar al Carrito',
                                    'name' => 'action'
                                );
                                echo form_submit($btn);
                                echo form_close();
                                ?>
                            </div>
                        <?php } else { // No hay stock
                            echo "<a href='#' class='btn btn-s btn-default subtituloProd' data-toggle='modal' data-target='#catalogoModal'></a>";
                        } ?>   
                    </p>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>No se encontraron productos fernet.</p>
        <?php } ?>   
    </div>
</body>

