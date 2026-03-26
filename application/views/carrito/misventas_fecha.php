<?php 
$session_data = $this->session->userdata('logged_in');
$data['usuario'] = $session_data['usuario'];
$venta = !empty($combined_results); // Verificar si hay ventas
?>

<div class="containers">
    <div class="titulo-modif">
        <h1>Historial de Ventas</h1>
    </div>    
    <div style="margin-top:15px; margin-left: 25px;">
        <form novalidate action="<?php echo base_url('buscar_ventas_por_fecha'); ?>" method="POST">
            <label for="fecha_inicio">Fecha de inicio:</label>
            <input type="date" name="fecha_inicio" required>
            <label for="fecha_fin">Fecha de fin:</label>
            <input type="date" name="fecha_fin" required>
            <button type="submit">Buscar</button>
        </form>
    </div>   
    <div class="table-responsive">
        <?php if (!$venta) { ?>
            <div class="well-h2">
                <h2>No hay ventas</h2>
            </div>
        <?php } else { ?>
            <table id="tablaUsuarios2" class="table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th class="nombrerowhead">Nombre</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>                
                        <th class="apellidorowhead">Total</th>
                        <th>Ampliar</th>
                    </tr>
                </thead>
                <tbody class="container-table"> 
                    <?php foreach ($combined_results as $row) { ?>
                        <tr>
                            <td><?php echo $row->fecha; ?></td>
                            <td class="nombrerow"><?php echo $row->name; ?></td>
                            <td><?php echo $row->direc; ?></td>
                            <td><?php echo $row->tel; ?></td>
                            <td class="apellidorowhead"><?php echo $row->total; ?></td>
                            <td>
                                <a type="button" class="btn btn-primary btn_edit" 
                                    href="<?php echo base_url("detalle_venta/". $row->id);?>"> 
                                    <i>Ampliar</i>
                                </a> 
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>    
        <?php } ?>
    </div>        
</div>

