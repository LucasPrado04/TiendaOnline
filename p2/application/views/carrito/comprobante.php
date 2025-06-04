    <script>
        function redireccionar($venta_id) {
            window.location.href = '<?php echo base_url("guardar_com/". $venta_id); ?>';
        }
    </script>
</head>
<body>
    <h1 id="detailh1s">Comprobante de Compra</h1>
    <section class="backcomprobante">
        <div class="cont_prodss">
            <h2>Detalles del Usuario</h2>
            <p>Nombre: <?php echo $venta_detalles->row()->name; ?></p>
            <p>Teléfono: <?php echo $venta_detalles->row()->tel; ?></p>
            <p>Dirección: <?php echo $venta_detalles->row()->direc; ?></p>
            <p>Fecha: <?php echo $venta_detalles->row()->fecha; ?></p>
        </div>
        <div class="cont_prodss">
            <h2>Detalles de la Compra</h2>
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
    <div class="button-container">
    <a type="button" class="btn btn-primary" href="<?php echo base_url("principal");?>">Volver al inicio</a>
    <a type="button" class="btn btn-primary" href="<?php echo base_url("catalogo");?>">Volver al catalogo</a>
    <a type="button" class="btn btn-primary" href="<?php echo base_url("historia_de_compras");?>">Ver en historial</a>
    </div>
    <script src="<?php echo base_url('assets/js/funciones.js'); ?>"></script>
</body>
</html>
