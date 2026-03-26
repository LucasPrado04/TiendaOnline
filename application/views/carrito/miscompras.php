<?php 
$session_data = $this->session->userdata('logged_in');
$data['usuario'] = $session_data['usuario'];
$compra = FALSE; 
?>

<?php foreach($combined_results as $row) { 
    if($data['usuario'] == $row->usuario) { 
        $compra = TRUE; 
    }
} ?>

<?php if (!$compra) { ?>
    <div class="containers">
        <div class="titulo-modif">
            <h1>RESULTADO DE LA BUSQUEDA</h1>
        </div>    
    </div>
        <div style="margin-top:15px; margin-left: 25px;">
            <form action="<?php echo base_url('buscar_compras_por_fecha'); ?>" method="POST">
                <label for="fecha_inicio">Fecha de inicio:</label>
                <input type="date" name="fecha_inicio" required>
                <label for="fecha_fin">Fecha de fin:</label>
                <input type="date" name="fecha_fin" required>
                <button type="submit">Buscar</button>
            </form>
        </div>
        <div class="well-h2">
            <h2>No hay resultados encontrados...</h2>
        </div>
<?php } else { ?>
    <div class="containers">
        <div class="titulo-modif">
            <h1>TODAS LAS COMPRAS</h1>
        </div>     
        <div>
            <form novalidate action="<?php echo base_url('buscar_compras_por_fecha'); ?>" method="POST">
                <label for="fecha_inicio">Fecha de inicio:</label>
                <input type="date" name="fecha_inicio" required>
                <label for="fecha_fin">Fecha de fin:</label>
                <input type="date" name="fecha_fin" required>
                <button type="submit">Buscar</button>
            </form>
        </div>
        <div class="table-responsive">
            <table id="tablaUsuarios2" class="table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th class="nombrerowhead">Nombre</th>
                        <th>Dirección</th>
                        <th>Telefono</th>                
                        <th class="apellidorowhead">Total</th>
                        <th>Ampliar</th>
                    </tr>
                </thead>
                <tbody class="container-table"> 
                    <?php foreach($combined_results as $row) { ?>
                        <?php if($data['usuario'] == $row->usuario) { ?>    
                            <tr>
                                <td><?php echo $row->fecha; ?></td>
                                <td class="nombrerow"><?php echo $row->name; ?></td>
                                <td ><?php echo $row->direc; ?></td>
                                <td><?php echo $row->tel; ?></td>
                                <td class="apellidorowhead"><?php echo $row->total; ?></td>
                                <td>
                                    <a type="button" class="btn btn-primary btn_edit" 
                                        href="<?php echo base_url("detalle/". $row->id);?>"> 
                                        <i>Ampliar</i>
                                    </a> 
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </tbody>
            </table>    
        </div>        
    </div>
<?php } ?>
