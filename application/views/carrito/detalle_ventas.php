<body>
    <h1 id="detailh1">Detalles</h1>
    <section class="container" id="detaller">
        <div class="contenedor_detail">
            <h1>Detalles del Usuario</h1>
            <?php if (isset($usuario_info)): ?>
                <p><strong>Nombre:</strong> <?php echo $usuario_info->nombre; ?></p>
                <p><strong>Apellido:</strong> <?php echo $usuario_info->apellido; ?></p>
                <p><strong>Email:</strong> <?php echo $usuario_info->email; ?></p>
                <p><strong>Usuario:</strong> <?php echo $usuario_info->usuario; ?></p>
            <?php else: ?>
                <p>No se encontraron detalles del usuario.</p>
            <?php endif; ?>
        </div>
        <div class="contenedor_detail">
            <h1>Información de envío</h1>
            <p><strong>Fecha:</strong> <?php echo $venta_detalles->row()->fecha; ?></p>
            <p><strong>Nombre de:</strong> <?php echo $venta_detalles->row()->name; ?></p>
            <p><strong>Teléfono:</strong> <?php echo $venta_detalles->row()->tel; ?></p>
            <p><strong>Dirección:</strong> <?php echo $venta_detalles->row()->direc; ?></p>
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
        <a type="button" class="btn btn-primary" href="<?php echo base_url("catalogo");?>">Volver al catálogo</a>
        <a type="button" class="btn btn-primary" href="<?php echo base_url("historia_de_ventas");?>">Ver en historial</a>
    </div>
    <script src="<?php echo base_url('assets/js/funciones.js'); ?>"></script>
</body>
