<?php 
$session_data = $this->session->userdata('logged_in');
$data['usuario'] = $session_data['usuario'];
$venta = TRUE;  // Inicializado a TRUE por defecto para mostrar las ventas
?>


<div class="containers">
    <div class="titulo-modif">
        <h1>Historial de Ventas</h1>
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
                        <th>Telefono</th>                
                        <th class="apellidorowhead">Total</th>
                        <th>Ampliar</th>
                    </tr>
                </thead>
                <tbody class="container-table"> 
                    <?php foreach($combined_results as $row) { ?>
                        <tr>
                            <td><?php echo $row->fecha; ?></td>
                            <td class="nombrerow"><?php echo $row->usuario; ?></td>
                            <td ><?php echo $row->direc; ?></td>
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
