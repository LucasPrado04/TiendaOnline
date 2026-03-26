<body>
    <h1 id="detailh1">Detalles</h1>
    <section class="container" id="detaller">
        <div class="contenedor_detail">
            <h1 >Información de envío</h1>
            <p><strong>A nombre de:</strong> <?php echo $venta_detalles->row()->name; ?></p>
            <p><strong>Dirección de envío:</strong> <?php echo $venta_detalles->row()->direc; ?></p>
            <p><strong>Telefono:</strong> <?php echo $venta_detalles->row()->tel; ?></p>
            <p><strong>Fecha:</strong> <?php echo $venta_detalles->row()->fecha; ?></p>
       </div>
       <div class="cont_prods">
            <h1>Detalles de los productos</h1>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($venta_detalles->result() as $detalle) { ?>
                        <tr>
                            <td><?php echo $detalle->descripcion; ?></td>
                            <td><?php echo $detalle->cantidad; ?></td>
                            <td>$<?php echo number_format($detalle->precio, 2); ?></td>
                            <td>$<?php echo number_format($detalle->cantidad * $detalle->precio, 2); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <h2>Total de la Compra: $<?php echo $venta_detalles->row()->total_venta; ?></h2>
        </div>
    </section>
    <div class="btn-container" style="margin-bottom: 20px;">
        <a type="button" class="btn btn-primary" href="<?php echo base_url("principal");?>">Volver al inicio</a>
        <a type="button" class="btn btn-primary" href="<?php echo base_url("catalogo");?>">Volver al catalogo</a>
        <a type="button" class="btn btn-primary" href="<?php echo base_url("historia_de_compras");?>">Ver en historial</a>
    </div>
    <script src="<?php echo base_url('assets/js/funciones.js'); ?>"></script>
</body>