<body class="consulta-body">
    <section>
    <div class="consulta-class">
        <h1>DETALLE DE LA CONSULTA</h1>
    </div>
    </section>
    <section class="consulta-detalle">
        <div class="ampliar-consulta">
            <p><strong>Nombre:</strong> <?php echo $consulta->nombre; ?></p>
            <p><strong>Email:</strong> <?php echo $consulta->email; ?></p>
            <p><strong>Teléfono:</strong> <?php echo $consulta->numero; ?></p>
            <p><strong>Mensaje:</strong> <?php echo $consulta->mensaje; ?></p>
        </div>
    </section>
    <button onclick="window.history.back();" class="btn btn-leido btn-danger" >Volver</button>
</body>